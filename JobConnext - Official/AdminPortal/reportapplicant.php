<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobConnext Administrator</title>
    <!--icon website-->
    <link rel="icon" type="image/x-icon" href="imgforadmin/logo.png">

    <!--bootstrap-->
    <link href="../bootstrap.min.css" rel="stylesheet">
    <!-- javascript  -->
    <script src="../bootstrap.bundle.min.js"></script>
    <script src="./bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="contentmoderation/contentmoderation.css" />
    <link rel="stylesheet" href="navigationbar/Nav.css" />
    <link rel="stylesheet" href="sidebar/Sidebar.css" />
    <link rel="stylesheet" href="adminStyleComponents/AdminLandingPage.css" />

    <!--icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--SweetAlert2-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php include 'navigationbar/Nav.php'; ?>
    <?php include 'sidebar/Sidebar.php'; ?>

    <main class="main-content">
        <div class="main-title">
            <h3>Content Moderation</h3>
        </div>
        <div class="notice-card">
            <div class="review-title">
                Reported Blue Collar Applicant
            </div>
            <div class="notice-content">
                <h4>Notice</h4>
                <p>Any user or company reported three (3) times will have their account automatically deleted as part of our system's enforcement of community guidelines. Please review reports carefully to ensure fairness and compliance.</p>
            </div>
        </div>

        <div class="review-content">
            <div class="review-content-header">
                <div class="review-search">
                    <div class="input-group mb-3 search-container">
                        <input type="text" class="form-control" id="searchInput" placeholder="Search Name" aria-label="Search username">
                        <button class="voice-search-btn" id="voiceSearchBtn" title="Voice Search">
                            <i class="bi bi-mic"></i>
                        </button>
                        
                    </div>
                </div>
                <div class="review-filter">
                    <div class="btn-group" id="filterGroup">
                        <button type="button" class="btn btn-darkblue" id="filterButton">Filter</button>
                        <button type="button" class="btn btn-darkblue dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" id="filterDropdownToggle">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" id="filterDropdownMenu">
                            <li><a class="dropdown-item filter-option" href="#" data-sort="name-asc">Sort by Name (A-Z)</a></li>
                            <li><a class="dropdown-item filter-option" href="#" data-sort="name-desc">Sort by Name (Z-A)</a></li>
                            <li><a class="dropdown-item filter-option" href="#" data-sort="date-new">Sort by Date (Newest)</a></li>
                            <li><a class="dropdown-item filter-option" href="#" data-sort="date-old">Sort by Date (Oldest)</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="post-content" id="reportedWorkersContainer">
                <?php include "component/reportedWorker.php"?>
                <div class="no-results" id="noResultsFilter" style="display: none;">
                    No workers match your search criteria.
                </div>
            </div>
        </div>
    </main>

    <script>
    $(document).ready(function() {
        // Check if any reports exist
        const hasReports = <?= $hasReports ? 'true' : 'false' ?>;
        let searchTimeout;
        
        // Voice search setup
        const voiceSearchBtn = document.getElementById('voiceSearchBtn');
        let recognition;
        
        try {
            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            recognition = new SpeechRecognition();
            recognition.continuous = false;
            recognition.interimResults = false;
            
            recognition.onstart = function() {
                voiceSearchBtn.classList.add('listening');
            };
            
            recognition.onend = function() {
                voiceSearchBtn.classList.remove('listening');
            };
            
            recognition.onresult = function(event) {
                const transcript = event.results[0][0].transcript;
                $('#searchInput').val(transcript);
                filterReports();
            };
            
            recognition.onerror = function(event) {
                console.error('Speech recognition error', event.error);
                voiceSearchBtn.classList.remove('listening');
            };
            
            voiceSearchBtn.addEventListener('click', function() {
                if (voiceSearchBtn.classList.contains('listening')) {
                    recognition.stop();
                } else {
                    recognition.start();
                }
            });
        } catch(e) {
            console.error('Speech recognition not supported', e);
            voiceSearchBtn.style.display = 'none';
        }

        // Live search functionality
        $('#searchInput').on('input', function() {
            clearTimeout(searchTimeout);
            $('#searchSpinner').show();
            
            searchTimeout = setTimeout(function() {
                filterReports();
                $('#searchSpinner').hide();
            }, 300); // 300ms delay after typing stops
        });

        //<button class="input-group-text" id="searchButton">Search</button>
        // // Search button click
        // $('#searchButton').click(function() {
        //     filterReports();
        // });

        // Enter key in search input
        $('#searchInput').keyup(function(e) {
            if (e.key === 'Enter') {
                filterReports();
            }
        });

        // Filter functionality
        $('.filter-option').click(function(e) {
            e.preventDefault();
            const sortType = $(this).data('sort');
            sortReports(sortType);
        });

        function filterReports() {
            const searchTerm = $('#searchInput').val().toLowerCase();
            let visibleCount = 0;
            
            $('.post-card').each(function() {
                const name = $(this).data('name');
                if (name.includes(searchTerm)) {
                    $(this).show();
                    visibleCount++;
                } else {
                    $(this).hide();
                }
            });
            
            updateNoResultsMessage(visibleCount);
        }

        function sortReports(sortType) {
            const $container = $('#reportedWorkersContainer');
            const $cards = $('.post-card').detach();
            let visibleCount = $cards.length;
            
            switch(sortType) {
                case 'name-asc':
                    $cards.sort(function(a, b) {
                        return $(a).data('name').localeCompare($(b).data('name'));
                    });
                    break;
                case 'name-desc':
                    $cards.sort(function(a, b) {
                        return $(b).data('name').localeCompare($(a).data('name'));
                    });
                    break;
                case 'date-new':
                    $cards.sort(function(a, b) {
                        return new Date($(b).data('date')) - new Date($(a).data('date'));
                    });
                    break;
                case 'date-old':
                    $cards.sort(function(a, b) {
                        return new Date($(a).data('date')) - new Date($(b).data('date'));
                    });
                    break;
            }
            
            $container.append($cards);
            updateNoResultsMessage(visibleCount);
        }
        
        function updateNoResultsMessage(visibleCount) {
            if (hasReports) {
                if (visibleCount === 0) {
                    $('#noResultsFilter').show();
                    $('#noResultsDefault').hide();
                } else {
                    $('#noResultsFilter').hide();
                    $('#noResultsDefault').hide();
                }
            }
        }
    });
    </script>
</body>
</html>