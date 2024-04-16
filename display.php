<?php
require("connection.php");
// Number of items per page
$itemsPerPage = 6;
 
// Get current page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;
 
// Fetch content with pagination
$query = "SELECT title, description, content FROM uploadContent LIMIT $offset, $itemsPerPage";
$result = mysqli_query($con, $query);
$fetch_src = FETCH_SRC;
 
// Pagination navigation
$queryCount = "SELECT COUNT(*) AS total FROM uploadContent";
$resultCount = mysqli_query($con, $queryCount);
$rowCount = mysqli_fetch_assoc($resultCount)['total'];
$totalPages = ceil($rowCount / $itemsPerPage);
 ?>
<!DOCTYPE html>
<html lang="en-US">


<!-- portfolio-grid-3-columns-with-filter22:57 GMT -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbon Footprint Calculator</title>

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic&amp;subset=latin&amp;' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Noto+Sans%3Aregular%2Citalic%2C700%2C700italic&amp;subset=greek%2Ccyrillic-ext%2Ccyrillic%2Clatin%2Clatin-ext%2Cvietnamese%2Cgreek-ext&amp;' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Merriweather%3A300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic&amp;subset=latin%2Clatin-ext&amp;' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Mystery+Quest%3Aregular&amp;subset=latin%2Clatin-ext&amp;' type='text/css' media='all' />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='plugins/superfish/css/superfish.css' type='text/css' media='all' />
    <link rel='stylesheet' href='plugins/dl-menu/component.css' type='text/css' media='all' />
    <link rel='stylesheet' href='plugins/font-awesome-new/css/font-awesome.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='plugins/elegant-font/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='plugins/fancybox/jquery.fancybox.css' type='text/css' media='all' />
    <link rel='stylesheet' href='plugins/flexslider/flexslider.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/style-responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/style-custom.css' type='text/css' media='all' />
    <link rel='stylesheet' href='plugins/masterslider/public/assets/css/masterslider.main.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/master-custom.css' type='text/css' media='all' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">



    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body data-rsssl=1 class="home page-template-default page page-id-5680 _masterslider _msp_version_3.2.7 woocommerce-no-js">
    <div class="body-wrapper  float-menu" data-home="https://demo.goodlayers.com/greennature/">
        <header class="greennature-header-wrapper header-style-5-wrapper greennature-header-with-top-bar">
            <!-- top navigation -->
            <div class="top-navigation-wrapper">
                <div class="top-navigation-container container">
                    <div class="top-navigation-left">
                        <div class="top-navigation-left-text">
                            Phone : +1800-222-3333      Email : contact@yourdomain.com </div>
                    </div>
                    <div class="top-navigation-right">
                        <div class="top-social-wrapper">
                            <div class="social-icon">
                                <a href="#" target="_blank">
                                    <i class="fa fa-facebook"></i></a>
                            </div>
                            <div class="social-icon">
                                <a href="#" target="_blank">
                                    <i class="fa fa-flickr"></i></a>
                            </div>
                            <div class="social-icon">
                                <a href="#" target="_blank">
                                    <i class="fa fa-linkedin"></i></a>
                            </div>
                            <div class="social-icon">
                                <a href="#" target="_blank">
                                    <i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="social-icon">
                                <a href="#" target="_blank">
                                    <i class="fa fa-tumblr"></i></a>
                            </div>
                            <div class="social-icon">
                                <a href="#" target="_blank">
                                    <i class="fa fa-twitter"></i></a>
                            </div>
                            <div class="social-icon">
                                <a href="#" target="_blank">
                                    <i class="fa fa-vimeo"></i></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div id="greennature-header-substitute"></div>
            <div class="greennature-header-inner header-inner-header-style-5">
                <div class="greennature-header-container container">
                    <div class="greennature-header-inner-overlay"></div>
                    <!-- logo -->
                    <div class="greennature-logo">
                        <div class="greennature-logo-inner">
                            <a href="index-2.html">
                                <img src="images/logo.png" alt="" /> </a>
                        </div>
                        <div class="greennature-responsive-navigation dl-menuwrapper" id="greennature-responsive-navigation">
                            <button class="dl-trigger">Open Menu</button>
                            <ul id="menu-main-menu" class="dl-menu greennature-main-mobile-menu">
                                <li class="menu-item menu-item-home current-menu-item page_item page-item-5680 current_page_item"><a href="index.php" aria-current="page">Home</a></li>
                                <li class="menu-item menu-item-has-children menu-item-15"><a href="#">Dashboard</a>
                                    <ul class="dl-submenu">
                                        <li class="menu-item"><a href="todayDashboard.php">Today Dashboard</a></li>
                                        <li class="menu-item"><a href="historyDashboard.php">History Dashboard</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children"><a href="#">Blog</a>
                                    <ul class="dl-submenu">
                                        <li class="menu-item menu-item-has-children"><a href="display.php">Educational Content</a>
                                            <li class="menu-item menu-item-has-children"><a href="calender2.html">Calender</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children"><a href="#">My Account</a>
                                    <ul class="dl-submenu">
                                    	<li class="menu-item"><a href="socialmedia.php">Share To Social Media</a></li>
                                        <li class="menu-item"><a href="survey.html">Survey</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- navigation -->
                    <div class="greennature-navigation-wrapper">
                        <nav class="greennature-navigation" id="greennature-main-navigation">
                            <ul id="menu-main-menu-1" class="sf-menu greennature-main-menu">
                                <li class="menu-item menu-item-home greennature-normal-menu"><a href="home.html"><i class="fa fa-home"></i>Home</a></li>
                                <li class="menu-item menu-item-has-children greennature-normal-menu"><a href="#" class="sf-with-ul-pre"><i class="fa fa-file-text-o"></i>Dashboard</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="todayDashboard.php">Today Dashboard</a></li>
                                        <li class="menu-item"><a href="historyDashboard.php">History Dashboard</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children greennature-normal-menu"><a href="#" class="sf-with-ul-pre"><i class="fa fa-file-text-o"></i>Blog</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="display.php">Educational Content</a></li>
                                        <li class="menu-item"><a href="calender2.html">Calendar</a></li>
                                    </ul>
                                </li>
                                <!-- My Account Section -->
                                <li class="menu-item menu-item-has-childrenmenu-item menu-item-has-children greennature-normal-menu">
                                    <a href="#" class="sf-with-ul-pre">My Account</a>
                                    <ul class="sub-menu">
                                        <!-- Profile Section -->
                                        <li class="menu-item"><a href="profile.php">Profile</a></li>
                                        <li class="menu-item"><a href="survey.html">Survey</a></li>
                                        <li class="menu-item menu-item-has-children menu-item-"><a href="socialmedia.php" class="sf-with-ul-pre">Share To Social Media</a>
                                    </ul>
                                </li>
                            </ul>
                            <a id="sign-out-button" class="greennature-donate-button greennature-lb-payment">
                                <span class="greennature-button-overlay"></span>
                                <span class="greennature-button-donate-text">Sign Out</span>

                            </a>

                        </nav>
                        <div class="greennature-navigation-gimmick" id="greennature-navigation-gimmick"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </header>
        <!-- is search -->
        
        <div class="greennature-page-title-wrapper header-style-5-title-wrapper">
            <div class="greennature-page-title-overlay"></div>
            <div class="greennature-page-title-container container">
                <h1 class="greennature-page-title">Educational Content</h1>
                <span class="greennature-page-caption">Enlightenment Awaits: Journey into carbon foot print</span>
            </div>
        </div>
        <!-- is search -->
        <div class="content-wrapper">
            <div class="greennature-content">

                <!-- Above Sidebar Section-->
                <!-- Sidebar With Content Section-->
                <div class="with-sidebar-wrapper">
                    <div class="with-sidebar-container container">
                        <div class="with-sidebar-left twelve columns">
                            <div class="with-sidebar-content twelve columns">
                                <section id="content-section-1">
                                    <div class="section-container container">
                                        <div class="portfolio-item-wrapper type-classic-portfolio" >

                    
  
