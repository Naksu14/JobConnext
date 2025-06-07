document.addEventListener("DOMContentLoaded", function () {
    const titledisplay = document.getElementById('userAccount');
    const dropdownButton = document.getElementById('userDropdown');
    const dropdownItems = document.querySelectorAll('.dropdown-menu .dropdown-item');
    const tableContainer = document.getElementById('tableContainer');
    const filterItems = document.querySelectorAll('.dropdown-item-fiter');

    // Keep track of current user type (default 'admin')
    let currentUserType = 'admin';

    // Load user role page on dropdown click
    dropdownItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();

            currentUserType = this.getAttribute('data-user');
            const userText = this.textContent;

            titledisplay.textContent = `${userText} Account`;
            dropdownButton.textContent = userText;
            dropdownButton.classList.remove('dropdown-toggle');

            // Load page without filters initially
            fetch(`usermanagement/${currentUserType}.php`)
                .then(response => {
                    if (!response.ok) throw new Error("Network response was not ok");
                    return response.text();
                })
                .then(data => {
                    tableContainer.innerHTML = data;
                })
                .catch(() => {
                    tableContainer.innerHTML = "<p>Error loading content.</p>";
                });
        });
    });

    // Load default user role page on page load
    document.getElementById('adminOption').click();

    // Handle filter/sort clicks
    filterItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();

            const sort = this.dataset.sort || '';
            const filter = this.dataset.filter || '';

            const params = new URLSearchParams();
            if (sort) params.append('sort', sort);
            if (filter) params.append('filter', filter);

            // Use currentUserType so filters apply to current user list
            fetch(`usermanagement/${currentUserType}.php?` + params.toString())
                .then(response => response.text())
                .then(data => {
                    tableContainer.innerHTML = data;
                })
                .catch(error => {
                    console.error('Error loading filtered data:', error);
                });
        });
    });
});

