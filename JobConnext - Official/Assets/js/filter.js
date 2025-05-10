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

    // Filter by custom input
    document.getElementById('applyCustomFilter').addEventListener('click', function () {
        const input = document.getElementById('customFilterInput').value.trim().toLowerCase();
        if (input !== '') {
            document.getElementById('filterDropdown').querySelector('span').textContent = input;
            filterBySkill(input);
        }
    });

    function filterBySkill(filter) {
    const cards = document.querySelectorAll('.card');
    let totalVisible = 0;

    cards.forEach(card => {
        const skillsContainer = card.querySelector('.skills');
        const skillTags = skillsContainer ? skillsContainer.innerText.toLowerCase() : '';

        if (filter === 'all' || skillTags.includes(filter)) {
            card.style.display = 'block';
            totalVisible++;
        } else {
            card.style.display = 'none';
        }
    });

        const noResults = document.getElementById('noResultsMessage');
        if (noResults) {
            if (totalVisible === 0) {
                noResults.style.display = 'block';
                document.body.style.overflow = 'hidden';
            } else {
                noResults.style.display = 'none';
                document.body.style.overflow = '';
            }
        }
    }
});