<div class="wrapper">
        <?php

        if ($result) {
            echo '<section class="wf100 p80-40 blog" style="padding-bottom:0px;">';
            echo '<div class="causes-grid">';
            echo '<div class="container">';
            echo '<div class="row">';

            while ($row = mysqli_fetch_assoc($result)) {
              echo '<div class="col-md-4 col-sm-6">';
              echo '<!-- campaign box start -->';
              echo '<div class="campaign-box" style="box-shadow: 0 10px 40px rgba(156,204,101,.35);height:440px; overflow:hidden;">';
              echo '<div class="campaign-thumb"> <a href="#" data-toggle="modal" data-target="#contentModal" 
                                                  data-title="' . htmlspecialchars($row['title']) . '" 
                                                  data-image="' . htmlspecialchars($fetch_src . $row['content']) . '" 
                                                  data-description="' . htmlspecialchars($row['description']) . '"></a>';
              echo '<div class="image-container" style="width: 100%; height: 200px; overflow: hidden;">';
              echo '<img src="' . $fetch_src . $row['content'] . '" alt="" style="width: 100%; height: 100%; object-fit: cover;">';
              echo '</div>';
              echo '</div>';
              echo '<div class="campaign-txt" style="padding-top:15px;">';
              echo '<h6 style="height:40px;">' . $row['title'] . '</a></h6>';
              echo '<p style="margin-bottom:0px;">' . truncateText($row['description'], 120) . '</p>'; //style="height:40px; padding-top:3px;"
              echo '<br>';
              // Add data attributes to the "View More" link for modal
              echo '<a href="#" class="dbutton" data-toggle="modal" data-target="#contentModal" 
                      data-title="' . htmlspecialchars($row['title']) . '" 
                      data-image="' . htmlspecialchars($fetch_src . $row['content']) . '" 
                      data-description="' . htmlspecialchars($row['description']) . '">View More</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
          }
          
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</section>';
        } 
        else {
            echo "Error retrieving data: " . mysqli_error($con);
        }
         
        // Function to truncate text
        function truncateText($text, $maxLength) {
          if (strlen($text) > $maxLength) {
              $text = substr($text, 0, $maxLength) . '...';
          }
          return $text;
      }

      // Pagination navigation
      echo '<div class="pagination-container">'; 
      echo '<div class="col-md-12">';
      echo '<div class="gt-pagination mt20">';
      echo '<nav style="margin-bottom: 30px;">';
      echo '<ul class="pagination">';

      if ($totalPages > 1) {
          if ($page > 1) {
              echo '<li class="page-item"> <a class="page-link" href="?page=' . ($page - 1) . '" aria-label="Previous"> <i class="fas fa-angle-left"></i> </a> </li>';
          }

          for ($i = 1; $i <= $totalPages; $i++) {
              if ($i == $page) {
                  echo '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
              } else {
                  echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
              }
          }

          if ($page < $totalPages) {
              echo '<li class="page-item"> <a class="page-link" href="?page=' . ($page + 1) . '" aria-label="Next"> <i class="fas fa-angle-right"></i> </a> </li>';
          }
      }

      echo '</ul>';
      echo '</nav>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      ?>

