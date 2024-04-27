<?php 
session_start();
include 'admin/db_connect.php';

function update_password() {
    if(isset($_POST['username']) && isset($_POST['new_password']) && isset($_POST['con_password'])) {
        $username = $_POST['username'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['con_password'];

        if ($new_password == $confirm_password) {
            $hashed_password = md5($new_password);

            $conn = new mysqli('localhost','root','','alumni_db');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "UPDATE users SET password = ? WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $hashed_password, $username);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo 1;
            } else {
                echo "Failed to update password.";
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Passwords do not match.";
        }
    } else {
        echo "Incomplete form data.";
    }
}

update_password();
?>
