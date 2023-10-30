<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_eval";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM trainingtypes";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $categories = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedCategoryId = $_POST['category'];
    // Perform further actions based on the selected category
    echo "Selected category ID: " . $selectedCategoryId;}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dropdown List Example</title>
</head>
<body>
    <h2>Select a Category:</h2>
    <form method="POST" action="">
        <select name="category">
            <?php
            foreach ($categories as $category) {
                echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
