<?php
require("connection.php");

// Check if the 'success' parameter is set in the URL
if (isset($_GET['success'])) {
  $success_message = $_GET['success'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Content</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Bootstrap Icons CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Your custom CSS file -->
  <link rel="stylesheet" href="style2.css">
</head>

<body class="--bs-dark-bg-subtle">
  <div class="container text-light p-3 rounded my-4" >
    <div class="d-flex align-items-center justify-content-between px-1">
      <h2>
        <a class="text-black text-decoration-none">Admin Page</a>
      </h2>
      <div class="d-flex align-items-center">
        <!-- Add Content button triggering modal -->
        
        <!-- Logout button -->
        <a href="surveyadmin.php" class="btn btn-info me-2">
          View Survey <i class="bi bi-book"></i>
        </a>
        <a href="edituserpage.php" class="btn btn-primary me-2">
          Edit User <i class="bi bi-person"></i>
        </a>
        <a href="loginandsignup.php?logout=1" class="btn btn-danger">
                    Logout <i class="bi bi-box-arrow-left"></i>
                </a>
      </div>
    </div>
  </div>

<?php
if(isset($_GET['alert']))
{
  if($_GET['alert']=='img_upload')
  {
    echo<<<alert
    <div class="container alert alert-danger alert-dismissible text-center" id="alert-msg" role="alert">
      <strong>Image Upload Failed! Only accept(jpg, jpeg, png, webp)</strong>
    </div>
    alert;
  }

  if($_GET['alert']=='img_rem_fail')
  {
    echo<<<alert
    <div class="container alert alert-danger alert-dismissible text-center" id="alert-msg" role="alert">
      <strong>Image size must below 5MB!</strong>
    </div>
    alert;
  }

  if($_GET['alert']=='file_too_large')
  {
    echo<<<alert
    <div class="container alert alert-danger alert-dismissible text-center" id="alert-msg" role="alert">
      <strong>Image size must below 5MB!</strong>
    </div>
    alert;
  }
 
  if($_GET['alert']=='added_fail')
  {
    echo<<<alert
    <div class="container alert alert-danger alert-dismissible text-center"  id="alert-msg" role="alert">
      <strong>Cannot Add Content!</strong>
    </div>
    alert;
  }
  if($_GET['alert']=='remove_failed')
  {
    echo<<<alert
    <div class="container alert alert-danger alert-dismissible text-center"  id="alert-msg" role="alert">
      <strong>Failed to Remove!</strong>
    </div>
    alert;
  }
  if($_GET['alert']=='upload_failed')
  {
    echo<<<alert
    <div class="container alert alert-danger alert-dismissible text-center" id="alert-msg" role="alert">
      <strong>FAILED TO UPLOAD THE CONTENT!</strong>
    </div>
    alert;
  }
}

else if(isset($_GET['success']))
{
  if($_GET['success']=='updated')
  {
    echo<<<alert
    <div class="container alert alert-success alert-dismissible text-center" id="success-msg" role="alert">
      <strong>Product Updated</strong>
    </div>
    alert;
  }

  if($_GET['success']=='added')
  {
    echo<<<alert
    <div class="container alert alert-success alert-dismissible text-center" id="success-msg" role="alert">
      <strong>Content Added</strong>
    </div>
    alert;
  }

  
  if($_GET['success']=='removed')
  {
    echo<<<alert
    <div class="container alert alert-success alert-dismissible text-center" id="success-msg" role="alert">
      <strong>Content Removed</strong>
    </div>
    alert;
  }
  if($_GET['success']=='set')
  {
    echo<<<alert
    <div class="container alert alert-success alert-dismissible text-center" id="success-msg" role="alert">
      <strong>New Password Set Successfully</strong>
    </div>
    alert;
  }
}
?>

<div class="container mt-4 p-0">
  <table class="table table-striped table-hover ">
      <thead class="thead-light" >
      <tr>
        <th width="5%" scope="col" class="rounded-start">Content No</th>    
        <th width="20%" scope="col">Image/Infographic/Video</th>
        <th width="15%" scope="col">Category</th>
        <th width="15%" scope="col">Title</th>
        <th width="35%" scope="col">Description</th>
        <th width="10%" scope="col" class="rounded-end">Action</th>
      </tr>   
      </thead>
      <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addContentModal">
          <i class="bi bi-plus-lg"></i> Add Content
        </button>
      <tbody class=bg-white>
      <?php
$query = "SELECT * FROM uploadContent";
$result = mysqli_query($con, $query);
$i = 1;
$fetch_src = FETCH_SRC;

while ($fetch = mysqli_fetch_assoc($result)) {
    echo '<tr class="align-middle">';
    echo '<th scope="row">' . $i . '</th>';
    echo '<td>';
    
    // Check the content type
    if ($fetch['typeOfContent'] === 'Image' || $fetch['typeOfContent'] === 'Infographic') {
        // Display image
        echo '<img src="' . $fetch_src . $fetch['content'] . '" width="150px">';
    } elseif ($fetch['typeOfContent'] === 'Video') {
        // Display video
        echo '<video width="150" controls>';
        echo '<source src="' . $fetch_src . $fetch['content'] . '" type="video/mp4">';
        echo 'Your browser does not support the video tag.';
        echo '</video>';
    }
    
    echo '</td>';
    echo '<td>' . $fetch['categoryOfContent'] . '</td>';
    echo '<td>' . $fetch['title'] . '</td>';
    echo '<td>' . $fetch['description'] . '</td>';
    echo '<td>';
    echo '<button onclick="confirm_rem(' . $fetch['contentID'] . ')" class="btn btn-danger me-2"><i class="bi bi-trash"></i></button>';
    echo '</td>';
    echo '</tr>';  
    $i++;
}
?>
      </tbody>
    </table>
    <br>
    <br>
    <br>
</div>

   <!-- Add Content Modal -->
  <div class="modal fade" id="addContentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="control.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title">Add Content</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <!-- Modal Body -->
          <div class="modal-body">
              <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" name="content" id="content"required>
                  <option value="" disabled selected>Select Type Of Content</option>
                  <option value="Image">Image</option>
                  <option value="Infographic">Infographic</option>
                  <option value="Video">Video</option>
                </select>
              </div>

              <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" name= "category" required>
                <option value="" disabled selected>Select Type Of Category</option>
                <option value="Transportation">Transportation</option>
                <option value="Dietary Choice">Dietary Choice</option>
                <option value="Energy Consumption">Energy Consumption</option>
                <option value="Environmental Issue">Environmental Issue</option>
                </select>
              </div>
          
              <div class="input-group mb-3">
                <span class="input-group-text">Title</span>
                <input type="text" class="form-control" name="title" required>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text">Description</span>
                <textarea class="form-control" name="desc" required></textarea>
              </div>

              <div class="input-group mb-3">
                <input type="file" class="form-control" name="image" id="fileInput" accept=".jpg,.png,.jpeg,.webp,.mp4" required>
                <input type="hidden" name="MAX_FILE_SIZE" value="20971520">
              </div>
              <small id="fileError" class="text-danger"></small>
          </div>

          
          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="reset" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-outline-success" name="addcontent">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>
<script>
function confirm_rem(id){
    if(confirm("Are you sure, you want to delete this content?")){
      window.location.href="control.php?rem="+id;
    }
  }
</script>



<script>
function validateForm() {
    var contentType = document.getElementById("content").value;
    var fileInput = document.getElementById("fileInput");
    var allowedFormats = [];
    var maxSize = 0;

    // Clear previous error messages
    document.getElementById("fileError").innerText = "";

    // Determine the allowed formats and max size based on the selected content type
    switch (contentType) {
        case "Image": // Image
        case "Infographic": // Infographic
            allowedFormats = [".jpg", ".jpeg", ".png", ".webp"];
            maxSize = 5242880; // 5 MB in bytes
            break;
        case "Video": // Video
            allowedFormats = [".mp4"];
            maxSize = 20971520; // 20 MB in bytes
            break;
        default:
            break;
    }

    // Set the MAX_FILE_SIZE dynamically
    document.getElementsByName("MAX_FILE_SIZE")[0].value = maxSize;

    // Check if the selected file format is allowed
    var fileName = fileInput.value.toLowerCase();
    var isValidFormat = allowedFormats.includes("." + fileName.split(".").pop());

    if (!isValidFormat) {
        document.getElementById("fileError").innerText = "Invalid file format. Please select a valid file.";
        return false;
    }

    // Check if the file size is within the allowed limit
    if (fileInput.files[0].size > maxSize) {
        document.getElementById("fileError").innerText = "File size exceeds the allowed limit. Maximum (Image: 5MB) (Video: 500MB)";
        return false;
    }

    // Attach event listeners after form validation
    document.getElementById("content").addEventListener("change", validateForm);
    document.querySelector("form").addEventListener("submit", validateForm);

    return true;
}

</script>



  <!-- JavaScript and Bootstrap Bundle -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>

  <!-- JavaScript to hide success and alert messages after 4 seconds -->
  <script>
    setTimeout(function() {
      document.getElementById('success-msg').style.display = 'none';
    }, 4000);

    setTimeout(function() {
      document.getElementById('alert-msg').style.display = 'none';
    }, 4000);
  </script>
</body>
</html>
  