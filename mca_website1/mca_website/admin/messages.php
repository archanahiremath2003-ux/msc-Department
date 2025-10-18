<?php
session_start();
include '../config.php';

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

// Handle delete
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM contact_messages WHERE id=$id");
    header("Location: messages.php");
    exit;
}

// Handle update
if(isset($_POST['update'])){
    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    mysqli_query($conn, "UPDATE contact_messages
        SET name='$name', email='$email', phone='$phone', subject='$subject', message='$message'
        WHERE id=$id");
    header("Location: messages.php");
    exit;
}

// Fetch all messages
$messages = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY created_at DESC");
?>

<h2>Contact Messages</h2>
<a href="dashboard.php">Back to Dashboard</a> | <a href="logout.php">Logout</a>

<table border="1" cellpadding="8" cellspacing="0">
<tr>
<th>ID</th><th>Name</th><th>Email</th><th>Phone</th>
<th>Subject</th><th>Message</th><th>Created At</th><th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($messages)) { ?>
<tr>
<form method="POST">
    <td><?php echo $row['id']; ?><input type="hidden" name="id" value="<?php echo $row['id']; ?>"></td>
    <td><input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>"></td>
    <td><input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>"></td>
    <td><input type="text" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>"></td>
    <td><input type="text" name="subject" value="<?php echo htmlspecialchars($row['subject']); ?>"></td>
    <td><textarea name="message"><?php echo htmlspecialchars($row['message']); ?></textarea></td>
    <td><?php echo $row['created_at']; ?></td>
    <td>
        <button type="submit" name="update">Update</button>
        <a href="messages.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this message?')">Delete</a>
    </td>
</form>
</tr>
<?php } ?>
</table>
