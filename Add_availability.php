<?php include 'header.php'; ?>

<main>
<div class="container">

	<h1> Add Availability </h1>
	<form action="." method="post" id="update_availability">

		<input type="hidden" name="action" value="add_product">
        <label>Dcotor:</label>
        <select name="doctorname">
        

        <?php foreach ( $doctors as $doctor ) : ?>
            <option value="<?php echo $doctor['medicalLicense']; ?>">
                <?php echo $doctor['doctorname']; ?>
            </option>
        <?php endforeach; ?>
</select>
<br>

		<label>Day:</label>
        <input type="text" name="Day" />
        <br>

        <label>Time:</label>
        <input type="text" name="name" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Time Slot" />
        <br>

    </form>
    <p class="last_paragraph">
        <a href="?action=book_appointment.php">View Product List</a>
    </p>


</main>



<?php include 'footer.php'; ?>
