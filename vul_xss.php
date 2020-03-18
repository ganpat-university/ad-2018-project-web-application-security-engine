<?php

$conn = mysqli_connect('localhost','root','','student');

if(!$conn)
{
	die('Connection failed!'.mysqli_error($conn));
}

$sno = $_POST['sno'];
$name = $_POST['name'];
$uname = $_POST['uname'];
$comment = $_POST['comment'];

$sql = "INSERT INTO student(sno, name, uname, comment) VALUES('$sno', '$name','$uname',
 '$comment')";

if(mysqli_query($conn,$sql))
{
	echo "Registerd Successfully";
	header("location:data_db.php");
}
else
{
	echo mysqli_error($conn);
}

?>
