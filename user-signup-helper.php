<?php
    require('helpers/DatabaseConnect.php');
    $databaseConnect = new DatabaseConnect();
    $conn = $databaseConnect->getInstance();
    $response = [];
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);

    if($name != "" && $email != "" && $phone != "" && $password != ""){
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO users (name,email,phone,password) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name,$email,$phone,$hashPass);
        $stmt->execute();

        $response = [
            'status' => "success",
            'message' => "User Registration Success!",
        ];
    }else{
        $response = [
            'status' => "error",
            'message' => "Enter all Details!",
        ];
    }

    echo json_encode($response);
?>