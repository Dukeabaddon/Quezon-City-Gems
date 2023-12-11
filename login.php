<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = mysqli_connect("localhost:3308", "root", "", "auth");

    if (!$conn) {
        die("Connection Failed: ". $con->connect_error);
    }

    $sql = "SELECT * FROM login WHERE email = ? AND password = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        session_start();
        $_SESSION["email"] = $email;
        header("Location: profile.html");
        exit();
    } else {
        header("Location: tryagain.html");
        exit();
    }

    mysqli_close($conn);
}

?>
