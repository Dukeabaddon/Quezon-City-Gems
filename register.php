<?php 
$db_server = "localhost:3308";
$db_user = "root";
$db_pass = "";
$db_name = "auth";
$conn = null;

try{
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
}catch(mysqli_sql_exception) {
    echo "Cannot Connect";
}

if(isset($_POST["signup"])){ 
$email = $_POST["email"];
$gender = $_POST["gender"];
$birthday = $_POST["birthday"];
$password = $_POST["password"];
$password2 = $_POST["password2"];

if($password == $password2){

    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO login (email , gender, birthday, password) VALUES ( ? , ? , ? , ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $email, $gender, $birthday, $hashedPass);
    $stmt -> execute();

    echo "Registered successfully";

    $stmt->close();
    $conn -> close();

}else {
    echo "Password does not match";
}

}

?>