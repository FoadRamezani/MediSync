<!DOCTYPE html>
<html>
 
<?php include 'header.php'; ?>

    <center>
<?php
	session_start();
	$con=new mysqli ('localhost', 'root', '','project_final');
    if ($con -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
      }
      else {
        echo "db connected";
      }

			
			
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$healthNo=$_POST['cardnumber'];
				$email=$_POST['email'];
				$phoneNo=$_POST['phoneNo'];
				$address=$_POST['address'];
				$gender=$_POST['gender'];
				
				
				
	
				$query = "select * from registration where healthNo='$healthNo'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This healthcard Already exists in our records please feel free to use our services!!!")</script>';
						}
						else
						{/*INSERT INTO `registration` (`fname`, `lname`, `healthNo`, `email`, `phoneNo`, `address`, `gender`) 
                            ('fname', 'lname', 'healthNo', 'email', 'phoneNo', 'address', 'gender')
                            VALUES ('Rajandeep', 'Kaur', '7860943', 'rajandeep@gmail.com', '1256786543', '778 street , Surrey,bc', 'Female'); */
							$query2 = "insert into registration  values('$fname','$lname','$healthNo','$email','$phoneNo','$address','$gender')";
							$statement = mysqli_query($con,$query2);
							if($statement)
							{
								
								$curdir = getcwd();

                                If (mkdir($curdir.'/'.'Patient_Files'.'/'.$fname."-".$healthNo,0777)){
                                    echo '<script type="text/javascript">alert("User Registered for Family Doctor")</script>';
                                }
                                
							}
					       else
							{
								echo '<p class="bg-danger msg-block">Server error!! Please try later</p>';
							}
						}
					}
					mysqli_close($con);	
		?>
        </center>
</body>
 <?php include 'footer.php'; ?>

</html>