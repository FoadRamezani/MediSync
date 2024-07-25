<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>
<div class="container">

	<div id="main-wrapper">
	<center><h2>Upload Lab Results/Add Notes</h2></center>
		<form action="lab_results.php" method="post" enctype="multipart/form-data">
			<div class="inner_container">
				
                <label><b>Health Card Number</b></label>
                <br>
				<input type="text" placeholder="Enter Health card number" name="cardnumber" required><br>
                <br>
                <label><b>Choose File</b></label>
				<br>
				<input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" /><br><br>
	 	
				<button name="results" class="sign_up_btn" type="submit">Upload Results</button><br>
	<br>			
			</div>
		</form>
		
	</div>
</body>

<?php include 'footer.php'; ?>

      </html>