</div>
<div class="modal" id="ShowContent">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contentModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Image container -->
                            <img src="" class="img-fluid" id="contentModalImage">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Description container -->
                            <p id="contentModalDescription"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript code to handle modal functionality -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Select all elements with class "dbutton"
            var buttons = document.querySelectorAll('.dbutton');

            // Iterate over each button and attach a click event listener
            buttons.forEach(function (button) {
                button.addEventListener('click', function () {
                    // Retrieve data attributes
                    var title = this.getAttribute('data-title');
                    var image = this.getAttribute('data-image');
                    var description = this.getAttribute('data-description');

                    // Set modal content
                    var modalTitle = document.getElementById('contentModalLabel');
                    var modalImage = document.getElementById('contentModalImage');
                    var modalDescription = document.getElementById('contentModalDescription');

                    modalTitle.textContent = title;
                    modalImage.src = image;
                    modalDescription.textContent = description;

                    // Show the modal
                    document.getElementById('ShowContent').style.display = 'block';
                });
            });

            // Close modal when the close button is clicked
            document.querySelector('.modal .close').addEventListener('click', function () {
                document.getElementById('ShowContent').style.display = 'none';
            });
        });
    </script>
</div>




                                        </div >
                                        <div class="clear"></div>
                                    </div>
                                </section>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <!-- Below Sidebar Section-->
            </div>
            <!-- greennature-content -->
            <div class="clear"></div>
        </div>
        <!-- content wrapper -->
        <footer class="footer-wrapper">
            <div class="footer-container container">
                <div class="footer-column three columns" id="footer-widget-1">
                    <div id="text-5" class="widget widget_text greennature-item greennature-widget">
                        <div class="textwidget">
                            <p><img src="upload/logo-light.png" style="width: 170px;" alt="" /></p>
                            <p>The best website to help u to calculate ur carbon footprint. save the earth</p>
                        </div>
                    </div>
                </div>
                <div class="footer-column three columns" id="footer-widget-2">
                    <div id="text-9" class="widget widget_text greennature-item greennature-widget">
                        <h3 class="greennature-widget-title">Contact Info</h3>
                        <div class="clear"></div>
                        <div class="textwidget"><span class="clear"></span><span class="greennature-space" style="margin-top: -6px; display: block;"></span> Address: 184 Main Collins Street West Victoria 8007
 
                            <span class="clear"></span><span class="greennature-space" style="margin-top: 10px; display: block;"></span>
 
                            <i class="greennature-icon fa fa-phone" style="vertical-align: middle; color: #fff; font-size: 16px; "></i> +123-456789
 
                            <span class="clear"></span><span class="greennature-space" style="margin-top: 10px; display: block;"></span>
 
                            <i class="greennature-icon fa fa-mobile" style="vertical-align: middle; color: #fff; font-size: 20px; "></i> +987-654-321
 
                            <span class="clear"></span><span class="greennature-space" style="margin-top: 10px; display: block;"></span>
 
                            <i class="greennature-icon fa fa-envelope-o" style="vertical-align: middle; color: #fff; font-size: 16px; "></i> helpunidip224@gmail.com</div>
                    </div>
                </div>
                <div class="footer-column three columns" id="footer-widget-3">
                    <div id="gdlr-recent-post-widget-5" class="widget widget_gdlr-recent-post-widget greennature-item greennature-widget">
                        <h3 class="greennature-widget-title">Recent Posts</h3>
                        <div class="clear"></div>
                        <div class="greennature-recent-post-widget">
                            <div class="recent-post-widget">
                                <div class="recent-post-widget-thumbnail">
                                    <a href="#"><img src="upload/shutterstock_294481373-150x150.jpg" alt="" width="150" height="150" /></a>
                                </div>
                                <div class="recent-post-widget-content">
                                    <div class="recent-post-widget-title"><a href="#">How to reduce carbon emittion</a></div>
                                    <div class="recent-post-widget-info">
                                        <div class="blog-info blog-date greennature-skin-info"><i class="fa fa-clock-o"></i><a href="#">21 Mar 2024</a></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="recent-post-widget">
                                <div class="recent-post-widget-thumbnail">
                                    <a href="#"><img src="upload/shutterstock_181393724-150x150.jpg" alt="" width="150" height="150" /></a>
                                </div>
                                <div class="recent-post-widget-content">
                                    <div class="recent-post-widget-title"><a href="#">Types of carbon emmition</a></div>
                                    <div class="recent-post-widget-info">
                                        <div class="blog-info blog-date greennature-skin-info"><i class="fa fa-clock-o"></i><a href="#">21 Mar 2024</a></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="footer-column three columns" id="footer-widget-4">
                    <div id="gdlr-recent-portfolio2-widget-6" class="widget widget_gdlr-recent-portfolio2-widget greennature-item greennature-widget">
                        <h3 class="greennature-widget-title">Recent Works</h3>
                        <div class="clear"></div>
                        <div class="greennature-recent-port2-widget">
                            <div class="recent-port-widget-thumbnail">
                                <a href="#"><img src="upload/shutterstock_161515241-150x150.jpg" alt="" width="150" height="150" /></a>
                            </div>
                            <div class="recent-port-widget-thumbnail">
                                <a href="#"><img src="upload/shutterstock_133689230-150x150.jpg" alt="" width="150" height="150" /></a>
                            </div>
                            <div class="recent-port-widget-thumbnail">
                                <a href="#"><img src="upload/shutterstock_53600221-150x150.jpg" alt="" width="150" height="150" /></a>
                            </div>
                            <div class="recent-port-widget-thumbnail">
                                <a href="#"><img src="upload/shutterstock_124871620-150x150.jpg" alt="" width="150" height="150" /></a>
                            </div>
                            <div class="recent-port-widget-thumbnail">
                                <a href="#"><img src="upload/shutterstock_281995004-150x150.jpg" alt="" width="150" height="150" /></a>
                            </div>
                            <div class="recent-port-widget-thumbnail">
                                <a href="#"><img src="upload/shutterstock_256181956-150x150.jpg" alt="" width="150" height="150" /></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
 
            <div class="copyright-wrapper">
                <div class="copyright-container container">
                    <div class="copyright-left">
                        <a href="#"><i class="greennature-icon fa fa-facebook" style="vertical-align: middle;color: #bbbbbb;font-size: 20px"></i></a> <a href="#"><i class="greennature-icon fa fa-twitter" style="vertical-align: middle;color: #bbbbbb;font-size: 20px"></i></a> <a href="#"><i class="greennature-icon fa fa-dribbble" style="vertical-align: middle;color: #bbbbbb;font-size: 20px"></i></a> <a href="#"><i class="greennature-icon fa fa-pinterest" style="vertical-align: middle;color: #bbbbbb;font-size: 20px"></i></a> <a href="#"><i class="greennature-icon fa fa-google-plus" style="vertical-align: middle;color: #bbbbbb;font-size: 20px"></i></a> <a href="#"><i class="greennature-icon fa fa-instagram" style="vertical-align: middle;color: #bbbbbb;font-size: 20px"></i></a>
                    </div>
                </div>
            </div>
        </footer>

    <!-- body-wrapper -->

