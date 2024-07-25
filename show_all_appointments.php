<?php
	session_start();
  // If the user is not logged in redirect to the login page...
  if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
  }
  
  $con=new mysqli ('localhost', 'root', '','project_final_1');
    if ($con -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
      }
      else {
        echo "db connected";
      }

      
      $query = "select * from doctors";
      $statement = mysqli_query($con,$query);
     
?>

<?php include 'header.php'; ?>

<HEADER><h2>Current Appointments</h2></HEADER>

<div class="container">
<body>
<form action=" " method="post" >

<table id="book">
<tr> 
<th> Doctor Name:</th> 
<th>Time :</th> 
<th>Patient Name:</th> 
<th>Day:</th> 
<th>Select:</th> 
</tr>
 
<?php
$query2 = "select Time , Day, doctors.doctorName , registration.lname, registration.fname from Availability 
INNER JOIN doctors
ON Availability.medicalLicence = doctors.medicalLicence 
INNER JOIN registration ON Availability.healthNo = registration.healthNo and Status = 'Reserved' ";
$statement = mysqli_query($con,$query2);
 $array1 = array();
 $array2 = array();
 $count=0;
while($row = $statement->fetch_assoc()) 
{ 
    $doctor = $row['doctorName'];
    $patient = $row['fname'];
    $time = $row['Time'];
    $array1[$count]=$doctor;
    $array2[$count]=$time;
   
    echo"<tr>" ; 

    echo"<td>" . $row['doctorName'] . "</td>"; 
    echo"<td>" . $row['Time'] . "</td>"; 
    echo "<td>" . $row['fname'] . "</td>"; 
    echo "<td>" . $row['Day'] . "</td>"; 
    echo"<td>" ."<input type='checkbox' id='check' name='check' value='$count'>"."</td>" ;
    echo"</tr>";
    $count++;
}
?>
</table><br>

 

<input name='book'  type='submit' value ='Delete Appointment' >



<?php 

   if(isset($_POST['book'])){
    $checked =$_POST['check'];
    $doctorNam = $array1[$checked];
    $timing = $array2[$checked];
      $query3 = "update Availability set Status = 'Available'  where Time ='$timing' and medicalLicence in 
      (select Availability.medicalLicence from Availability 
      INNER JOIN doctors ON Availability.medicalLicence = doctors.medicalLicence and doctors.doctorName = '$doctorNam' ); ";
       $statement2 = mysqli_query($con,$query3);

       if($statement2){
        echo '<script type="text/javascript">alert("Appointment Deleted")</script>';
     }
  
    }
?>
</form>
	</body>


  <?php include 'footer.php'; ?>
  </html>