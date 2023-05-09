

<?php
include_once '_dbconnect.php';
$sql = "DELETE FROM users WHERE username='" . $_GET["username"] . "'";
$sqli = "DELETE FROM users_profile WHERE username='" . $_GET["username"] . "'";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sqli);
if (mysqli_query($conn, $sql)) {
    echo "<script>window.location = '/miniproject_final/all_users.php';</script> ";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>