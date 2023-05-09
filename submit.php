<!-- first checking whether the user is logged in or not  -->
<?php 

  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location:home.php");
    exit;
}
?>

<?php

include_once 'partials/_dbconnect.php';
$prn= $_POST['prn'];
$status= $_POST['status'];
$sql = "UPDATE student SET status=$status WHERE prn=$prn";

if($status==1){
$sql2 = "INSERT INTO `student_placed_info`(`prn`) VALUES ($prn)";
$result2=mysqli_query($conn, $sql2);
}

if (mysqli_query($conn, $sql) || mysqli_query($conn, $sql2)) {
  echo "<script> alert('Record Updated successfully') </script>";
  echo "<script> window.location='/miniproject_final/student_data.php'</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
  
mysqli_close($conn);


?>