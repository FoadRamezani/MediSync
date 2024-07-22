
<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>

	<div id="main-wrapper">
	<form action="doctor_details.php" method="post">
	<center><h2>ADD DOCTOR </h2></center>
		
						
					
						<label for='doctorName'>Full Name : </label>
						<input type='text' name='doctorName' id='doctorName' required /><br>
						<label for='medicalLicense'>Medical Licence Number :</label>
						<input type='text' name='medicalLicence' id='MedicalLicence' maxlength="10" required/><br>
					
				<button name="delete" class="sign_up_btn" type="submit">Delete Doctor</button><br>
				
				<a href="homage.php"><button type="button" class="back_btn">Homepage</button></a><br>
			</div>
		</form>
		
	</div>
</body>
<?php include 'footer.php'; ?>

</html> 