
<?php
     include ("connect.php");

     abstract class Model{
        private $table_name = "";

        private $pdo;
        function __construct(){
            $host = DB_HOST;
            $user = DB_USERNAME;
            $pass = DB_PASSWORD;
            $charset = DB_CHARSET;
            $db = $this->get_table_name();

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

           try {
                $this->pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass, $options);
            }
            catch (PDOException $e) {
               die('Error: '.$e->getMessage().' Code: '.$e->getCode());
            }

        }

        public function get_table_name(){
          if($this->table_name == ""){
            $result = str_replace('Model', '', get_class($this));
            return $result;
          }else{
            return $this->table_name;
          }
        }


     }
?>
