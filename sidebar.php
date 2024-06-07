<?php
session_start();
?>

<div class="sidebar">
    <div class="nav-header">
        <span>Welcome, Admin</span>
        <a href="admin_logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    <a href="retrieve_users.php"><i class="fas fa-users"></i> Users</a>
    <a href="vehicles.php"><i class="fas fa-car"></i> products</a>
    <a href="bookings.php"><i class="fas fa-calendar-check"></i>purchases</a>
    <a href="password_resets.php"><i class="fas fa-key"></i> Password Resets</a>
</div>
