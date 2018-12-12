
<?php
     include ("connect.php");
     require_once AbstrcatModel.php;
     class UsersModel extends Model{
        public function select_user($username, $password){
            $sql = "SELECT * FROM Users where username = :username AND password = :password  ";

            $exec = $this->pdo->prepare($sql);
            $exec->execute(array('username' => $username, 'password' => $password));
            $data = $exec->fetchAll();

            return $data;
        }


     }
?>
