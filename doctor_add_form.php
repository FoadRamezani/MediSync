
<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>


	<div id="main-wrapper">
	<form action="doctor_details.php" method="post">
	<center><h2>Add  New Doctor</h2></center>
						<label for='doctorName'>Full Name : </label>
						<input type='text' name='doctorName' id='doctorName' required /><br>
					
						<label for='email'>Email Address :</label>
						<input type='email' name='email' id='email'  required/> <br>

						<label for='medicalLicense'>Medical Licence Number :</label>
						<input type='text' name='medicalLicence' id='MedicalLicence' maxlength="10" required/><br>
					
						<label for='phoneNo'>Contact Number: </label>
						<input type='tel' name='phoneNo' id='phoneNo' maxlength="10" required/><br>
					
						<label for='address'>Residential Address : </label>
						<input type='text' name='address' id='address' maxlength="30" /><br>
					
						<label for='specialization'>Specialization : </label>
						<input type='text' name='specialization' id='specialization' maxlength="40" /><br>				

				<button name="add" class="sign_up_btn" type="submit">Add Doctor</button>
				<a href='doctor_delete_form.php'><button type="button" class="back_btn">Delete Doctor</button></a><br>
				
			</div>
		</form>
		
	</div>
</body>
<?php include 'footer.php'; ?>

</html> 