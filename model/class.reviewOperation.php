<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/foodzilla/media/database/class.mysqlOperation.php';
class ReviewOperation extends MysqlOperation{
    function insertReivew($placeId,$email,$userName,$review,$rating){
        $conn = $this->createConnection();
        if($conn){
            $sql = "INSERT INTO placeReview(place_id, email_id, user_name, review, rating) VALUE('$placeId','$email','$userName','$review',$rating)";
            $result = $this->insertQuery($conn,$sql);
            if($result['status'] == 200){
                return true;
            }
            else{
                return false;
            }
        }
    }
    function getAllReview($placeId){
        $conn = $this->createConnection();
        if($conn){
            $sql= "SELECT user_name, review, rating FROM placeReview where place_id = '$placeId'";
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