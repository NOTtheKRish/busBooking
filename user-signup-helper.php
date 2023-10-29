<?php
    require_once('./helpers/DatabaseConnect.php');
    $databaseConnect = new DatabaseConnect();
    $conn = $databaseConnect->getInstance();
    $response = [];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['pass'];

    if($name != "" && $email != "" && $phone != "" && $password != ""){
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO users (name,email,phone,password) VALUES (:value1, :value2, :value3, :value4)";
        $params = array(
            array($name, SQLSRV_PARAM_IN),
            array($email, SQLSRV_PARAM_IN),
            array($phone, SQLSRV_PARAM_IN),
            array($hashPass, SQLSRV_PARAM_IN),
        );
        
        $stmt = sqlsrv_query($conn, $insertQuery, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            $response = [
                'status' => "success",
                'message' => "User Registration Success!",
            ];
        }
    }else{
        $response = [
            'status' => "error",
            'message' => "Enter all Details!",
        ];
    }

    echo json_encode($response);

?>