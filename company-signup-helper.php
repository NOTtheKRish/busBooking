<?php
    require_once('./helpers/DatabaseConnect.php');
    $databaseConnect = new DatabaseConnect();
    $conn = $databaseConnect->getInstance();
    $response = [];
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $comName =mysqli_real_escape_string($conn,$_POST['comName']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);

    if($name != "" && $comName != "" && $email != "" && $phone != "" && $password != ""){
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $userType = '1';
        $sql = "INSERT INTO users (name,user_type,email,phone,company_name,password) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name,$userType,$email,$phone,$comName,$hashPass);
        $stmt->execute();

        $response = [
            'status' => "success",
            'message' => "Company Registration Success!",
        ];

    }else{
        $response = [
            'status' => "error",
            'message' => "Enter all Details!",
        ];
    }

    echo json_encode($response);
?>