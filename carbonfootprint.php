<?php

session_start();

// Check if the session variable for email is set
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    // Now you can use $email to insert into the database along with the carbon footprint data
} else {
    // Redirect to login page or handle the error if the email session variable isn't set
    header("Location: loginandsignup.php");
    exit;
}

// Database connection parameters
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "assignment"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Set timezone to Malaysia
date_default_timezone_set('Asia/Kuala_Lumpur');

// Function to calculate carbon footprint based on selections
function calculateCarbonFootprint($people, $home_size, $food, $water, $household, $waste, $recycle, $recycling_categories, $personal_miles, $public_miles, $flight_distance) {

    // Initialize carbon footprint
    $carbon_footprint = 0;

    // Calculation based on selections
    switch ($people) {
        case 1:
            $carbon_footprint += 14;
            break;
        case 2:
            $carbon_footprint += 12;
            break;
        case 3:
            $carbon_footprint += 10;
            break;
        case 4:
            $carbon_footprint += 8;
            break;
        case 5:
            $carbon_footprint += 6;
            break;
        case 6:
            $carbon_footprint += 4;
            break;
        default:
            $carbon_footprint += 2;
            break;
    }

    switch ($home_size) {
        case "apartment":
            $carbon_footprint += 2;
            break;
        case "small":
            $carbon_footprint += 4;
            break;
        case "medium":
            $carbon_footprint += 7;
            break;
        case  "large":
            $carbon_footprint += 10;
            break;
    }

    switch ($food) {
        case 1:
            $carbon_footprint += 10;
            break;
        case 2:
            $carbon_footprint += 8;
            break;
        case 3:
            $carbon_footprint += 4;
            break;
        case 4:
            $carbon_footprint += 2;
            break;
        case 5:
            $carbon_footprint += 12;
            break;
        case 6:
            $carbon_footprint += 6;
            break;
        case 7:
            $carbon_footprint += 2;
            break;
    }

    switch ($water) {
        case 1:
            $carbon_footprint += 1;
            break;
        case 2:
            $carbon_footprint += 2;
            break;
        case 3:
            $carbon_footprint += 3;
            break;
        case 4:
            break;                                                      // No points added if no dishwasher
        case 5:
            $carbon_footprint += 6;                                     // Perform calculation twice if both dishwasher and washing machine
            break;
    }

    switch ($household) {
        case 1:
            $carbon_footprint += 10;
            break;
        case 2:
            $carbon_footprint += 8;
            break;
        case 3:
            $carbon_footprint += 6;
            break;
        case 4:
            $carbon_footprint += 4;
            break;
        case 5:
            $carbon_footprint += 2;
            break;
    }

    switch ($waste) {
        case 1:
            $carbon_footprint += 50;
            break;
        case 2:
            $carbon_footprint += 40;
            break;
        case 3:
            $carbon_footprint += 30;
            break;
        case 4:
            $carbon_footprint += 20;
            break;
        case 5:
            $carbon_footprint += 5;
            break;
    }

    switch ($recycling_categories) {
        case 'glass':
            $carbon_footprint -= 0;
            break;
        case 'plastic':
            $carbon_footprint -= 0;
            break;
        case 'paper':
            $carbon_footprint -= 0;
            break;
        case 'aluminum':
            $carbon_footprint -= 0;
            break;
        case 'steel':
            $carbon_footprint -= 0;
            break;
        case 'food_waste':
            $carbon_footprint -= 0;
            break;
    }
    return $carbon_footprint;
}


// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $people = mysqli_real_escape_string($conn, $_POST['people']);
    $home_size = mysqli_real_escape_string($conn, $_POST['home_size']);
    $food = mysqli_real_escape_string($conn, $_POST['food']);
    $water = mysqli_real_escape_string($conn, $_POST['water']);
    $household = mysqli_real_escape_string($conn, $_POST['household']);
    $waste = mysqli_real_escape_string($conn, $_POST['waste']);
    $recycle = isset($_POST["recycle"]) ? $_POST["recycle"] : "no";
    $recycling_categories = $recycle === 'yes' && isset($_POST['recycling_categories']) ? serialize($_POST['recycling_categories']) : serialize([]);
    $personal_miles = mysqli_real_escape_string($conn, $_POST['personal_miles']);
    $public_miles = mysqli_real_escape_string($conn, $_POST['public_miles']);
    $flight_distance = mysqli_real_escape_string($conn, $_POST['flight_distance']);


    // Retrieve values from form
    $people = $_POST["people"];
    $home_size = $_POST["home_size"];
    $food = $_POST["food"];
    $water = $_POST["water"];
    $household = $_POST["household"];
    $waste = $_POST["waste"];
    $recycle = isset($_POST["recycle"]) ? $_POST["recycle"] : "no";
    $recycling_categories = $recycle === 'yes' && isset($_POST['recycling_categories']) ? $_POST['recycling_categories'] : [];
    $personal_miles = isset($_POST['personal_miles']) ? $_POST['personal_miles'] : 0;
    $public_miles = isset($_POST['public_miles']) ? $_POST['public_miles'] : 0;

    // Check if flight_distance is set and is one of the valid ENUM options
    $flight_distance = isset($_POST['flight_distance']) && in_array($_POST['flight_distance'], ['short', 'medium', 'long']) ? $_POST['flight_distance'] : NULL;
  

    // Calculate carbon footprint
    $carbon_footprint = calculateCarbonFootprint($people, $home_size, $food, $water, $household, $waste, $recycle, $recycling_categories, $personal_miles, $public_miles, $flight_distance);
    $living_situation_carbon_footprint = $carbon_footprint; 
    // Assign to the living_situation_carbon_footprint variable


    //Add up points for transportation
    $transportation_score = 0;

    //Add your transportation score calculation here
    $personal_miles = isset($_POST['personal_miles']) ? (int) $_POST['personal_miles'] : 0;
    $public_miles = isset($_POST['public_miles']) ? (int) $_POST['public_miles'] : 0;
    $flight_distance = isset($_POST['flight_distance']) ? $_POST['flight_distance'] : '';
    
    // Add points based on the provided instructions
    // Personal Vehicle Usage
    
    switch ($personal_miles) {
        case '15000+':
            $transportation_score += 12;
            break;
        case '10000-14999':
            $transportation_score += 10;
            break;
        case '1000-9999':
            $transportation_score += 6;
            break;
        case '0-999':
        default:
            $transportation_score += 4;
            break;
    }
    
    // Public Transportation Usage
    switch ($public_miles) {
        case '15000+ ':
            $transportation_score += 12;
            break;
        case '10000-14999':
            $transportation_score += 10;
            break;
        case '1000-9999':
            $transportation_score += 6;
            break;
        case '0-999':
        default:
            $transportation_score += 2;
            break;
        }

    if ($flight_distance == 'short') {
        $transportation_score += 2;
    } elseif ($flight_distance == 'medium') {
        $transportation_score += 6;
    } elseif ($flight_distance == 'long') {
        $transportation_score += 20;
    }

    // Combine both carbon footprints
    $totalCarbonFootprint = $living_situation_carbon_footprint + $transportation_score;

    
    // Output total carbon footprint in a message box
    echo "<div class='message-box'>";
    echo "<h2>Total Carbon Footprint Score: $totalCarbonFootprint</h2>";

    // Offer suggestions based on score
    if ($totalCarbonFootprint < 60) {
        echo "<p>Your total carbon footprint is relatively low. Keep up the good work!</p>";
    } else {
        echo "<p>Your carbon footprint is higher than average. Here are some suggestions to help you reduce your impact:</p>";
        echo "<ul>";
        echo "<li>Replace old appliances with energy-efficient ones.</li>";
        echo "<li>Purchase items with less packaging to reduce waste.</li>";
        echo "<li>Use public transportation or carpool whenever possible to reduce emissions from personal vehicles.</li>";
        echo "<li>Consider composting food waste to reduce methane emissions from landfills.</li>";
        echo "<li>Recycle items whenever possible to reduce waste and conserve resources.</li>";
        echo "</ul>";
    }
    echo "</div>"; // Close the message box div

    // Serialize the array of selected recycling categories
    $recycling_categories_serialized = !empty($recycling_categories) ? serialize($recycling_categories) : '';

    // SQL query to insert data into table
    $sql = "INSERT INTO cal_carbonfootprint3(email, people, home_size, food, water, household, waste, recycle, recycling_categories, personal_miles, public_miles, flight_distance, total_carbon_footprint, timestamp) 
    VALUES ('$email','$people', '$home_size', '$food', '$water', '$household', '$waste', '$recycle', '$recycling_categories_serialized', '$personal_miles', '$public_miles', '$flight_distance', '$totalCarbonFootprint', NOW())";


    // Execute query
    if ($conn->query($sql) === TRUE) {
        // Success message
        echo "<script>alert('New record created successfully');</script>";
    } else {
        // Error message
        echo "<script>alert('Error: " . $sql . "\\n" . $conn->error . "');</script>";
    }
}

// Retrieve data from the database...
$sql = "SELECT * FROM cal_carbonfootprint3";
$result = $conn->query($sql);


// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbon Footprint Calculator</title>

    <!-- Include CSS links here -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic&amp;subset=latin&amp;' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Noto+Sans%3Aregular%2Citalic%2C700%2C700italic&amp;subset=greek%2Ccyrillic-ext%2Ccyrillic%2Clatin%2Clatin-ext%2Cvietnamese%2Cgreek-ext&amp;' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Merriweather%3A300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic&amp;subset=latin%2Clatin-ext&amp;' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Mystery+Quest%3Aregular&amp;subset=latin%2Clatin-ext&amp;' type='text/css' media='all' />


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

    <!--Css-->
    <link rel="stylesheet" href="carbonfootprint.css">
</head>
<!-- Header content goes here -->
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
                                <li class="menu-item menu-item-has-children"><a href="account.php">My Account</a>
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
                                    <a href="account.php" class="sf-with-ul-pre">My Account</a>
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
    </head>  
    <h1>Carbon Footprint Calculator</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">

    <h2>Living Situation</h2>
        <label for="people">Number of People in Household:</label>
        <select name="people" id="people">
            <option>Please Select One</option>
            <option value="1">Alone</option>
            <option value="2">1</option>
            <option value="3">2</option>
            <option value="4">3</option>
            <option value="5">4</option>
            <option value="6">5</option>
            <option value="7">>5</option>
        </select><br><br>

        <h2>Home Size</h2>
        <label for="home_size">Select your home size:</label>
        <select name="home_size" id="home_size">
            <option>Please Select One</option>
            <option value="apartment">Apartment</option>
            <option value="small">Small House</option>
            <option value="medium">Medium-sized House</option>
            <option value="large">Large House</option>
        </select><br><br>

        <h2>Food Choices</h2>
        <label for="food">Eating habits:</label>
        <select name="food" id="food">
            <option>Please Select One</option>
            <option value="1">Consume domestic meat on daily basis</option>
            <option value="2">Consume domestic meat a few times per week</option>
            <option value="3">Vegetarian</option>
            <option value="4">Vegan or only eat wild meat</option>
            <option value="5">Convenient food (frozen pizza, cereal, potato chips etc)</option>
            <option value="6">Good balance of fresh and convenience food</option>
            <option value="7">Only fresh, locally grown, hunted food</option>
        </select><br><br>

        <h2>Water Consuption</h2>
        <label for="water">Times you run your dishwasher or washing machine per week:</label>
        <select name="water" id="water">
            <option>Please Select One</option>
            <option value="1">Run it 1 to 3 times</option>
            <option value="2">Run it 4 to 9 times</option>
            <option value="3">Run diswasher or washing machine more than 9 times per week</option>
            <option value="4">Don't have a dishwasher</option>
            <option value="5">You have a dishwasher and a washing machine</option>
        </select><br><br>

        <h2>Household purchases each year</h2>
        <label for="household">How many household purchases you make each year(furniture, electronics, or other household gadgets):</label>
        <select name="household" id="household">
            <option>Please Select One</option>
            <option value="1">7 items and above</option>
            <option value="2">5-7 items</option>
            <option value="3">3-5 items </option>
            <option value="4">less than 3 items</option>
            <option value="5">Purchase almost nothing or only secondhand items</option>
        </select><br><br>

        <h2>Waste Production</h2>
        <label for="waste">How much cans of garbage you produce each week:</label>
        <select name="waste" id="waste">
            <option>Please Select One</option>
            <option value="1">4 and more</option>
            <option value="2">3</option>
            <option value="3">2 </option>
            <option value="4">1</option>
            <option value="5">Half of a garbage can or less</option>
        </select><br><br>

        <h2>Recycling</h2>
        <label>Do you recycle?</label><br>
        <input type="radio" name="recycle" value="yes" id="recycle_yes" onclick="toggleRecyclingOptions()"> Yes<br>
        <input type="radio" name="recycle" value="no" id="recycle_no" onclick="toggleRecyclingOptions()"> No<br><br>

    <div id="recyclingOptions" style="display: none;">
        <p>Select the types of items you recycle:</p>
        <input type="checkbox" name="recycling_categories" id="glass" value="glass" name="glass">
        <label for="glass">Glass</label><br>
        <input type="checkbox" name="recycling_categories" id="plastic" value="plastic" name="plastic">
        <label for="plastic">Plastic</label><br>
        <input type="checkbox" name="recycling_categories" id="paper" value="paper" name="paper">
        <label for="paper">Paper</label><br>
        <input type="checkbox" name="recycling_categories" id="aluminum" value="aluminum" name="aluminum">
        <label for="aluminum">Aluminum</label><br>
        <input type="checkbox" name="recycling_categories" id="steel" value="steel" name="steel">
        <label for="steel">Steel</label><br>
        <input type="checkbox" name="recycling_categories" id="food_waste" value="food_waste" name="food_waste">
        <label for="food_waste">Food Waste (Composting)</label><br>
    </div>

