
<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include ('TokensModel.php');
    include ('EmployeesModel.php');

    if(isset($_GET['token'])){
        try{
          $tokens = new TokenModel();
          $employees = new EmployeesModel();
        }catch(PDOException $e ){
            http_response_code(200);
            die(json_encode(array('message' => $e->getMessage() )));
        }

        $token = $_GET['token'];
        if($tokens->validate_token($token)){
            $emplyees_arr = $employees->select();
            echo json_encode($emplyees_arr);
        }else{
          http_response_code(404);
          die(json_encode(array('message' => 'ERROR: Invalid Token' )));
        }
    }else{
        http_response_code(404);
        die(json_encode(array('message' => 'ERROR: No token provided' )));
    }
?>
