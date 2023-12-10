<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Koneksi ke database
        $conn = new mysqli('localhost', 'root', 'Hanif772', 'jogjazone');
    
        // Validasi dan proses data
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $Username = $_POST['email'];
        $Email = $_POST['email'];
        $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $Username, $Email, $Password);
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            echo "Registrasi berhasil!";
        } else {
            echo "Registrasi gagal!";
        }
    
        $stmt->close();
        $conn->close();
        header('Location: User_Form.html');
    }
?>