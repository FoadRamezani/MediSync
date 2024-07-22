<!DOCTYPE html>
<html>
<head>
    <title>Northwest Clinic - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
    <h2>Welcome to the Homepage of Northwest Clinic</h2>
    <h3>Please find details below and use the system to help out incoming patients</h3>

    <a href="new_patient_register_form.php" class="button">Register New Patient</a>

    <h2>Only taking appointments for the upcoming week due to high volume</h2>

    <h2>Clinic Timings</h2>
    <table id="book">
        <thead>
            <tr>
                <th>Days</th>
                <th>Timings</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>Monday</td><td>10:00 AM - 6:00 PM</td></tr>
            <tr><td>Tuesday</td><td>10:00 AM - 6:00 PM</td></tr>
            <tr><td>Wednesday</td><td>10:00 AM - 6:00 PM</td></tr>
            <tr><td>Thursday</td><td>10:00 AM - 6:00 PM</td></tr>
            <tr><td>Friday</td><td>10:00 AM - 6:00 PM</td></tr>
            <tr><td>Saturday</td><td>10:00 AM - 5:00 PM</td></tr>
            <tr><td>Sunday</td><td>11:00 AM - 4:00 PM</td></tr>
        </tbody>
    </table>

    <h3>Working Days for Doctors</h3>
    <ul>
        <li>Dr. Cesar works Monday - Wednesday</li>
        <li>Dr. Moddi works Tuesday - Saturday</li>
        <li>Dr. Kaushal works Monday - Friday</li>
        <li>Dr. Goyal works Wednesday - Sunday</li>
        <li>Dr. Kaur works Thursday - Monday</li>
    </ul>

    <a href="doctor_add_form.php" class="button">Submit New Doctor Application</a>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
