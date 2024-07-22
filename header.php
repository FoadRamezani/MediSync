<!DOCTYPE html>
<html>
<head>
    <title>Doctor Appointment Booking System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        nav {
            background-color: #007BFF; /* Light blue color */
            overflow: hidden;
            display: flex;
            justify-content: center;
            border-bottom-left-radius: 25px; /* Curve at the bottom left */
            border-bottom-right-radius: 25px; /* Curve at the bottom right */
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center; /* Align items vertically */
        }
        nav ul li {
            flex: 1; /* Ensure equal space for each item */
            text-align: center; /* Center text within each item */
        }
        nav ul li a {
            display: block; /* Ensure block display for correct padding */
            width: 100%; /* Make the link fill the li */
            color: white; /* Text color changed to white */
            padding: 14px 0;
            text-decoration: none;
            transition: color 0.3s ease;
            position: relative;
        }
        nav ul li a::before, nav ul li a::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: transparent; /* Make sure these lines are transparent */
            left: 0;
            transition: transform 0.3s ease;
        }
        nav ul li a::before {
            top: 0;
            transform: scaleX(0);
            transform-origin: left;
        }
        nav ul li a::after {
            bottom: 0;
            transform: scaleX(0);
            transform-origin: right;
        }
        nav ul li a:hover::before, nav ul li a:hover::after {
            background-color: white; /* Change color on hover */
            transform: scaleX(1);
        }
        nav ul li a:hover {
            color: #FFEB3B; /* Change text color on hover */
        }
        header {
            background-color: #007BFF; /* Same blue color */
            color: white;
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>
<body>

<nav>
    <ul>
        <li><a href='book_appointment.php'>Book Appointment</a></li>
        <li><a href='show_all_appointments.php'>Reservations</a></li>
        <li><a href='doctor_add_form.php'>Add Doctor</a></li>
        <li><a href='lab_result_submission_form.php'>Lab Result Submission</a></li>
        <li><a href='reset_doctor_availability.php'>Edit Availability</a></li>
    </ul>
</nav>

<header>
    <h1>Doctor Appointment Booking System</h1>
</header>
