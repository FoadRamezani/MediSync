<?php include('header.php'); ?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .container {
        width: 80%;
        margin: auto;
        background: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
        border-radius: 8px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .tabs {
        display: flex;
        cursor: pointer;
        margin-bottom: 20px;
    }
    .tab {
        flex: 1;
        padding: 10px;
        text-align: center;
        background: #eee;
        border-radius: 8px 8px 0 0;
        margin-right: 5px;
        font-weight: bold;
    }
    .tab.active {
        background: #5cb85c;
        color: white;
    }
    .tab-content {
        display: none;
    }
    .tab-content.active {
        display: block;
    }
    form {
        display: flex;
        flex-direction: column;
    }
    label {
        margin: 10px 0 5px;
        font-weight: bold;
    }
    input[type="text"], input[type="number"], input[type="email"], textarea, select {
        padding: 10px;
        margin: 5px 0 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 100%;
        box-sizing: border-box;
    }
    input[type="submit"] {
        padding: 10px;
        background: #5cb85c;
        border: 0;
        border-radius: 4px;
        color: white;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
        margin-top: 20px;
    }
    input[type="submit"]:hover {
        background: #4cae4c;
    }
    .search-results {
        margin-top: 20px;
        background: #f9f9f9;
        padding: 10px;
        border-radius: 4px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        max-height: 300px;
        overflow-y: auto;
    }
    .search-results h3 {
        margin-top: 0;
    }
    .result-card {
        background: #fff;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s, box-shadow 0.3s;
    }
    .result-card:hover {
        background-color: #f0f0f0;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    .result-card p {
        margin: 5px 0;
        color: #333;
    }
    footer {
        text-align: center;
        padding: 10px 0;
        background: #f4f4f4;
        border-top: 1px solid #ccc;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                
                const target = tab.getAttribute('data-target');
                tabContents.forEach(tc => {
                    if(tc.getAttribute('id') === target) {
                        tc.classList.add('active');
                    } else {
                        tc.classList.remove('active');
                    }
                });
            });
        });

        // Activate the "Search for Patient" tab by default
        tabs[1].classList.add('active');
        tabContents[1].classList.add('active');
    });
</script>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_final";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $healthNo = $_POST['healthNo'];
    $email = $_POST['email'];
    $phoneNo = $_POST['phoneNo'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO registration (fname, lname, healthNo, email, phoneNo, address, gender) VALUES ('$fname', '$lname', '$healthNo', '$email', '$phoneNo', '$address', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='container'><p style='color: green;'>New patient registered successfully</p></div>";
    } else {
        echo "<div class='container'><p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p></div>";
    }
}

$search_result = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $search_fname = $_POST['search_fname'];
    $search_lname = $_POST['search_lname'];
    $search_phoneNo = $_POST['search_phoneNo'];

    $conditions = [];
    if (!empty($search_fname)) {
        $conditions[] = "fname LIKE '%$search_fname%'";
    }
    if (!empty($search_lname)) {
        $conditions[] = "lname LIKE '%$search_lname%'";
    }
    if (!empty($search_phoneNo)) {
        $conditions[] = "phoneNo LIKE '%$search_phoneNo%'";
    }

    if (count($conditions) > 0) {
        $sql = "SELECT * FROM registration WHERE " . implode(' OR ', $conditions);
        $search_result = $conn->query($sql);
    }
}

$conn->close();
?>

<div class="container">
    <div class="tabs">
        <div class="tab" data-target="register">Register New Patient</div>
        <div class="tab" data-target="search">Search for Patient</div>
    </div>

    <div class="tab-content" id="register">
        <h2>Register New Patient</h2>
        <form action="register_patient.php" method="post">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" required>
            
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required>
            
            <label for="healthNo">Health Number:</label>
            <input type="number" id="healthNo" name="healthNo" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phoneNo">Phone Number:</label>
            <input type="text" id="phoneNo" name="phoneNo" required>
            
            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>
            
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            
            <input type="submit" name="register" value="Register">
        </form>
    </div>
    
    <div class="tab-content" id="search">
        <h2>Search for Patient</h2>
        <form action="register_patient.php" method="post">
            <label for="search_fname">First Name:</label>
            <input type="text" id="search_fname" name="search_fname">
            
            <label for="search_lname">Last Name:</label>
            <input type="text" id="search_lname" name="search_lname">
            
            <label for="search_phoneNo">Phone Number:</label>
            <input type="text" id="search_phoneNo" name="search_phoneNo">
            
            <input type="submit" name="search" value="Search">
        </form>
        
        <div class="search-results">
            <?php
            if ($search_result !== null) {
                if ($search_result->num_rows > 0) {
                    echo "<h3>Search Results:</h3>";
                    while($row = $search_result->fetch_assoc()) {
                        echo "<div class='result-card'>";
                        echo "<p><strong>Name:</strong> " . $row["fname"]. " " . $row["lname"]. "</p>";
                        echo "<p><strong>Email:</strong> " . $row["email"]. "</p>";
                        echo "<p><strong>Phone:</strong> " . $row["phoneNo"]. "</p>";
                        echo "<p><strong>Address:</strong> " . $row["address"]. "</p>";
                        echo "<p><strong>Gender:</strong> " . $row["gender"]. "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No results found.</p>";
                }
            }
            ?>
        </div>
    </div>
</div>

<footer>
    <?php include('footer.php'); ?>
</footer>
