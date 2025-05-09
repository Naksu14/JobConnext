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

function filterBySkill(filter) {
    const wrappers = document.querySelectorAll('.job-card-wrapper');

    wrappers.forEach(wrapper => {
        const cards = wrapper.querySelectorAll('.card-link');
        let hasMatch = false;

        cards.forEach(card => {
            const skillsContainer = card.querySelector('.skills');
            const skillTags = skillsContainer ? skillsContainer.innerText.toLowerCase() : '';

            if (filter === 'all' || skillTags.includes(filter)) {
                card.style.display = 'block';
                hasMatch = true;
            } else {
                card.style.display = 'none';
            }
        });

        // Hide the wrapper's parent (likely .job-card or .row) if no match
        const parentRow = wrapper.closest('.job-card, .row');
        if (parentRow) {
            parentRow.style.display = hasMatch ? 'flex' : 'none';
        }
    });
}
function filterBySkill(filter) {
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        const skillsContainer = card.querySelector('.skills');
        const skillTags = skillsContainer ? skillsContainer.innerText.toLowerCase() : '';

        if (filter === 'all' || skillTags.includes(filter)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });

    // Now hide the entire .job-card or .row if all its .card children are hidden
    const cardWrappers = document.querySelectorAll('.job-card-wrapper');

    cardWrappers.forEach(wrapper => {
        const visibleCards = wrapper.querySelectorAll('.card:not([style*="display: none"])');
        const row = wrapper.closest('.row');
        if (row) {
            row.style.display = visibleCards.length > 0 ? 'flex' : 'none';
        }
    });
}

});