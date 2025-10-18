<?php
session_start();
include '../config.php';

// --- Access Control ---
if(!isset($_SESSION['user'])){
    header("Location: login.php"); exit;
}

$role = $_SESSION['role'];
$faculty_id = $_SESSION['faculty_id'] ?? null;
$active_tab = $_GET['tab'] ?? 'faculty';

/* ---------------------
   FACULTY SECTION
---------------------- */
if($active_tab=='faculty'){
    if(isset($_POST['save_faculty'])){
        $id = intval($_POST['id']);
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $designation = mysqli_real_escape_string($conn,$_POST['designation']);
        $qualification = mysqli_real_escape_string($conn,$_POST['qualification']);
        $educational_details = mysqli_real_escape_string($conn,$_POST['educational_details_data']);
        $professional_details = mysqli_real_escape_string($conn,$_POST['professional_details_data']);
        $academic = mysqli_real_escape_string($conn,$_POST['academic']);
        $awards = mysqli_real_escape_string($conn,$_POST['awards']);
        $patents = mysqli_real_escape_string($conn,$_POST['patents_data']);
        $books_published = mysqli_real_escape_string($conn,$_POST['books_published']);
        $photo_name='';

        if(!empty($_FILES['photo']['name'])){
            $photo_name = time().'_'.$_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'], "../images/faculty/".$photo_name);
        }

        if($id>0){
            if($role=='faculty' && $id!=$faculty_id) die("Access denied.");
            $photo_sql = $photo_name ? ", photo='$photo_name'" : "";
            mysqli_query($conn,"UPDATE faculty SET
                name='$name', designation='$designation', qualification='$qualification',
                educational_details='$educational_details', professional_details='$professional_details',
                academic='$academic', awards='$awards', patents='$patents', books_published='$books_published'
                $photo_sql WHERE id=$id
            ");
        }else{
            if($role!='admin') die("Access denied.");
            mysqli_query($conn,"INSERT INTO faculty
                (name,designation,qualification,educational_details,professional_details,academic,awards,patents,books_published,photo)
                VALUES ('$name','$designation','$qualification','$educational_details','$professional_details','$academic','$awards','$patents','$books_published','$photo_name')
            ");
        }
        header("Location: dashboard.php?tab=faculty"); exit;
    }

    if($role=='admin' && isset($_GET['delete_faculty'])){
        $id=intval($_GET['delete_faculty']);
        mysqli_query($conn,"DELETE FROM faculty WHERE id=$id");
        header("Location: dashboard.php?tab=faculty"); exit;
    }

    // Fetch faculty
    $faculty_list = ($role=='admin') ? mysqli_query($conn,"SELECT * FROM faculty ORDER BY name ASC") :
                    mysqli_query($conn,"SELECT * FROM faculty WHERE id=$faculty_id");

    // Edit faculty
    $edit_id = $_GET['edit_faculty'] ?? 0;
    $edit_faculty = null;
    if($edit_id>0){
        if($role=='faculty' && $edit_id!=$faculty_id) die("Access denied.");
        $res = mysqli_query($conn,"SELECT * FROM faculty WHERE id=$edit_id");
        $edit_faculty = mysqli_fetch_assoc($res);
    }elseif($edit_id==='0' && $role=='admin'){
        $edit_faculty = ['id'=>0,'name'=>'','designation'=>'','qualification'=>'','educational_details'=>'','professional_details'=>'','academic'=>'','awards'=>'','patents'=>'','books_published'=>'','photo'=>''];
    }
}

/* ---------------------
   NOTICES SECTION
---------------------- */
if($active_tab=='notices' && $role=='admin'){
    if(isset($_POST['update_notice'])){
        $id=intval($_POST['id']);
        $title=mysqli_real_escape_string($conn,$_POST['title']);
        $description=mysqli_real_escape_string($conn,$_POST['description']);
        mysqli_query($conn,"UPDATE notices SET title='$title', description='$description' WHERE id=$id");
        header("Location: dashboard.php?tab=notices"); exit;
    }
    if(isset($_GET['delete_notice'])){
        $id=intval($_GET['delete_notice']);
        mysqli_query($conn,"DELETE FROM notices WHERE id=$id");
        header("Location: dashboard.php?tab=notices"); exit;
    }
    $notices = mysqli_query($conn,"SELECT * FROM notices ORDER BY created_at DESC");
}

/* --------------------------
   CONTACT MESSAGES SECTION
-------------------------- */
if($active_tab=='messages' && $role=='admin'){
    if(isset($_POST['update_message'])){
        $id=intval($_POST['id']);
        $status=mysqli_real_escape_string($conn,$_POST['status']);
        mysqli_query($conn,"UPDATE contact_messages SET status='$status' WHERE id=$id");
        header("Location: dashboard.php?tab=messages"); exit;
    }
    if(isset($_GET['delete_message'])){
        $id=intval($_GET['delete_message']);
        mysqli_query($conn,"DELETE FROM contact_messages WHERE id=$id");
        header("Location: dashboard.php?tab=messages"); exit;
    }
    $messages = mysqli_query($conn,"SELECT * FROM contact_messages ORDER BY created_at DESC");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<style>
body{font-family:Arial,sans-serif;}
nav a{margin-right:15px;text-decoration:none;font-weight:bold;}
table{border-collapse:collapse;width:100%;margin-bottom:20px;}
th,td{border:1px solid #ccc;padding:5px;}
img{width:50px;}
.add-row{background:#007BFF;color:#fff;padding:3px 8px;border:none;cursor:pointer;border-radius:3px;}
.remove-row{background:#dc3545;color:#fff;padding:3px 8px;border:none;cursor:pointer;border-radius:3px;}
</style>
</head>
<body>

<h2>Welcome, <?php echo $_SESSION['user']." ($role)"; ?></h2>
<a href="logout.php">Logout</a>
<hr>

<nav>
<a href="dashboard.php?tab=faculty">Faculty</a>
<?php if($role=='admin'){ ?>
<a href="dashboard.php?tab=notices">Notices</a>
<a href="dashboard.php?tab=messages">Messages</a>
<?php } ?>
</nav>
<hr>

<?php if($active_tab=='faculty'){ ?>
<h3>Faculty List</h3>
<?php if($role=='admin'){ ?><a href="dashboard.php?edit_faculty=0&tab=faculty">+ Add New Faculty</a><?php } ?>
<table>
<tr><th>ID</th><th>Photo</th><th>Name</th><th>Designation</th><th>Qualification</th><th>Action</th></tr>
<?php while($row=mysqli_fetch_assoc($faculty_list)){ ?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php if($row['photo'] && file_exists("../images/faculty/".$row['photo'])){ ?>
<img src="../images/faculty/<?php echo $row['photo'];?>" alt=""><?php } ?></td>
<td><?php echo htmlspecialchars($row['name']);?></td>
<td><?php echo htmlspecialchars($row['designation']);?></td>
<td><?php echo htmlspecialchars($row['qualification']);?></td>
<td>
<a href="dashboard.php?edit_faculty=<?php echo $row['id'];?>&tab=faculty">Edit</a>
<?php if($role=='admin'){ ?> | <a href="dashboard.php?delete_faculty=<?php echo $row['id'];?>&tab=faculty" onclick="return confirm('Delete?')">Delete</a><?php } ?>
</td>
</tr>
<?php } ?>
</table>

<?php if(isset($edit_faculty)){ ?>
<h3><?php echo ($edit_faculty['id']>0)?'Edit Faculty':'Add Faculty'; ?></h3>
<form method="post" enctype="multipart/form-data" onsubmit="return prepareData()">
<input type="hidden" name="id" value="<?php echo $edit_faculty['id'];?>"><br>
Name:<input type="text" name="name" value="<?php echo htmlspecialchars($edit_faculty['name']);?>" required><br>
Designation:<input type="text" name="designation" value="<?php echo htmlspecialchars($edit_faculty['designation']);?>"><br>
Qualification:<input type="text" name="qualification" value="<?php echo htmlspecialchars($edit_faculty['qualification']);?>"><br>

<h4>Educational Details</h4>
<table id="eduTable" class="form-table"><tr><th>Sl.No.</th><th>Degree/Subjects</th><th>University</th><th>Year</th><th></th></tr></table>
<button type="button" class="add-row" onclick="addRow('eduTable',4)">+ Add</button>
<input type="hidden" name="educational_details_data" id="educational_details_data">

<h4>Professional Details</h4>
<table id="proTable" class="form-table"><tr><th>Sl.No.</th><th>Designation</th><th>Institution/University</th><th>UG/PG</th><th>From</th><th>To</th><th></th></tr></table>
<button type="button" class="add-row" onclick="addRow('proTable',6)">+ Add</button>
<input type="hidden" name="professional_details_data" id="professional_details_data">

Academic:<br><textarea name="academic" rows="3"><?php echo htmlspecialchars($edit_faculty['academic']);?></textarea><br>
Awards:<br><textarea name="awards" rows="3"><?php echo htmlspecialchars($edit_faculty['awards']);?></textarea><br>

<h4>Patents</h4>
<table id="patTable" class="form-table"><tr><th>Sl.No.</th><th>Title</th><th>Patent No</th><th>IPR</th><th>Year</th><th>Status</th><th></th></tr></table>
<button type="button" class="add-row" onclick="addRow('patTable',6)">+ Add</button>
<input type="hidden" name="patents_data" id="patents_data">

Books Published:<br><textarea name="books_published" rows="3"><?php echo htmlspecialchars($edit_faculty['books_published']);?></textarea><br>
Photo: <input type="file" name="photo"><br>
<input type="submit" name="save_faculty" value="Save">
</form>
<?php } ?>

<?php } elseif($active_tab=='notices' && $role=='admin'){ ?>
<h3>Notices</h3>
<a href="add_notice.php" style="display:inline-block;margin-bottom:10px;padding:6px 12px;background:#007BFF;color:#fff;text-decoration:none;border-radius:4px;">+ Add New Notice</a>
<table>
<tr><th>ID</th><th>Title</th><th>Description</th><th>Created At</th><th>Action</th></tr>
<?php while($row=mysqli_fetch_assoc($notices)){ ?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo htmlspecialchars($row['title']);?></td>
<td><?php echo htmlspecialchars($row['description']);?></td>
<td><?php echo $row['created_at'];?></td>
<td>
<a href="dashboard.php?edit_notice=<?php echo $row['id'];?>&tab=notices">Edit</a> |
<a href="dashboard.php?delete_notice=<?php echo $row['id'];?>&tab=notices" onclick="return confirm('Delete?')">Delete</a>
</td>
</tr>
<?php } ?>
</table>
<?php if(isset($_GET['edit_notice'])){
    $nid=intval($_GET['edit_notice']);
    $res=mysqli_query($conn,"SELECT * FROM notices WHERE id=$nid");
    $edit_notice=mysqli_fetch_assoc($res);
    if($edit_notice){ ?>
    <h3>Edit Notice</h3>
    <form method="post" style="max-width:500px;padding:15px;border:1px solid #ccc;">
    <input type="hidden" name="id" value="<?php echo $edit_notice['id'];?>">
    Title:<br><input type="text" name="title" value="<?php echo htmlspecialchars($edit_notice['title']);?>" required style="width:100%;padding:8px;margin-bottom:10px;"><br>
    Description:<br><textarea name="description" rows="4" required style="width:100%;padding:8px;margin-bottom:10px;"><?php echo htmlspecialchars($edit_notice['description']);?></textarea><br>
    <input type="submit" name="update_notice" value="Update Notice" style="padding:8px 15px;background:#28a745;color:#fff;border:none;border-radius:4px;cursor:pointer;">
    </form>
<?php } } ?>

<?php } elseif($active_tab=='messages' && $role=='admin'){ ?>
<h3>Contact Messages</h3>
<table>
<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Subject</th><th>Message</th><th>Status</th><th>Created At</th><th>Action</th></tr>
<?php while($row=mysqli_fetch_assoc($messages)){
    $status = $row['status'] ?? 'pending';
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo htmlspecialchars($row['name']);?></td>
<td><?php echo htmlspecialchars($row['email']);?></td>
<td><?php echo htmlspecialchars($row['phone']);?></td>
<td><?php echo htmlspecialchars($row['subject']);?></td>
<td><?php echo htmlspecialchars($row['message']);?></td>
<td>
<form method="post" style="display:inline-block;">
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
<select name="status">
<option value="pending" <?php if($status=='pending') echo 'selected';?>>Pending</option>
<option value="read" <?php if($status=='read') echo 'selected';?>>Read</option>
<option value="replied" <?php if($status=='replied') echo 'selected';?>>Replied</option>
</select>
<input type="submit" name="update_message" value="Save">
</form>
</td>
<td><?php echo $row['created_at'];?></td>
<td><a href="dashboard.php?delete_message=<?php echo $row['id'];?>&tab=messages" onclick="return confirm('Delete?')">Delete</a></td>
</tr>
<?php } ?>
</table>
<?php } ?>

<script>
function addRow(tableId,cols){
    var table=document.getElementById(tableId);
    var row=table.insertRow();
    for(var i=0;i<cols;i++){
        var cell=row.insertCell();
        cell.innerHTML="<input type='text'>";
    }
    var cell=row.insertCell();
    cell.innerHTML="<button type='button' class='remove-row' onclick='this.parentNode.parentNode.remove()'>X</button>";
}

function prepareData(){
    // educational
    var eduData=[];
    document.querySelectorAll("#eduTable tr").forEach((tr,i)=>{
        if(i==0) return;
        var vals=Array.from(tr.querySelectorAll("input")).map(inp=>inp.value.trim());
        if(vals.join("")) eduData.push(vals.join("|"));
    });
    document.getElementById("educational_details_data").value=eduData.join("\n");

    // professional
    var proData=[];
    document.querySelectorAll("#proTable tr").forEach((tr,i)=>{
        if(i==0) return;
        var vals=Array.from(tr.querySelectorAll("input")).map(inp=>inp.value.trim());
        if(vals.join("")) proData.push(vals.join("|"));
    });
    document.getElementById("professional_details_data").value=proData.join("\n");

    // patents
    var patData=[];
    document.querySelectorAll("#patTable tr").forEach((tr,i)=>{
        if(i==0) return;
        var vals=Array.from(tr.querySelectorAll("input")).map(inp=>inp.value.trim());
        if(vals.join("")) patData.push(vals.join("|"));
    });
    document.getElementById("patents_data").value=patData.join("\n");

    return true;
}
</script>
</body>
</html>
