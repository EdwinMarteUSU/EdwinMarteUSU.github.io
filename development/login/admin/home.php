<?php
include('../functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="./header/header.css">
    <style>
    .header {
        background: #003366;
    }
    button[name=register_btn] {
        background: #003366;
    }
    </style>
</head>
<body>
    <div class="header">
        <h2>Admin - Home Page</h2>
    </div>
    <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <!-- logged in user information -->
        <div class="profile_info">
            <div>
                <?php  if (isset($_SESSION['user'])) : ?>
                    <strong><?php echo $_SESSION['user']['username']; ?></strong>

                    <small>
                        <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                    </small>

                <?php endif ?>
            </div>
                        <a id="logoutButton" href="home.php?logout='1'" style="color: #9B0303;">logout</a>
        </div>
            <div id="menu">
                <ul>
                    <li><a href="create_user.php">Add New Admin User</a></li>
                    <li><a href="agenda/index.php">Exam Scheduler</a></li>
                    <li><a href="editExams/index.php">Edit Exams</a></li>
                    <li><a href="journal/journal.php">Exam Journal</a></li>
                </ul>
            </div>
    </div>
</body>
</html>
