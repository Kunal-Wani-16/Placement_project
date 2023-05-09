

<?php
include_once 'partials/_dbconnect.php';
$sql = "DELETE FROM student WHERE prn='" . $_GET["prn"] . "'";
$sqli = "DELETE FROM student_placed_info WHERE prn='" . $_GET["prn"] . "'";
$sqlii = "DELETE FROM student_password WHERE prn='" . $_GET["prn"] . "'";
// $sql_user = "DELETE FROM users_profile WHERE username='" . $_GET["username"] . "'";
// $sql_user = "DELETE FROM users WHERE username='" . $_GET["username"] . "'";

$result = mysqli_query($conn, $sqli);
$result2 = mysqli_query($conn, $sqlii);
if (mysqli_query($conn, $sql)) {
    echo "<script>window.location = '/miniproject_final/student_data.php';</script> ";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>