<?php
require_once 'media/header/header.php';
?>
<script src="<?php echo BASE_PATH; ?>/media/js/main.js"?>></script>
<div class="page-padding">
<h3> Search For Restaurant</h3>
<form>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="city">Select City :</label>
            <select id="city" name="city" class="form-control">
                <option value="null">--select city--</option>
                <?php 
                    require_once $_SERVER['DOCUMENT_ROOT'].'/foodzilla/model/class.serachOperation.php';
                    $obj = new SerachOperation();
                    $data = $obj->getAllCities();
                    if($data){
                        foreach($data as $city){
                            ?>
                            <option value="<?php echo $city['city_name'];?>"><?php echo $city['city_name'].", ".$city['city_state']; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="restaurant_name">Search Restaurant by name :</label>
            <input type="text" onkeyup="searchRestaurant()" class="form-control" id="restaurant_name" name="restaurant_name" placeholder="Restaurant Name">
        </div>
    </div>
  </form>
<?php
    require_once 'view/loadRestaurants.php';
?>
</div>