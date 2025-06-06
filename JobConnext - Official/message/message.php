<div class="d-flex flex-row justify-content-center" style="height: 100vh; width:auto;">
  <!-- Conversation List-->
  <div class="container" style="width: 40%;">

        <div class="message-information p-3 border border-3 rounded h-75 position-relative">

            <div class="search-input">
                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_2103_411)">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M4.71414 14.1429C4.71414 11.6422 5.7075 9.24405 7.4757 7.47585C9.2439 5.70765 11.6421 4.71429 14.1427 4.71429C16.6433 4.71429 19.0415 5.70765 20.8097 7.47585C22.5779 9.24405 23.5713 11.6422 23.5713 14.1429C23.5713 16.6435 22.5779 19.0417 20.8097 20.8099C19.0415 22.5781 16.6433 23.5714 14.1427 23.5714C11.6421 23.5714 9.2439 22.5781 7.4757 20.8099C5.7075 19.0417 4.71414 16.6435 4.71414 14.1429ZM14.1427 2.67445e-07C11.9169 -0.000283776 9.72239 0.5248 7.73774 1.53255C5.7531 2.54029 4.03433 4.00225 2.72123 5.79951C1.40814 7.59676 0.537782 9.67858 0.18096 11.8756C-0.175863 14.0727 -0.00907757 16.3229 0.66775 18.4434C1.34458 20.5638 2.51234 22.4946 4.07605 24.0786C5.63977 25.6626 7.55528 26.8552 9.66681 27.5594C11.7783 28.2635 14.0262 28.4593 16.2277 28.1309C18.4292 27.8025 20.5221 26.9591 22.3361 25.6693L28.9762 32.3094C29.4208 32.7387 30.0162 32.9763 30.6342 32.9709C31.2523 32.9656 31.8435 32.7177 32.2805 32.2806C32.7175 31.8436 32.9654 31.2524 32.9708 30.6344C32.9762 30.0163 32.7386 29.4209 32.3092 28.9764L25.6715 22.3386C27.176 20.2228 28.0691 17.7336 28.2528 15.1439C28.4366 12.5542 27.904 9.96381 26.7133 7.65671C25.5226 5.3496 23.7198 3.41476 21.5025 2.06421C19.2852 0.713649 16.7389 -0.000504548 14.1427 2.67445e-07Z"
                    fill="black" />
                </g>
                <defs>
                    <clipPath id="clip0_2103_411">
                    <rect width="33" height="33" fill="white"/>
                    </clipPath>
                </defs>
                </svg>
                <input type="text" id="searchInput" placeholder="Search" autocomplete="off"/>
            </div>

            <ul id="results" style="position:absolute; background:#fff; border:1px solid #ccc; width:80%; max-height: 200px; overflow-y:auto; padding-left: 0; margin-top: 0; list-style:none; z-index: 1000; margin: 0; top: 13%; left: 10%; display: none"></ul>
            
            <div class="messages-container">
                <center>
                <p class="mt-3">Start your conversation</p>
                </center>
            </div>
        </div>
  </div>

  <!-- Conversation -->
  <div class="container" style="width: 100%;">
    <div class="message-container p-3 border border-3 rounded h-75">
      <div class="d-flex flex-column justify-content-center align-items-center">
        <h1>Search any client</h1>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('searchInput').addEventListener('input', function () {
    const query = this.value.trim();

    if (query.length === 0) {
        const resultList = document.getElementById('results');
        resultList.innerHTML = '';
        resultList.style.display = 'none';
        return;
    }

    fetch(`../message/find_user.php?username=${encodeURIComponent(query)}`)
      .then(response => response.json())
      .then(data => {
        const resultList = document.getElementById('results');
        resultList.innerHTML = '';

        if (!data.length) {
            resultList.style.display = 'block';
            resultList.innerHTML = '<li style="padding: 8px;">No users found.</li>';
            return;
        }

        data.forEach(user => {
            resultList.style.display = 'block';
          const li = document.createElement('li');
          li.textContent = `${user.username}, ${user.email}, (${user.user_type})`;
          li.style.padding = '8px';
          li.style.cursor = 'pointer';

          // You can add click event here to select the user for chat
          li.addEventListener('click', () => {
            alert(`Selected user: ${user.username} (${user.user_type})`);
            // TODO: load conversation or open chat window
          });

          resultList.appendChild(li);
        });
      })
      .catch(error => {
        console.error('Error fetching users:', error);
      });
  });
</script>
