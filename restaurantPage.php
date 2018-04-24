<?php
require_once 'media/header/header.php';
if(isset($_GET['resto'])){
$restoId = base64_decode($_GET['resto']);
$str = file_get_contents('controller/restoData.json');
$restoJson = json_decode($str, true);
    if (array_key_exists($restoId,$restoJson)){
?>
<div class="page-padding">
<h2><img src="<?php echo $restoJson[$restoId]['icon'];?>" width="30" height="30" alt=""><?php echo $restoJson[$restoId]['name'];?> <span class="badge badge-secondary">Rating : <?php echo $restoJson[$restoId]['rating'];?></span></h2>
<?php
    if(array_key_exists('photos',$restoJson[$restoId]) && array_key_exists('photo_reference',$restoJson[$restoId]['photos'][0])){
        //foreach($restoJson[$restoId]['photos'] as $photo){
            ?><div class="carousel-item active">
                <img class="img-thumbnail" src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=<?php echo $restoJson[$restoId]['photos'][0]['photo_reference'];?>&key=AIzaSyD8DhUEL6u26yPUyKKcV9Tu3DCjekgEwLg" alt="Restaurant image">
            </div>
            <?php 
        //}          
    }
?>
<div class="card card-nobr">
  <div clas="card-body">
  <b>Address:</b></br><?php echo $restoJson[$restoId]['formatted_address'];?><br>
  <?php 
    if(array_key_exists('opening_hours',$restoJson[$restoId]) && array_key_exists('open_now',$restoJson[$restoId]['opening_hours']) && $restoJson[$restoId]['opening_hours']['open_now']){
      ?><b>Place is <i>Open</i></b></br><?php
  }
  ?>
  <b>Key Point:</b></br>
  <?php 
        foreach($restoJson[$restoId]['types'] as $type){
            ?> <span class="badge badge-info badge-font"><?php echo $type;?></span> <?php
        }
    ?>
  </div>
</div>
<br>
<?php 
    require_once 'view/reviewList.php'; 
?>
<div>
<?php
}
}
?>
