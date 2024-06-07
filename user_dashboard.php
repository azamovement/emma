<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: user_login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
  <script>
    function loadContent(page) {
      const xhr = new XMLHttpRequest();
      xhr.open('GET', page, true);
      xhr.onload = function() {
        if (this.status === 200) {
          document.getElementById('content').innerHTML = this.responseText;
        }
      };
      xhr.send();
    }
  </script>
</head>
<body>
  <div class="navbar">
    <span>Welcome, <?php echo $_SESSION['user_name']; ?></span>
    <a href="user_logout.php" class="logout">Logout</a>
  </div>
  <div class="container">
    <div class="sidebar">
      <a href="javascript:void(0)" onclick="loadContent('dashboard.php')"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
      <a href="javascript:void(0)" onclick="loadContent('profile.php')"><i class="fas fa-user"></i> My Profile</a>
      <a href="javascript:void(0)" onclick="loadContent('buying_process.php')"><i class="fas fa-calendar-check"></i>Purchases here</a>
      <a href="javascript:void(0)" onclick="loadContent('cancelbooking.php')"><i class="fas fa-calendar-times"></i> Cancel purchasing</a>
      <a href="javascript:void(0)" onclick="loadContent('buyproduct.php')"><i class="fas fa-car"></i> Available Products</a>
    </div>
    <div class="content" id="content">
      <h2>Welcome to your Dashboard <?php echo $_SESSION['user_name']; ?> !</h2>
      <p> <b> Select a feature from the left sidebar.</b></p>
    </div>
  </div>
</body>
</html>
