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
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Update Data in Mahasiswa Table</h2>
    <form method="POST" action="">
        <label for="update_id">ID User to Update:</label>
        <input type="text" name="update_id" id="update_id" required><br><br>

        <label for="new_nama">New Nama:</label>
        <input type="text" name="new_nama" id="new_nama" required><br><br>

        <label for="new_kelas">New Kelas:</label>
        <input type="text" name="new_kelas" id="new_kelas" required><br><br>

        <label for="new_kelamin">New Jenis Kelamin:</label>
        <select name="new_kelamin" id="new_kelamin" required>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select><br><br>

        <input type="submit" name="update" value="Update">
    </form>

    <h2>Delete Data from Mahasiswa Table</h2>
    <form method="POST" action="">
        <label for="delete_id">ID User to Delete:</label>
        <input type="text" name="delete_id" id="delete_id" required><br><br>

        <input type="submit" name="delete" value="Delete">
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
        if (isset($_POST['delete'])) {
            $delete_id = $_POST['delete_id'];

            // Add code to delete the record with the specified ID from the "mahasiswa" table
            $delete_sql = "DELETE FROM mahasiswa WHERE id_user = :delete_id";
            $delete_stmt = $connection->prepare($delete_sql);
            $delete_stmt->bindParam(':delete_id', $delete_id);

            if ($delete_stmt->execute()) {
                echo "Record with ID User $delete_id has been deleted.";
            } else {
                echo "Failed to delete the record.";
            }
        }

        if (isset($_POST['update'])) {
            $update_id = $_POST['update_id'];
            $new_nama = $_POST['new_nama'];
            $new_kelas = $_POST['new_kelas'];
            $new_kelamin = $_POST['new_kelamin'];

            // Add code to update the record with the specified ID in the "mahasiswa" table
            $update_sql = "UPDATE mahasiswa SET nama = :new_nama, kelas = :new_kelas, kelamin = :new_kelamin WHERE id_user = :update_id";
            $update_stmt = $connection->prepare($update_sql);
            $update_stmt->bindParam(':update_id', $update_id);
            $update_stmt->bindParam(':new_nama', $new_nama);
            $update_stmt->bindParam(':new_kelas', $new_kelas);
            $update_stmt->bindParam(':new_kelamin', $new_kelamin);

            if ($update_stmt->execute()) {
                echo "Record with ID User $update_id has been updated.";
            } else {
                echo "Failed to update the record.";
            }
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