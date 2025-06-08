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

        <div class="review-content">
            <div class="review-title">
                Review Post
            </div>
            <div class="review-content-header">
                <div class="review-search">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="searchInput" placeholder="Search Company or Job Offer" aria-label="Search">
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
                            <li><a class="dropdown-item filter-option" href="#" data-filter="all">All Posts</a></li>
                            <li><a class="dropdown-item filter-option" href="#" data-filter="date-desc">Newest First</a></li>
                            <li><a class="dropdown-item filter-option" href="#" data-filter="date-asc">Oldest First</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item filter-option" href="#" data-filter="salary-high">Highest Salary</a></li>
                            <li><a class="dropdown-item filter-option" href="#" data-filter="salary-low">Lowest Salary</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="post-content">
                <div class="no-results">No posts found matching your search criteria.</div>
                <?php include 'component/postCardReview.php'; ?>
            </div>

        </div>




    </main>

</body>
<script>
        $(document).ready(function() {
            // Search functionality
            $('#searchInput').on('keyup', function() {
                const searchTerm = $(this).val().toLowerCase();
                let hasResults = false;
                
                $('.post-card').each(function() {
                    const company = $(this).data('company');
                    const job = $(this).data('job');
                    
                    if (company.includes(searchTerm) || job.includes(searchTerm)) {
                        $(this).show();
                        hasResults = true;
                    } else {
                        $(this).hide();
                    }
                });
                
                // Show/hide no results message
                if (hasResults) {
                    $('.no-results').hide();
                } else {
                    $('.no-results').show();
                }
            });
            
            // Filter functionality
            $('.filter-option').on('click', function(e) {
                e.preventDefault();
                const filterType = $(this).data('filter');
                const $postContainer = $('.post-content');
                const $posts = $('.post-card');
                
                // Show all posts first
                $posts.show();
                
                switch(filterType) {
                    case 'all':
                        // Already shown all posts
                        break;
                        
                    case 'date-desc':
                        // Newest first (default)
                        $posts.sort(function(a, b) {
                            return new Date($(b).data('date')) - new Date($(a).data('date'));
                        }).appendTo($postContainer);
                        break;
                        
                    case 'date-asc':
                        // Oldest first
                        $posts.sort(function(a, b) {
                            return new Date($(a).data('date')) - new Date($(b).data('date'));
                        }).appendTo($postContainer);
                        break;
                        
                    case 'salary-high':
                        // Highest salary first
                        $posts.sort(function(a, b) {
                            return $(b).data('salary') - $(a).data('salary');
                        }).appendTo($postContainer);
                        break;
                        
                    case 'salary-low':
                        // Lowest salary first
                        $posts.sort(function(a, b) {
                            return $(a).data('salary') - $(b).data('salary');
                        }).appendTo($postContainer);
                        break;
                }
                
                // Update filter button text
                $('#filterButton').text($(this).text());
                
                // Check if any posts are visible after filtering
                if ($posts.filter(':visible').length === 0) {
                    $('.no-results').show();
                } else {
                    $('.no-results').hide();
                }
            });
            
            // Voice search functionality
            $('#voiceSearchBtn').on('click', function() {
                if ('webkitSpeechRecognition' in window) {
                    const recognition = new webkitSpeechRecognition();
                    recognition.lang = 'en-US';
                    recognition.start();
                    
                    recognition.onresult = function(event) {
                        const transcript = event.results[0][0].transcript;
                        $('#searchInput').val(transcript).trigger('keyup');
                    };
                    
                    recognition.onerror = function(event) {
                        console.error('Voice recognition error', event.error);
                    };
                } else {
                    alert('Voice search is not supported in your browser.');
                }
            });
        });
    </script>
</html>