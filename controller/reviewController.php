<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/foodzilla/model/class.reviewOperation.php';
if(isset($_POST['reviewData'])){
    $obj = new ReviewOperation();
    $data = $obj->insertReivew($_POST['placeId'],$_POST['email'],$_POST['userName'],$_POST['review'],$_POST['rating']);
    echo $data;
}
if(isset($_POST['reloadTable'])){
    $obj = new ReviewOperation();
    $data = $obj->getAllReview($_POST['placeId']);
    $table = '<table class="table">
    <colgroup>
        <col width="15%">
        <col width="60%">
        <col width="25%">
    </colgroup>
    <tbody>';
    if($data){
        foreach($data as $review){
            $table = $table .'
            <tr>
                <td><b>'.$review['user_name'].'</b></td>
                <td>'.$review['review'].'</td>
                <td>
                    <input id="input-21e" value="'.$review['rating'].'" type="text" class="rating" data-min=0 data-max=5 data-step=0.5 data-size="s" disabled="disabled">
                </td>
            </tr>';
        }
    }
    $table = $table ."</tbody></table>";
    echo $table;
}
?>