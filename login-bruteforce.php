<?php

	$connection = mysqli_connect('localhost','root','','DSWA');
	
	if(!$connection)
	{
		die("Database Connection Failed" .mysqli_error($connection));
	}
	    if(isset($_POST['username']) and isset($_POST['password']))
	{
		$username=$_POST['username'] ;
		$password=$_POST['password'];
		
		
			$query = "Select * FROM users WHERE username='$username' and password='$password'";
			
			$result = mysqli_query($connection,$query) or die(mysqli_error($connection));
			
			$count = mysqli_num_rows($result);
			
			

			
			
			if($count==0)
			{
				echo ('<script>alert("Invalid Username or Password")</script>');
				$j = "select attempt from users where username='$username'";
				$r = mysqli_query($connection,$j);
				$value = mysqli_fetch_assoc($r);

				if($value["attempt"]==0)
				{
					$i="update users set attempt='1' where username='$username'";
			        $status = mysqli_query($connection,$i);
					echo "you have done ".$value["attempt"]." wrong attempts";
				}
				if($value["attempt"]==1)
				{
					$i="update users set attempt='2' where username='$username'";
			        $status = mysqli_query($connection,$i);
					echo "you have done ".$value["attempt"]." wrong attempts";
				}
				if($value["attempt"]==2)
				{
					$i="update users set attempt='3' where username='$username'";
			        $status = mysqli_query($connection,$i);
					echo "you have done ".$value["attempt"]." wrong attempts";
				}
				if($value["attempt"]==3)
				{
					echo "You are banned";
				}
				
				
			}
			else
			{
					echo ('<script>alert("Welcome")</script>');
				    echo("You've been logged in success");
					$i="update users set attempt='0' where username='$username'";
			        $status = mysqli_query($connection,$i);	
			}	
    
	
	}
	    
	
?>