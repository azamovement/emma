<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Navigation Header</title>
</head>
<body>
<div id="mySidepanel" class="sidepanel">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
 <nav>
    <ul>
    <li><a href="home.php">Home</a></li>
   <li> <a href="user_register.php" class="btn">Register</a></li>
     <li><a href="user_login.php">New Products</a></li>
      <li><a href="about.php">About</a></li>
     <li><a href="contact.php">Contact</a></li>
            <li><a href="admin/admin_login.php">Login as Admin</a></li>
            <li><a href="user_login.php">Login as User</a></li>
      </li>
    </ul>
  </nav>
</div>

<button class="openbtn" onclick="openNav()">☰ Menu</button>  
<script>
function openNav() {
  document.getElementById("mySidepanel").style.width = "260px";
  document.getElementById("mySidepanel").style.height = "500px";
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}
</script>
   
</body>
</html>