<?php
require_once 'path_config.php';
class MysqlOperation{

    function createConnection(){
        $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return false;
        }
        return $conn;
    }
    function closeConnection($conn){
        $conn->close();
    }
    function insertQuery($conn,$sql){
        if ($conn->query($sql) === TRUE) {
            return array("status"=>200, "query_msg"=>"New record created successfully");
        } else {
            return array("status"=>300, "query_msg"=>$conn->error);
        }
    }
    function executeSelectQuery($conn,$sql){
        $result = $conn->query($sql);
        $dataArray;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $dataArray[] = $row;
            }
            return array("status"=>200, "query_msg"=>"Record Found", "DATA"=>$dataArray);
        } else {
            return array("status"=>404, "query_msg"=>"No record Found");
        }
    }
}
?>