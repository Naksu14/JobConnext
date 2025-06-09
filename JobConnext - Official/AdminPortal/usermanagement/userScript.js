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

document.addEventListener('DOMContentLoaded', function() {
    const filterItems = document.querySelectorAll('.filter-item');
    const tableContainer = document.getElementById('tableContainer');
    const currentUserType = 'blue_collar'; // Set this based on your page
    
    // Update your existing filterItems click handler
    filterItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            
            // Remove active class from all filter items
            filterItems.forEach(i => i.classList.remove('active'));
            
            // Add active class to clicked item
            this.classList.add('active');
            
            const params = new URLSearchParams();
            const searchInput = document.getElementById('voiceSearchInput');
            
            // Add search term if exists
            if (searchInput.value.trim()) {
                params.append('search', searchInput.value.trim());
            }
            
            // Add filter/sort parameters based on data attributes
            if (this.dataset.sort) {
                params.append('sort', this.dataset.sort);
            }
            if (this.dataset.filter) {
                params.append('filter', this.dataset.filter);
            }
            if (this.dataset.dateFilter) {
                params.append('date-filter', this.dataset.dateFilter);
            }
            
            fetch(`usermanagement/${currentUserType}.php?${params.toString()}`)
                .then(response => response.text())
                .then(data => {
                    tableContainer.innerHTML = data;
                })
                .catch(error => {
                    console.error('Error loading filtered data:', error);
                });
        });
    });
    
    // Handle search input (with debounce)
    const searchInput = document.getElementById('voiceSearchInput');
    let searchTimeout;
    
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            const activeFilter = document.querySelector('.filter-item.active');
            if (activeFilter) {
                activeFilter.click();
            } else {
                // Trigger a default filter if none is active
                const defaultFilter = document.querySelector('.filter-item[data-filter="all"]');
                if (defaultFilter) defaultFilter.click();
            }
        }, 500);
    });
});