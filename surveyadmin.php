<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Survey Responses</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Survey Responses</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Email</th>
          <th>Design</th>
          <th>Navigation</th>
          <th>Usability</th>
          <th>Met Needs</th>
          <th>Improvements</th>
        </tr>
      </thead>
      <tbody>
      

        <?php

          // Connect to database
          $conn = mysqli_connect("localhost", "username", "password", "assignment");
          $sql = "SELECT * FROM Survey_Responses";
            echo $sql;


          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          // SQL query to retrieve data
          $sql = "SELECT id, email, Design, Navigation, Usability, Met_needs, improvements FROM Survey_Responses";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              // Output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["id"] . "</td>";
                  echo "<td>" . $row["email"] . "</td>";
                  echo "<td>" . $row["Design"] . "</td>";
                  echo "<td>" . $row["Navigation"] . "</td>";
                  echo "<td>" . $row["Usability"] . "</td>";
                  echo "<td>" . $row["Met_needs"] . "</td>";
                  echo "<td>" . $row["improvements"] . "</td>";
                  echo "</tr>";

              }
          } else {
              echo "<tr><td colspan='7'>No records found</td></tr>";
          }
          $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
