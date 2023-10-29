<?php
    require_once('./helpers/DatabaseConnect.php');
    $databaseConnect = new DatabaseConnect();
    $conn = $databaseConnect->getInstance();
    $response = [];
    $uname = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);
  
        if ($uname != "" && $password != ""){
           $sql_query = "SELECT id,user_type,name,email,phone,password FROM users WHERE email='".$uname."'";
           $result = mysqli_query($conn,$sql_query);
           $result_num = mysqli_num_rows($result);
           if($result_num != 0){
                // account exists
                while($row = mysqli_fetch_array($result)){
                   $pw = $row['password'];
                   if($row['user_type'] == 1){
                       // company logged in
                       $response = [
                            'status' => "error",
                            'message' => "Invalid User!",
                        ];
                    }else{
                        if(password_verify($password, $pw)){
                            $userId = $row['id'];
                            session_name('BusUserSession');
                            session_start();
                            $_SESSION['loggedin'] = TRUE;
                            $_SESSION['user_id'] = $userId;
                            $_SESSION['user_type'] = $row['user_type'];
                            $_SESSION['name'] = $row['name'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['phone'] = $row['phone'];
                            $_SESSION['start'] = time();
                            $_SESSION['expire'] = $_SESSION['start']+(1 * 24 * 60 * 60 * 100);
                            $response = [
                                'status' => "success",
                                'message' => "Authentication Successful!",
                            ];
                        }else{
                            $response = [
                                'status' => "error",
                                'message' => "Invalid Password",
                            ];
                        }
                   }
              }
           }else{
            // account doesn't exists
                $response = [
                    'status' => "error",
                    'message' => "Account does not exists!",
                ];
           }
        }

        echo json_encode($response);
?>