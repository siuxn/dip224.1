<?php
// Include the connection file
require("connection.php");



// Check if the form is submitted for updating user data
if (isset($_POST['update'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $usertype = $_POST['usertype'];

    // Update user data in the database
    $query = "UPDATE login SET password='$password', username='$username', usertype='$usertype' WHERE email='$email'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Redirect to the user edit page with success message
        header("Location: edituserpage.php?success=updated");
        exit();
    } else {
        // Redirect to the user edit page with error message
        header("Location: edituserpage.php?alert=update_failed");
        exit();
    }
}

// Check if the 'success' parameter is set in the URL
if (isset($_GET['success'])) {
    $success_message = $_GET['success'];
}

// Check if the 'alert' parameter is set in the URL
if (isset($_GET['alert'])) {
    $alert_message = $_GET['alert'];
}

// Fetch all users from the database
$query = "SELECT * FROM login";
$result = mysqli_query($con, $query);

// Check if any user data is found
if (mysqli_num_rows($result) > 0) {
    // Fetch all user data and store them in an array
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // No user data found
    $users = [];
}
// Check if the action parameter is set and if it's a delete action
if(isset($_GET['action']) && $_GET['action'] === 'delete') {
    // Check if the email parameter is set
    if(isset($_GET['email'])) {
        $email = $_GET['email'];
        
        // Delete user from the database
        $query = "DELETE FROM login WHERE email='$email'";
        $result = mysqli_query($con, $query);
        
        if($result) {
            // Redirect back to the user edit page with success message
            header("Location: edituserpage.php?success=deleted");
            exit();
        } else {
            // Redirect back to the user edit page with error message
            header("Location: edituserpage.php?alert=delete_failed");
            exit();
        }
    }
}

// Check if the form is submitted for adding a new user
if (isset($_POST['add'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $usertype = $_POST['usertype'];

    // Validate unique email and username
    $emailCheckQuery = "SELECT * FROM login WHERE email='$email'";
    $usernameCheckQuery = "SELECT * FROM login WHERE username='$username'";
    $emailCheckResult = mysqli_query($con, $emailCheckQuery);
    $usernameCheckResult = mysqli_query($con, $usernameCheckQuery);

    if (mysqli_num_rows($emailCheckResult) > 0) {
        $alert_message = "Email already exists.";
    } elseif (mysqli_num_rows($usernameCheckResult) > 0) {
        $alert_message = "Username already exists.";
    } else {
        // Insert new user into the database
        $insertQuery = "INSERT INTO login (email, password, username, usertype) VALUES ('$email', '$password', '$username', '$usertype')";
        $insertResult = mysqli_query($con, $insertQuery);

        if ($insertResult) {
            // Redirect to the user edit page with success message
            header("Location: edituserpage.php?success=added");
            exit();
        } else {
            // Redirect to the user edit page with error message
            $alert_message = "Failed to add user.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Edit Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Your custom CSS file -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="--bs-dark-bg-subtle">
    <div class="container text-light p-3 rounded my-4">
        <div class="d-flex align-items-center justify-content-between px-1">
            <h2>
                <a class="text-black text-decoration-none">User Edit Page</a>
            </h2>
            <div class="d-flex align-items-center">
                <a href="admin.php" class="btn btn-primary me-2">
                    Edit Content <i class="bi bi-house"></i>
                </a>
                <a href="loginandsignup.php?logout=1" class="btn btn-danger">
                    Logout <i class="bi bi-box-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <!-- Display success or alert messages -->
        <?php if (isset($success_message)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($alert_message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $alert_message; ?>
            </div>
        <?php endif; ?>

        <!-- Add user button -->
        <body class="--bs-dark-bg-subtle">
    <div class="container mt-4">
        <h2>Add User</h2>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
            Add User
        </button>

        <!-- Add User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="usertype" class="form-label">User Type</label>
                                <select class="form-select" id="usertype" name="usertype" required>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="add">Add User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

        <!-- Display users in a table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Username</th>
                    <th>User Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['password']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['usertype']; ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal" data-email="<?php echo $user['email']; ?>">
                                Edit
                            </button>
                            <a href="edituserpage.php?action=delete&email=<?php echo $user['email']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap Modal for Edit User -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="email" id="editUserEmail">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="usertype" class="form-label">User Type</label>
                            <select class="form-select" id="usertype" name="usertype">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Edit User Modal -->
</body>

</html>
