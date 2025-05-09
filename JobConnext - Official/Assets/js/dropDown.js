
document.addEventListener('DOMContentLoaded', function () {

    // Filter by predefined filter (Electrician, Tubero, etc.)
    document.querySelectorAll('.dropdown-item[data-filter]').forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            const filter = this.getAttribute('data-filter').toLowerCase();
            document.getElementById('filterDropdown').querySelector('span').textContent = this.textContent;
            filterBySkill(filter);
        });
    });

    // Filter by custom input (when 'Other' is typed)
    document.getElementById('applyCustomFilter').addEventListener('click', function () {
        const input = document.getElementById('customFilterInput').value.trim().toLowerCase();
        if (input !== '') {
            document.getElementById('filterDropdown').querySelector('span').textContent = input;
            filterBySkill(input);
        }
    });

    // Function to filter cards based on skill tag
    function filterBySkill(filter) {
        const jobCards = document.querySelectorAll('.card-link');

        jobCards.forEach(card => {
            const skillsContainer = card.querySelector('.skills'); // or `.skill-tag` container
            const skillTags = skillsContainer ? skillsContainer.innerText.toLowerCase() : '';

            if (filter === 'all' || skillTags.includes(filter)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

});

