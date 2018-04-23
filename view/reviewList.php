<script src="<?php echo BASE_PATH; ?>/media/js/submitReview.js"?>></script>
<div class="page-padding">
    <span class="badge-font">Please Share Your review.</span>
    <button type="button" class="btn btn-primary review-button" data-toggle="modal" data-target="#exampleModal">Review </button>
    <div id="reviewTable">
    <table class="table">
        <colgroup>
            <col width="15%">
            <col width="60%">
            <col width="25%">
        </colgroup>
        <tbody>
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'].'/foodzilla/model/class.reviewOperation.php';
            $obj = new ReviewOperation();
            $data = $obj->getAllReview($restoJson[$restoId]['place_id']);
            if($data){
                foreach($data as $review){
                ?>
                    <tr>
                        <td><b><?php echo $review['user_name'];?></b></td>
                        <td><?php echo $review['review'];?></td>
                        <td>
                            <!-- <b>Rating</b> <?php echo $review['rating'];?> -->
                            <input id='input-21e' value='<?php echo $review['rating'];?>' type='text' class='rating' data-min=0 data-max=5 data-step=0.5 data-size='s' disabled="disabled">
                        </td>
                    </tr>
                    <?php
                }
            }
        ?>
        </tbody>
    </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="emailId" class="col-form-label">Email Id:</label>
            <input type="email" class="form-control" id="emailId" name="emailId">
            <input type="hidden" class="form-control" id="placeId" name="placeId" value="<?php echo $restoJson[$restoId]['place_id'];?>">
          </div>
          <div class="form-group">
            <label for="userName" class="col-form-label">User Name:</label>
            <input type="text" class="form-control" id="userName" name="userName">
          </div>
          <div class="form-group">
            <label for="review" class="col-form-label">Review:</label>
            <textarea class="form-control" id="review" name="review" rows="4"></textarea>
          </div>
          <div class="form-group">
            <label for="rating" class="col-form-label">Rating:</label>
            <input id="rating" name="rating" value="0" type="text" class="rating" data-min=0 data-max=5 data-step=0.5 data-size="xs"
               title="">
            <hr>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"onclick="submitReview();">Save Review</button>
      </div>
    </div>
  </div>
</div>