<?php
session_start();
include '../config.php';

if(!isset($_SESSION['user']) || $_SESSION['role']!='admin'){
    header("Location: login.php");
    exit;
}

if(isset($_POST['add_notice'])){
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    mysqli_query($conn, "INSERT INTO notices (title, description, created_at) VALUES ('$title','$description', NOW())");
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Notice</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {font-family: Arial, sans-serif; background:#f4f7f8; margin:0; padding:0;}
        .container {max-width:600px; margin:50px auto; background:#fff; padding:20px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);}
        h2 {text-align:center; color:#1abc9c;}
        form input[type=text], form textarea {width:100%; padding:10px; margin:10px 0; border:1px solid #ddd; border-radius:4px;}
        form input[type=submit] {background:#1abc9c; color:#fff; border:none; padding:10px 20px; border-radius:4px; cursor:pointer;}
        form input[type=submit]:hover {background:#16a085;}
        a.button {display:inline-block; margin-top:10px; background:#34495e; color:#fff; padding:8px 15px; text-decoration:none; border-radius:4px;}
        a.button:hover {background:#2c3e50;}
    </style>
</head>
<body>
<div class="container">
    <h2>Add New Notice</h2>
    <form method="post">
        <label>Title:</label>
        <input type="text" name="title" placeholder="Enter notice title" required>

        <label>Description:</label>
        <textarea name="description" rows="6" placeholder="Enter notice description" required></textarea>

        <input type="submit" name="add_notice" value="Add Notice">
    </form>
    <a class="button" href="dashboard.php">Back to Dashboard</a>
</div>
</body>
</html>
