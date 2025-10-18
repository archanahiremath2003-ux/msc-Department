<?php
include 'config.php';

if(!isset($_GET['id'])){
    die("Faculty ID not specified.");
}

$id = intval($_GET['id']);
$res = mysqli_query($conn, "SELECT * FROM faculty WHERE id=$id");
if(mysqli_num_rows($res) == 0){
    die("Faculty not found.");
}
$faculty = mysqli_fetch_assoc($res);

function render_table($data, $headers) {
    if (!$data) return "<p>Not available</p>";
    $rows = explode("\n", trim($data));
    $html = "<table border='1' cellspacing='0' cellpadding='5' style='width:100%; margin-top:10px; border-collapse:collapse;'>";
    $html .= "<tr>";
    foreach ($headers as $head) {
        $html .= "<th style='background:#f0f0f0;'>$head</th>";
    }
    $html .= "</tr>";
    foreach ($rows as $row) {
        $cols = explode("|", $row);
        $html .= "<tr>";
        foreach ($cols as $col) {
            $html .= "<td>" . htmlspecialchars(trim($col)) . "</td>";
        }
        $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($faculty['name']); ?> - Details</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: auto; padding: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; vertical-align: top; }
        th { background-color: #f0f0f0; }
        img { display: block; margin: 20px auto; max-width: 150px; border-radius: 5px; }
        h2 { text-align: center; }
    </style>
</head>
<body>
<h2><?php echo htmlspecialchars($faculty['name']); ?></h2>

<?php if($faculty['photo'] && file_exists("images/faculty/".$faculty['photo'])){ ?>
    <img src="images/faculty/<?php echo $faculty['photo']; ?>" alt="<?php echo htmlspecialchars($faculty['name']); ?>">
<?php } ?>

<table>
    <tr><th>Name</th><td><?php echo htmlspecialchars($faculty['name']); ?></td></tr>
    <tr><th>Designation</th><td><?php echo htmlspecialchars($faculty['designation']); ?></td></tr>
    <tr><th>Qualification</th><td><?php echo htmlspecialchars($faculty['qualification']); ?></td></tr>

    <tr><th>Educational Details</th><td>
        <?php echo render_table($faculty['educational_details'], ["Sl. No.","Degree/Subjects","University","Year of Award/Passing"]); ?>
    </td></tr>

    <tr><th>Professional Details</th><td>
        <?php echo render_table($faculty['professional_details'], ["Sl. No.","Designation","Institution/University","UG/PG","From","To"]); ?>
    </td></tr>

    <tr><th>Academic Achievements</th><td><?php echo nl2br(htmlspecialchars($faculty['academic'])); ?></td></tr>
    <tr><th>Awards</th><td><?php echo nl2br(htmlspecialchars($faculty['awards'])); ?></td></tr>

    <tr><th>Patents</th><td>
        <?php echo render_table($faculty['patents'], ["Sl. No.","Title of the Patents","Patent number","IPR","Year","Status"]); ?>
    </td></tr>

    <tr><th>Books Published</th><td><?php echo nl2br(htmlspecialchars($faculty['books_published'])); ?></td></tr>
</table>

<p style="text-align:center; margin-top:20px;">
    <a href="faculty.php">← Back to Faculty List</a>
</p>

</body>
</html>
