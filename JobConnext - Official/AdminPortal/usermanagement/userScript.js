document.addEventListener("DOMContentLoaded", function () {
    const titledisplay = document.getElementById('userAccount');
    const dropdownButton = document.getElementById('userDropdown');
    const dropdownItems = document.querySelectorAll('.dropdown-menu .dropdown-item');
    const tableContainer = document.getElementById('tableContainer');

    dropdownItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default link behavior

            // Get user type and text from the selected item
            const userType = this.getAttribute('data-user'); // Unique data attribute
            const userText = this.textContent; // Get text of selected item

            // Update the title and dropdown button text
            titledisplay.textContent = `${userText} Account`;
            dropdownButton.textContent = userText;
            dropdownButton.classList.remove('dropdown-toggle'); // Optionally remove caret icon for clarity

            // Fetch and display the corresponding PHP file dynamically based on selection
            fetch(`usermanagement/${userType}.php`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.text();
                })
                .then(data => {
                    tableContainer.innerHTML = data; // Update the table-container content
                })
                .catch(error => {
                    console.error("There was an error loading the content:", error);
                    tableContainer.innerHTML = "<p>Error loading content.</p>";
                });
        });
    });
});
