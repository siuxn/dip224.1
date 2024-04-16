<?php
session_start(); // Start session to access session variables

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Achievements</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> <!-- Google Fonts -->
    <link rel="stylesheet" href="socialmedia.css">
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
            </div><br>
    <?php

    // Function to share achievement on social media
    function shareAchievementOnSocialMedia($achievement, $platform, $username) {
        switch ($achievement) {
            case 'SmallCarbonFootprint':
                $description = "Achieved Small Carbon Footprint! 🌱 Taking steps towards a greener future. #Sustainability #GreenLiving";
                $postCaption = "Just achieved the Small Carbon Footprint milestone! 🌱 Join me in reducing carbon emissions for a sustainable future!";
                break;
            case 'ModerateCarbonFootprint':
                $description = "Achieved Moderate Carbon Footprint! 🌍 Contributing to a sustainable environment. #ClimateAction #EcoFriendly";
                $postCaption = "Excited to announce that I've achieved the Moderate Carbon Footprint milestone! 🌍 Let's make eco-friendly choices for our planet!";
                break;
            case 'LargeCarbonFootprint':
                $description = "Achieved Large Carbon Footprint! 🌳 Embracing eco-conscious choices for a healthier planet. #SustainableLiving #ReduceEmissions";
                $postCaption = "Just reached the Large Carbon Footprint milestone! 🌳 Let's prioritize sustainable living for a healthier planet!";
                break;
            case 'SuperUser':
                $description = "Achieved Super User status! 🚀 Leading the way towards carbon reduction. #CarbonFootprint #EcoChampion";
                $postCaption = "I'm now a Super User! 🚀 Leading the way towards carbon reduction. Join me in making a positive impact!";
                break;
            default:
                $description = "Achieved an environmental milestone! 🎉 #EnvironmentalAchievement #Sustainability";
                $postCaption = "Just achieved an environmental milestone! 🎉 Let's work together for a more sustainable future!";
        }

        switch ($platform) {
            case 'Twitter':
                $shareURL = "https://twitter.com/intent/tweet?text=" . urlencode($postCaption);
                break;
            case 'Pinterest':
                $shareURL = "https://pinterest.com/pin/create/button/?url=" . urlencode($postCaption) . "&description=" . urlencode($description);
                break;
            default:
                $shareURL = "#"; // Placeholder for unsupported platforms
        }

        return array('description' => $description, 'shareURL' => $shareURL);
    }

    // Check if the user is logged in
    if (isset($_SESSION['email'])) {
        // Initialize variables to track achievements
        $achievements = array(
            'ReducingCarbonFootprint' => false,
            'TrackingConsistently' => false,
            'SmallCarbonFootprint' => false,
            'ModerateCarbonFootprint' => false,
            'LargeCarbonFootprint' => false,
            'SuperUser' => false
        );

        // Retrieve historical data for the logged-in user
        $email = $_SESSION['email'];
        $sql = "SELECT total_carbon_footprint, timestamp FROM cal_carbonfootprint3 WHERE email = '$email' ORDER BY timestamp";
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result === false) {
            echo "Error: " . $conn->error;
        } else {

            // Process historical data to check for achievements
            $totalRecords = $result->num_rows;
            if ($totalRecords === 0) {
                // If no records found, display a message
                echo "<h2>You haven't gotten any achievement yet.</h2>";
            } else {

            if ($totalRecords > 0) {
                $reducedCarbonFootprint = false; // Flag to track if carbon footprint reduction achieved
                $trackedConsistently = false; // Flag to track if consistent tracking achieved
                $totalCarbonFootprint = 0; // Variable to store total carbon footprint for other achievements
                $maxCarbonFootprint = -1; // Variable to store max carbon footprint for other achievements

                while ($row = $result->fetch_assoc()) {
                    // Check for Achievement 1: Reducing Carbon Footprint
                    if ($reducedCarbonFootprint === false && isset($previousFootprint)) {
                        if ($row['total_carbon_footprint'] < $previousFootprint) {
                            $reducedCarbonFootprint = true;
                        }
                    }
                    $previousFootprint = $row['total_carbon_footprint'];

                    // Check for Achievement 2: Tracking Consistently
                    // For simplicity, let's assume consistent tracking if there are more than 10 records
                    if (!$trackedConsistently && $totalRecords > 10) {
                        $trackedConsistently = true;
                    }

                    // Calculate total carbon footprint and max carbon footprint
                    $totalCarbonFootprint += $row['total_carbon_footprint'];
                    if ($row['total_carbon_footprint'] > $maxCarbonFootprint) {
                        $maxCarbonFootprint = $row['total_carbon_footprint'];
                    }
                }

                // Check for Achievement 3: Small Carbon Footprint
                if ($totalCarbonFootprint <= 100) {
                    $achievements['SmallCarbonFootprint'] = true;
                }

                // Check for Achievement 4: Moderate Carbon Footprint
                if ($totalCarbonFootprint > 100 && $totalCarbonFootprint <= 500) {
                    $achievements['ModerateCarbonFootprint'] = true;
                }

                // Check for Achievement 5: Large Carbon Footprint
                if ($totalCarbonFootprint > 500) {
                    $achievements['LargeCarbonFootprint'] = true;
                }

                // Check for Achievement 6: Super User
                if ($maxCarbonFootprint < 50 && $trackedConsistently) {
                    $achievements['SuperUser'] = true;
                }
            }
        }
    }

        // Share achieved achievements on social media
        $shared = false; // Flag to track if achievement has been shared
        foreach ($achievements as $achievement => $achieved) {
            if ($achieved) {
                // Generate share links for each achieved achievement
                $data = shareAchievementOnSocialMedia($achievement, "Twitter", $_SESSION['username']);
                $description = $data['description'];
                $twitterShareURL = $data['shareURL'];

                $data = shareAchievementOnSocialMedia($achievement, "Pinterest", $_SESSION['username']);
                $pinterestShareURL = $data['shareURL'];

                // Display the achievement description and share links
                if (!$shared) {
                    echo "<div class='achievement-container'>";
                    echo "<h2>Achieved Achievement:</h2>";
                    echo "<p>$description</p>";
                    echo "<button onclick=\"shareOnSocialMedia('$twitterShareURL');\">Share on Twitter</button>";
                    echo "<button onclick=\"shareOnSocialMedia('$pinterestShareURL');\">Share on Pinterest</button>";
                    echo "</div>";
                    $shared = true; // Set the flag to true after sharing once
                }
            }
        }
    } else {
        // If user is not logged in, show a message or redirect to login page
        echo "<h2>Please log in to view achievements.</h2>";
    }
    ?>

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
</header>
</footer>

    <script>
        function shareOnSocialMedia(url) {
            var win = window.open(url, '_blank');
            if (win) {
                // Browser has allowed the window to be opened
                win.focus();
                alert("Sharing successful!");
            } else {
                // Browser has blocked the window from opening
                alert("Please allow pop-ups to share on social media.");
            }
        }
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Slick slider script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script>
    // JavaScript code here
    jQuery(document).ready(function($) {
            // Slick slider initialization
            $('.slider-nav').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                dots: true,
                centerMode: true,
                focusOnSelect: true,
                prevArrow: false,
                nextArrow: false
            });

            // Sign-out button click event
            $('#sign-out-button').on('click', function() {
                // Redirect to loginandsignup.php
                window.location.href = 'loginandsignup.php';
            });
        });
</script>

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
</body>
</html>