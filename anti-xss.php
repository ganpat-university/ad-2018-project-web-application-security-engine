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
if ($sno==strip_tags($sno) and $name==strip_tags($name) and $uname==strip_tags($uname) and $comment==strip_tags($comment))
{
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
}

else
{
	echo("not Registerd ");
	sleep(3);
	header("location:registration.html");
}


?>