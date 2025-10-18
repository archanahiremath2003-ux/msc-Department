<?php
include 'config.php';

// Add Notice
if(isset($_POST['add_notice'])){
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    mysqli_query($conn, "INSERT INTO notices (title, description) VALUES ('$title','$description')");
    header("Location: admin.php");
}

// Delete Notice
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM notices WHERE id=$id");
    header("Location: admin.php");
}

// Fetch all notices
$notices = mysqli_query($conn, "SELECT * FROM notices ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Manage Notices</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .admin-container { width: 80%; margin: 20px auto; background: #fff; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background: #2c3e50; color: white; }
        form input, form textarea { width: 100%; padding: 8px; margin: 5px 0; }
        form input[type=submit] { width: auto; background: #1abc9c; color: white; border: none; cursor: pointer; }
        form input[type=submit]:hover { background: #16a085; }
    </style>
</head>
<body>
<div class="admin-container">
    <h2>Manage Notices</h2>

    <!-- Add Notice Form -->
    <form method="post">
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>Description:</label>
        <textarea name="description" rows="3" required></textarea>
        <input type="submit" name="add_notice" value="Add Notice">
    </form>

    <h3>Existing Notices</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($notices)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['title']); ?></td>
            <td><?php echo htmlspecialchars($row['description']); ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
                <a href="admin.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this notice?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
