<?php
    require_once('./helpers/DatabaseConnect.php');
    $databaseConnect = new DatabaseConnect();
    $conn = $databaseConnect->getInstance();
    $response = [];
    $name = $_POST['name'];
    $comName = $_POST['comName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['pass'];

    if($name != "" && $comName != "" && $email != "" && $phone != "" && $password != ""){
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $userType = '1';
        $sql = "INSERT INTO users (name,user_type,email,phone,company_name,password) VALUES (:value1,:value2,:value3,:value4,:value5,:value6)";
        $params = array(
            array($name, SQLSRV_PARAM_IN),
            array($userType, SQLSRV_PARAM_IN),
            array($email, SQLSRV_PARAM_IN),
            array($phone, SQLSRV_PARAM_IN),
            array($comName, SQLSRV_PARAM_IN),
            array($hashPass, SQLSRV_PARAM_IN),
        );
        
        $stmt = sqlsrv_query($conn, $insertQuery, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            $response = [
                'status' => "success",
                'message' => "Company Registration Success!",
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