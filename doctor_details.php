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
			
				$medicalLicence=$_POST['medicalLicence'];
				$query = "select * from doctors where medicalLicence='$medicalLicence'";
					
				$query_run = mysqli_query($con,$query);
                 
				if($query_run)
					{
                        if(isset($_POST['add'])){
                            $doctorName=$_POST['doctorName'];
				            $email=$_POST['email'];
				            $phoneNo=$_POST['phoneNo'];
				            $address=$_POST['address'];
				            $specialization=$_POST['specialization'];
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This medical Licence Already exists under some name")</script>';
						}
						else
						{/*INSERT INTO `doctors`(`medicalLicence`, `doctorName`, `email`, `phoneNo`, `address`, `specialization`) 
                            VALUES('6754387','Rajan','rajan@gmail.com','1236787934','testing testing','Eye Care');
 */
							$query2 = "insert into doctors values('$medicalLicence','$doctorName','$email','$phoneNo','$address','$specialization')";
							$statement = mysqli_query($con,$query2);
							if($statement)
							{
                                    echo '<script type="text/javascript">alert("Doctor Added for Services")</script>';
                                  
							}
					       else
							{
								echo '<p class="bg-danger msg-block">Server error!! Please try later</p>';
							}
						}
					}
                
                    if(isset($_POST['delete']))
                    {
                        if(mysqli_num_rows($query_run)>0)
						{ 
                            while($row = $query_run->fetch_assoc()) {
                            echo "Below is the Doctor Details getting deleted !!!"."<br>";
                           echo "Name: " . $row["doctorName"]."<br>";
                         
						}
						
							$query2 = "delete from doctors where medicalLicence ='$medicalLicence'";
							$statement = mysqli_query($con,$query2);
							if($statement)
							{  echo '<script type="text/javascript">alert("Doctor Deleted from Services")</script>';
                                
                            }
					       else
							{
								echo '<p class="bg-danger msg-block">Server error!! Please try later</p>';
							}}
                    }
                }
					mysqli_close($con);	
		?>
        </center>
</body>
 <?php include 'footer.php'; ?>

</html>