
<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>


<body >


	<div id="main-wrapper">

	<header><h1>Sign Up For Family Doctor</h1></header>

		<form action="patient_details.php" method="post">

			<div class="imgcontainer">
				<img src="images/team-care-banner.webp" width="auto" class="avatar">
			</div>
			<center>
			<div class="inner_container">
				<label><b>First Name</b></label>
				<input type="text" placeholder="Enter First Name" name="fname" required><br>
			    <label>Last Name</label>
			    <input type="text" placeholder="Enter Last Name" name="lname" required><br>
				<label><b>Health Card Number</b></label>
				<input type="text" placeholder="Enter Health card number" name="cardnumber" required><br>
				<label><b>Email Address</b></label>
				<input type="email" placeholder="Enter Email Address" name="email" required><br>
				<label><b>Contact Number</b></label>
				<input type="number_format" placeholder="Enter Primary Contact Number" name="phoneNo" required><br>
				<label><b>Address</b></label>
				<input type="text" placeholder="Enter residential address" name="address" required><br>
				<label><b>Gender</b></label>
				<select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option></select><br>
	 
				<button name="register" class="sign_up_btn" type="submit">Sign Up</button><br>
				
				<a href='homepage.php'><button type="button" class="back_btn">Homepage</button></a><br>
			</div></center>
		</form>
		
	</div>
</body>
<?php include 'footer.php'; ?>

</html>