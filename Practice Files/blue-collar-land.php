<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="blue-collar.css">
    <link rel="stylesheet" href="new-collar.css">
    <link rel="stylesheet" href="../Assets/css/style.css">  
    <title>Document</title>
</head>
<body>
  

        <div class="whole-screen">
          <div class="nav-cont">
            <div class="container-fluid text-center">
          <div class="row">
              <div class="col">
                  <div class="container-fluid" id="logo">
                      <img src="../Assets/image/462566530_896228739052589_2655126183685351288_n.png" alt="">
                  </div>
              </div>
              <div class="col">
                  <div class="container-fluid" id="nav_list">
                      <ul>
                          <li>
                              <a href="client_home.php">Home</a>
                              <a href="../ClientPortal/client_profile.php">Profile</a>
                              <a href="">Message</a>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col">
                  <div class="container-fluid">
                      <a href="../GuessPortal/LandingPage.php">
                          <button id="logout_butt">
                              Logout
                          </button>
                      </a>
                  </div>
              </div>
          </div>
      </div>
    </nav>
            </div>
                    <div class="card-left">
                        <div class="card-left-inner-container">
                            <div class="banner-list">
                                <p class="banner-heading">Are you looking for a Freelance job?</p><br>
                                <p class="p-banner">FREELANCE is a place where you can find a freelance job in a various skill more than 10,000 freelance jobs are available here</p>
                            </div>

                            <div class="search-bar-cont">
                                <form class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                  </form>
                            </div>
                            

                            <?php 
                              
                            
                            ?>
                            <div class="work-lists-cont">
                              <a href="new-blue-collar.php">
                                <div class="job-list">
                                    <div class="cont-job-1">
                                        <div class="job-profile">

                                        </div>
                                        <div class="cont-heading-job">
                                          <h3>Supra Oracles</h3>
                                        </div>
                                        <div class="bookmark-button">
                                            <button class="bookmark-button-card">
                                              <i class="fa fa-bookmark"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="info-type-salary">
                                      <h5>Freelance - Php25,000-30,000 - 5 Applicants</h5>
                                    </div>
                                    
                                    <div class="salary-loc-exp">
                                        <div class="salary-job">
                                          <h5>Salary range</h4><p>18-20K</p>
                                        </div>

                                        <div class="location-job">
                                          <h5>Location</h4><p>Makati</p>
                                        </div>

                                        <div class="experience-job">
                                          <h5>Experience</h4><p>4yrs</p>
                                        </div>
                                    </div>

                                    <div class="require-skill">
                                      <div class="skill1">
                                        <h5 class="text-skill-welder">Welder</h5>
                                      </div>

                                      <div class="skill2">
                                        <h5 class="text-skill-elec" >Electrician</h5>
                                      </div>

                                      <div class="skill3">
                                        <h5 class="text-skill-plum">Plumber</h5>
                                      </div>
                                  </div>
                                    
                                </div>
                                  </a>
                                

                                




                                <div class="job-list4">

                                </div>
                            </div>
                        </div>
                    </div>
                

                    <div class="card-right">
                      <div class="empty-icon-cont">
                        <div class="empty-icon">
                            <img src="../Assets/image/empty.png" alt="">
                        </div>
                      </div>

                    </div>
        </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
      $(function() {
  //var bookmarkOn = '<i class="fa fa-bookmark"></i>'
  //var bookmarkOff = '<i class="fa fa-bookmark-o"></i>'

  $('.pp-bookmark-btn')
    //.html( $('.pp-bookmark-btn').data('state') ? bookmarkOn : bookmarkOff )
    //.html( $('.pp-bookmark-btn').hasClass( "active" ) ? bookmarkOn : bookmarkOff )
    .click(function() {
      var btn = $(this);

      var context = $(this).data("context");
      var contextAction = $(this).data("context-action");
      var contextId = $(this).data("context-id");
      // $('#log').html(context + " " + contextAction + " " + contextId )

      // if( btn.data('state') ) {
      //    btn.data('state', false);
      if (btn.hasClass("active")) {
        btn.removeClass("active")
          // $getJSON
          //btn.html(bookmarkOff);
      } else {
        // btn.data('state', true);
        btn.addClass("active");
        //btn.html(bookmarkOn);
      };
    });

  /*
    updateBookmarks(action, context, context-action, context-id) {
    
    }
    */
  //     $('form').html('asfafaf');
  //     var btn = $('form').attr('action');
  //     var jqxhr = $.ajax({
  //         url: '/echo/html/',
  //         dataType: 'json',
  //         data:{ id: $('form input').val() }
  //     })
  //     .success(function(data) {
  //         alert("success"+data);
  //     })
  //     .error(function(err) {
  //         alert("error"+err);
  //     })
  //     .complete(function(stuff) {
  //         alert("complete"+stuff);
  //     });
  //
  //     e.preventDefault();

});
    </script>
    
  </body>
</html>