<script type='text/javascript' src='js/jquery/jquery.js'></script>
<script type='text/javascript' src='js/jquery/jquery-migrate.min.js'></script>
<script type='text/javascript' src='plugins/superfish/js/superfish.js'></script>
<script type='text/javascript' src='js/hoverIntent.min.js'></script>
<script type='text/javascript' src='plugins/dl-menu/modernizr.custom.js'></script>
<script type='text/javascript' src='plugins/dl-menu/jquery.dlmenu.js'></script>
<script type='text/javascript' src='plugins/jquery.easing.js'></script>
<script type='text/javascript' src='plugins/fancybox/jquery.fancybox.pack.js'></script>
<script type='text/javascript' src='plugins/fancybox/helpers/jquery.fancybox-media.js'></script>
<script type='text/javascript' src='plugins/fancybox/helpers/jquery.fancybox-thumbs.js'></script>
<script type='text/javascript' src='plugins/flexslider/jquery.flexslider.js'></script>
<script type='text/javascript' src='plugins/jquery.isotope.min.js'></script>
<script type='text/javascript' src='js/plugins.js'></script>
<script type='text/javascript' src='js/isotope.js'></script>
<script type='text/javascript' src='plugins/jquery.transit.min.js'></script>
<script type='text/javascript' src='plugins/gdlr-portfolio/gdlr-portfolio-script.js'></script>
<!-- JS Files End -->

</body>
</html>