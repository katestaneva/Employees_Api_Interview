
<?php
     require_once AbstrcatModel.php;

     class EmployeesModel extends Model{
        public function select(){
            $sql = "SELECT uuid, company, bio, name, title, avatar FROM Employees ";
            $exec = $this->pdo->prepare($sql);
            $data = $exec->fetchAll();

            return $data;
        }
     }
?>
