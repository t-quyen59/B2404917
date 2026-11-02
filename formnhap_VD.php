<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
$result = $conn->query("SELECT * FROM major");
?>

<!DOCTYPE HTML>
<html>
<body>

<h2>Nhap thong tin sinh vien</h2>

<form action="luu.php" method="post">
    Name: <input type="text" name="name" required><br>

    E-mail: <input type="email" name="email"><br>

    Birthday: <input type="date" name="birth" required><br>

    Chuyen nganh:
    <select name="major_id" required>
        <option value="">-- Chon chuyen nganh --</option>

        <?php
        while ($major = $result->fetch_assoc()) {
            echo '<option value="' . $major['id'] . '">'
                . htmlspecialchars($major['name_major'])
                . '</option>';
        }
        ?>
    </select>
    <br>

    <input type="submit" value="Them sinh vien">
</form>

</body>
</html>

<?php $conn->close(); ?>