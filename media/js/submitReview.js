jQuery(document).ready(function(){
    toRemoveRatingExtraData();
});
function submitReview(){
    var placeId = $('#placeId').val();
    var emailId = $('#emailId').val();
    var userName = $('#userName').val();
    var review = $('#review').val();
    var rating = $('#rating').val();
    if(placeId == "" || emailId == "" || userName == "" || review == "" || rating == ""){
        alert('Failed');
    }
    else if(isEmail(emailId)){
        var url = '../foodzilla/controller/reviewController.php'; 
        $.ajax({
          type : "POST",
          url: url,
          async:false,
          data: {reviewData : 1,placeId : placeId, email : emailId, userName : userName, review : review, rating : rating},
          success: function(respone){
            console.log(respone);
            if(respone){
                $('.modal').removeClass('show');
                $('.modal-backdrop').removeClass('show');
            }else{
                alert('Your Review is not submit please try again....');
            }
            reloadTable(placeId);
            
            /* rload start js for load table to show the stars */
            var script = document.createElement('script');
            script.src = '../foodzilla/media/js/star-rating.js';
            script.type = 'text/javascript';
            script.addEventListener("load", toRemoveRatingExtraData);
            document.getElementsByTagName('head')[0].appendChild(script);
          },
          error: function(error) {
            console.log(error);
          }
        });
    }
    else{
        alert('Please Enter Correct Email Id.');
    }
}
function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
function reloadTable(placeId){
    var url = '../foodzilla/controller/reviewController.php'; 
    $.ajax({
        type : "POST",
        url: url,
        async:false,
        data: {reloadTable : 1,placeId : placeId},
        success: function(respone){
        console.log(respone);
        var listOfReview = $("#reviewTable");
        listOfReview.html("");
        listOfReview.append(respone);
        },
        error: function(error) {
        console.log(error);
        }
    });
}
function toRemoveRatingExtraData(){
    var caption = $("#reviewTable .caption");
    caption.html("");
    var clearRating = $("#reviewTable .clear-rating");
    clearRating.html("");
}