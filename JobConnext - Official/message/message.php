<div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100%;">
  <div class="d-flex flex-row justify-content-center" style="width: 80%; max-width: 1200px;">
    <!-- Conversation List-->
    <div class="container" style="width: 40%;">
      <div class="message-information p-3 border border-3 rounded h-85 position-relative">
        <!-- Search Input with X Button -->
        <div class="search-input" style="position: relative; display: flex; align-items: center;">
          <input type="text" id="searchInput" placeholder="Search" autocomplete="off" style="flex: 1; padding-right: 30px;" />
          <button id="clearSearch" style="position: absolute; right: 15px; background: transparent; border: none; font-size: 20px; cursor: pointer; display: none;">&times;</button>
        </div>

        <!-- Results -->
        <ul id="results" style="position:absolute; background:#fff; border:1px solid #ccc; width:80%; max-height: 200px; overflow-y:auto; padding-left: 0; margin-top: 0; list-style:none; z-index: 1000; margin: 0; top: 13%; left: 10%; display: none"></ul>

        <!-- Placeholder Message -->
        <div class="messages-container">
          <ul id="conversationList" class="mt-3" style="padding-left: 0; list-style: none; height: 60vh; overflow-y: auto"></ul>
        </div>
      </div>
    </div>

    <!-- Conversation Window -->
    <div class="container d-flex justify-content-center align-items-center" style=" width: 100%;">
      <div class="message-container p-3 border border-3 rounded" style="width: 100%; max-width: 800px;">
        <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
          <h1>Your Messages</h1>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Script -->
<script>
  const searchInput = document.getElementById('searchInput');
  const resultList = document.getElementById('results');
  const clearBtn = document.getElementById('clearSearch');
  const conversationListEl = document.getElementById('conversationList');
  let selectedReceiverId = null;
  let isLoadingConvos = false;

  // Load conversation list every second
  function loadConversationList() {
    if (isLoadingConvos) return;
    isLoadingConvos = true;

    fetch('../message/conversation_list.php')
      .then(res => res.json())
      .then(data => {
        conversationListEl.innerHTML = '';

        if (data.status !== 'success' || !data.data.length) {
          conversationListEl.innerHTML = '<li class="text-center py-3">No conversations found.</li>';
          return;
        }

        data.data.forEach(conv => {
          const li = document.createElement('li');
          li.className = 'd-flex align-items-center justify-content-between py-2 border-bottom';
          li.style.cursor = 'pointer';

          // Left Side (Image + Name + Last Message)
          const infoDiv = document.createElement('div');
          infoDiv.className = 'd-flex align-items-center';

          const img = document.createElement('img');
          img.src = `../message/display_image.php?type=${encodeURI(conv.receiver_type)}&id=${encodeURI(conv.receiver_id)}`;
          img.alt = 'User Image';
          img.width = 45;
          img.height = 45;
          img.className = 'rounded-circle me-3';
          img.style.objectFit = 'cover';

          const textDiv = document.createElement('div');
          const name = document.createElement('strong');
          name.textContent = conv.receiver_username;

          const msg = document.createElement('div');
          msg.textContent = conv.message.length > 40 ? conv.message.slice(0, 40) + '…' : conv.message;
          msg.className = 'text-muted small';

          textDiv.append(name, msg);
          infoDiv.append(img, textDiv);

          // Right Side (Date/Time + Unread Badge)
          const rightDiv = document.createElement('div');
          rightDiv.className = 'd-flex flex-column align-items-end ms-2';

          const timeSpan = document.createElement('small');
          timeSpan.textContent = new Date(conv.created_at).toLocaleString();
          timeSpan.className = 'text-muted';

          rightDiv.appendChild(timeSpan);

          if (conv.has_unread === 1) {
            const badge = document.createElement('span');
            badge.className = 'badge bg-danger mt-1';
            badge.textContent = 'Unread';
            rightDiv.appendChild(badge);
          }

          li.append(infoDiv, rightDiv);

          li.onclick = () => selectConversation(conv.receiver_id);
          conversationListEl.append(li);
        });
      })
      .catch(console.error)
      .finally(() => { isLoadingConvos = false; });
  }

  // Select a conversation (initial load)
  function selectConversation(userId) {
    selectedReceiverId = userId;
    loadConversationThread(); // load full conversation
  }

  // Load conversation thread
  function loadConversationThread() {
    if (!selectedReceiverId) return;
    fetch(`../message/get_conversation.php?user_id=${selectedReceiverId}`)
      .then(res => res.text())
      .then(html => {
        const container = document.querySelector('.message-container');
        container.innerHTML = html;
        const chatBox = container.querySelector('.chat-box');
        if (chatBox) chatBox.scrollTop = chatBox.scrollHeight;
        attachSendHandler(); // reattach after DOM updates
      })
      .catch(console.error);
  }

  // Send message
  function attachSendHandler() {
    const sendBtn = document.getElementById('sendMessageBtn');
    const messageInput = document.getElementById('messageText');

    if (!sendBtn || !messageInput) return;

    // Function to handle sending message
    const sendMessage = () => {
        const msg = messageInput.value.trim();
        if (!msg || !selectedReceiverId) return;

        fetch('../message/send_message.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `receiver_id=${selectedReceiverId}&message=${encodeURIComponent(msg)}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                messageInput.value = '';
                loadConversationThread(); // reload after sending message
                loadConversationList();   // optional: refresh preview list
            } else {
                alert(data.message || 'Failed to send message.');
            }
        })
        .catch(err => alert('Send error: ' + err));
    };

    // Click handler for button
    sendBtn.onclick = sendMessage;

    // Keypress handler for Enter key
    messageInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
}

// Call the function to attach handlers
attachSendHandler();

  // Search users
  searchInput.oninput = () => {
    const q = searchInput.value.trim();
    clearBtn.style.display = q ? 'block' : 'none';
    if (!q) {
      resultList.style.display = 'none';
      return;
    }

    fetch(`../message/find_user.php?username=${encodeURIComponent(q)}`)
      .then(res => res.json())
      .then(arr => {
        resultList.innerHTML = '';
        resultList.style.display = 'block';
        if (!arr.length) {
          resultList.innerHTML = '<li class="p-2">No users found.</li>';
          return;
        }

        arr.forEach(user => {
          const li = document.createElement('li');
          li.className = 'd-flex align-items-center p-2 border-bottom';
          li.style.cursor = 'pointer';
          li.onmousedown = () => selectConversation(user.user_id);

          const img = document.createElement('img');
          img.src = user.image_url;
          img.alt = 'User'; img.width = 45; img.height = 45;
          img.className = 'rounded-circle me-2';

          const div = document.createElement('div');
          const nm = document.createElement('strong');
          nm.textContent = user.username;
          const em = document.createElement('small');
          em.textContent = user.email;
          em.className = 'text-muted d-block';
          const bd = document.createElement('span');
          bd.textContent = user.user_type;
          bd.className = 'badge bg-primary mt-1';

          div.append(nm, em, bd);
          li.append(img, div);
          resultList.append(li);
        });
      })
      .catch(console.error);
  };

  // Clear search input
  clearBtn.onclick = () => {
    searchInput.value = '';
    clearBtn.style.display = 'none';
    resultList.innerHTML = '';
    resultList.style.display = 'none';
    searchInput.focus();
  };

  // Initial load
  document.addEventListener('DOMContentLoaded', () => {
    loadConversationList();
    setInterval(loadConversationList, 1000); // refresh preview list every second
  });
</script>