<script>
function toggleRecyclingOptions() {
    var recycleYes = document.getElementById("recycle_yes");
    var recyclingOptions = document.getElementById("recyclingOptions");

    if (recycleYes.checked) {
        recyclingOptions.style.display = "block"; // Show recycling options
    } else {
        recyclingOptions.style.display = "none"; // Hide recycling options
    }
}

</script>

<body>
        <h2>Annual trasportation scores</h2>
        <!--<label for="transportation">How far you travel in a personal vehicle, with public transportation and by plane:</label>
        <select name="transportation" id="tranasportation">-->

        <h2>Personal Vehicle Usage</h2>
        <label for="personal_miles">Annual miles traveled :</label><br>
        <select name="personal_miles" id="personal_miles">
            <option>Please Select One</option>
            <option value="0 - 999">0 - 999 miles</option>
            <option value="1000 - 9999">1000 - 9999 miles</option>
            <option value="10000 - 14999">10000 - 14999 miles</option>
            <option value="15000+ ">15000+ miles</option>
        </select><br><br>

        <h2>Public Transportation Usage</h2>
        <label for="public_miles">Annual miles traveled :</label><br>
        <select name="public_miles" id="public_miles">
            <option>Please Select One</option>
            <option value="0 - 999">0 - 999 miles</option>
            <option value="1000 - 9999">1000 - 9999 miles</option>
            <option value="10000 - 14999">10000 - 14999 miles</option>
            <option value="15000+ ">15000+ miles</option>
        </select><br><br>
        
        <h2>Flight Usage</h2>
        <label for="flight_distance">Select the furthest distance you travel by plane in a year:</label>
        <select name="flight_distance" id="flight_distance">
            <option>Please Select One</option>
            <option value="short">Short distances (within state)</option>
            <option value="medium">Medium distances (nearby state or country)</option>
            <option value="long">Long distances (another continent)</option>
        </select><br><br>

    <!-- Error message div -->
    <div id="errorMessages" style="color: red;"></div>

    <!-- Submit button -->
    <input type="submit" name="submit" value="Calculate Carbon Footprint">
    </form>

    <!-- JavaScript function for form validation -->
    <script>
       function validateForm() {
        var people = document.getElementById("people").value;
        var homeSize = document.getElementById("home_size").value;
        var food = document.getElementById("food").value;
        var water = document.getElementById("water").value;
        var household = document.getElementById("household").value;
        var waste = document.getElementById("waste").value;
        var recycleYes = document.getElementById("recycle_yes").checked;
        var recycleNo = document.getElementById("recycle_no").checked;
        var recyclingCategories = document.querySelectorAll('input[name="recycling_categories"]:checked').length;
        var personal_miles = document.getElementById("personal_miles").value
        var public_miles = document.getElementById("public_miles").value
        var flight_distance = document.getElementById("flight_distance").value

        var errorMessages = document.getElementById("errorMessages");
        errorMessages.innerHTML = ""; // Clear previous error messages

        var isValid = true;

    // Validate each field and display error messages
    if (people === "Please Select One") {
        errorMessages.innerHTML += "Please select the number of people in the household<br>";
        isValid = false;
    }

    if (homeSize === "Please Select One") {
        errorMessages.innerHTML += "Please select your home size<br>";
        isValid = false;
    }

    if (food === "Please Select One") {
        errorMessages.innerHTML += "Please select your eating habits<br>";
        isValid = false;
    }

    if (water === "Please Select One") {
        errorMessages.innerHTML += "Please select the times you run your dishwasher or washing machine per week<br>";
        isValid = false;
    }

    if (household === "Please Select One") {
        errorMessages.innerHTML += "Please select how many household purchases you make each year<br>";
        isValid = false;
    }

    if (waste === "Please Select One") {
        errorMessages.innerHTML += "Please select how much garbage you produce each week<br>";
        isValid = false;
    }

    if (flight_distance === "Please Select One") {
        errorMessages.innerHTML += "Please select the furthest distance you travel by plane in a year<br>";
        isValid = false;
    }
    

    if (!recycleYes && !recycleNo) {
        errorMessages.innerHTML += "Please select whether you recycle or not<br>";
        isValid = false;
    } else if (recycleYes && recyclingCategories === 0) {
        errorMessages.innerHTML += "Please select at least one recycling category<br>";
        isValid = false;
    }

    // Return false if any field is invalid
    return isValid;
}
if ($recycle == "yes") {
    // Start with 24 points for recycling
    $carbon_footprint += 24;
    // Determine how many categories of recycling are checked
    $total_recycling_categories = count($recycling_categories);
    // Subtract 4 points for each recycling category
    $carbon_footprint -= 4 * $total_recycling_categories;
} else {
    // Add 24 points if the user does not recycle
    $carbon_footprint += 24;
}

</script>
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