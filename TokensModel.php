
<?php
    require_once AbstrcatModel.php;
    class TokensModel extends Model{
        public function validate_token($token){
            $sql = "SELECT count(id) FROM Tokens where token = :token";

            $exec = $this->pdo->prepare($sql);
            $exec->execute([$token]);
            $num_of_tokens = $exec->fetchAll();

            if ($num_of_tokens > 0 ) {
                return true;
            }else{
              return false;
            }
        }

        public function insert($token){
          $sql = 'INSERT INTO Tokens (token) VALUES (:token) ';
          $exec = $this->pdo->prepare($sql);
          $exec->execute([$token]);
          $id = $this->pdo->lastInsertId();
          return $id;
        }



     }
?>
