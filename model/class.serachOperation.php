<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/foodzilla/media/database/class.mysqlOperation.php';
class SerachOperation extends MysqlOperation{
    function getAllCities(){
        $conn = $this->createConnection();
        if($conn){
            $sql= "SELECT city_id, city_name, city_state FROM cities";
            $result = $this->executeSelectQuery($conn,$sql);
            if($result['status'] == 200){
                return $result['DATA'];
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
}
?>