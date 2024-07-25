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
        echo "db connected"."<br>";
      }

			
			
				$healthNo=$_POST['cardnumber'];
		
				$query = "select * from registration where healthNo='$healthNo'";
					
				$query_run = mysqli_query($con,$query);
                if ($query_run->num_rows > 0) {
                   
                    while($row = $query_run->fetch_assoc()) {
                        echo "Below is the patient Details where file got uploaded: !!!"."<br>";
                       echo "Name: " . $row["fname"].",".$row["lname"]."<br>";
                       $nameis = $row["fname"];
                       $healthcard = $row["healthNo"];

                    
                    
                    if(isset($_POST['results'])){
                        $Patient_Files = $_FILES['pdf_file'];
    
                        move_uploaded_file($Patient_Files['tmp_name'],"Patient_Files/$nameis-$healthcard/".$healthcard."_".$nameis."_".$Patient_Files['name']);
                    }}
                  } 
                  
                else{
	                        echo "Patient Doesn't exists in list!!";
                    }
				
						
					
					mysqli_close($con);	
		?>
        </center>
</body>
 
<?php include 'header.php'; ?>

</html>