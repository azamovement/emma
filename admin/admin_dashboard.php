<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  
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
  <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
    }
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
    }

    .navbar .logout {
        color: blue;
        text-decoration: none;
        background-color:#fff;
        text-align:center;
        width: 65px;
        height:30px;
        border-radius:5px;
    }

    .navbar .logout:hover {
        text-decoration: underline;
    }


    .container {
        display: flex;
        flex: 1;
        height: calc(100vh - 50px);
    }

    .sidebar {
        width: 200px;
        background-color: #333;
        padding: 20px;
        box-sizing: border-box;
        height: 100%;
        position: fixed;
        top: 50px;
        left: 0;
    }

    .sidebar a {
        display: block;
        color: #fff;
        padding: 10px;
        text-decoration: none;
        margin-bottom: 10px;
    }

    .sidebar a:hover {
        background-color: #007bff;
    }

    .content {
        margin-left: 220px;
        padding: 20px;
        width: calc(100% - 220px);
        box-sizing: border-box;
    }


    .dashboard-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .dashboard-box {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        transition: transform 0.3s;
    }

    .dashboard-box:hover {
        transform: scale(1.05);
    }

    .dashboard-box i {
        font-size: 3em;
        color: #007bff;
        margin-right: 20px;
    }

    .dashboard-box .details {
        flex-grow: 1;
    }

    .dashboard-box .details h3 {
        margin: 0;
        font-size: 1.5em;
        color: #333;
    }

    .dashboard-box .details p {
        margin: 5px 0 0;
        color: #666;
    }

    .view-link {
        font-weight: bold;
        color: #007bff;
    }

  </style>
</head>
<body>
  <div class="navbar">
    <span>Welcome, <?php echo $_SESSION['admin_name']; ?></span>
    <a href="admin_logout.php" class="logout">Logout</a>
  </div>
  <div class="container">
     <div class="sidebar">
        <a href="javascript:void(0)" onclick="loadContent('dashboard.php')"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="javascript:void(0)" onclick="loadContent('retrieve_users.php')"><i class="fas fa-users"></i> Users</a>
        <a href="javascript:void(0)" onclick="loadContent('add_product.php')"><i class="fas fa-box-open"></i>  add_product</a>
        <a href="javascript:void(0)" onclick="loadContent('buying.php')"><i class="fas fa-calendar-check"></i> buyed</a>
        <a href="javascript:void(0)" onclick="loadContent('feedback.php')"><i class="fas fa-message"></i>  Feedback</a>
        <a href="javascript:void(0)" onclick="loadContent('password_resets.php')"><i class="fas fa-key"></i> Password Resets</a>
     </div>

     <div class="content" id="content">
       <h2>Welcome to the Admin Dashboard, <?php echo $_SESSION['admin_name']; ?>!</h2>
       <div class="dashboard-grid">
        <div class="dashboard-box" onclick="loadContent('retrieve_users.php')">
           <i class="fas fa-users"></i>
           <div class="details">
             <h3>Users</h3>
             <p>Manage all registered users</p>
           </div>
          <span class="view-link">View</span>
        </div>

        <div class="dashboard-box" onclick="loadContent('admin_add_product.php')">
          <i class="fas fa-box-open"></i>
          <div class="details">
            <h3>products</h3>
            <p>products management</p>
          </div>
          <span class="view-link">View</span>
        </div>

        <div class="dashboard-box" onclick="loadContent('buying.php')">
          <i class="fas fa-calendar-check"></i>
          <div class="details">
            <h3>buying</h3>
            <p>Manage all product</p>
          </div>
          <span class="view-link">View</span>
        </div>

        <div class="dashboard-box" onclick="loadContent('feedback.php')">
          <i class="fas fa-message"></i>
          <div class="details">
            <h3>Feedback</h3>
            <p>view all user message</p>
          </div>
          <span class="view-link">View</span>
        </div>

        <div class="dashboard-box" onclick="loadContent('password_resets.php')">
          <i class="fas fa-key"></i>
          <div class="details">
            <h3>Password Resets</h3>
            <p>Manage password reset requests</p>
          </div>
          <span class="view-link">View</span>
        </div>
      </div>
    </div>
  </div>
</body>
</html>