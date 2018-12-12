
<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include ('UsersModel.php');
    include ('TokensModel.php');

    if(isset($_POST['username'] && isset($_POST['password'])){
        try{
          $users = new UsersModel();
          $tokens = new TokensModel();
        }catch(PDOException $e ){
            die(json_encode(array('message' => $e->getMessage() )));
        }

        $username = $_POST['username'];
        $password = $_POST['password'];
        if(count($users->select_user($username,  $password))){
            $token = bin2hex(random_bytes(64));
            if($tokens->insert($token)){
              http_response_code(200);
              die(json_encode(array('token' => $tokens )));
            }

        }else{
          http_response_code(404);
          die(json_encode(array('message' => 'ERROR: No users with this username or password' )));
        }
    }else{
        http_response_code(404);
        die(json_encode(array('message' => 'ERROR: Please provide username and password' )));
    }
?>
