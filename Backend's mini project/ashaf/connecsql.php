<!DOCTYPE html>
<html>

<head>
    <title>Insert Data into Mahasiswa Table</title>
</head>

<body>
    <h2>Insert Data into Mahasiswa Table</h2>
    <form method="POST" action="">
        <label for="id_user">ID User:</label>
        <input type="text" name="id_user" id="id_user" required><br><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br><br>

        <label for="kelas">Kelas:</label>
        <input type="text" name="kelas" id="kelas" required><br><br>

        <label for="kelamin">Jenis Kelamin:</label>
        <select name="kelamin" id="kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dummy_projek";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST['submit'])) {
            $id_user = $_POST['id_user'];
            $nama = $_POST['nama'];
            $kelas = $_POST['kelas'];
            $kelamin = $_POST['kelamin'];
            // Set password as id_user
            $password = $id_user;

            $sql = "INSERT INTO mahasiswa (id_user, nama, kelas, kelamin, password) VALUES (:id_user, :nama, :kelas, :kelamin, :password)";
            $stmt = $connection->prepare($sql);

            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':kelas', $kelas);
            $stmt->bindParam(':kelamin', $kelamin);
            $stmt->bindParam(':password', $password);

            $stmt->execute();

            echo "Data inserted successfully!";
        }

        echo "<h2>Data from Mahasiswa Table:</h2>";
        $sql = "SELECT * FROM mahasiswa";
        $stmt = $connection->query($sql);
        $mahasiswaData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($mahasiswaData) > 0) {
            echo "<ul>";
            foreach ($mahasiswaData as $mahasiswa) {
                echo "<li>ID User: " . $mahasiswa['id_user'] . "</li>";
                echo "<li>Nama: " . $mahasiswa['nama'] . "</li>";
                echo "<li>Kelas: " . $mahasiswa['kelas'] . "</li>";
                echo "<li>Kelamin: " . $mahasiswa['kelamin'] . "</li>";
                echo "<li>Password: " . $mahasiswa['password'] . "</li>";
                echo "<hr>";
            }
            echo "</ul>";
        } else {
            echo "No records found in the Mahasiswa Table.";
        }

        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
</body>

</html>