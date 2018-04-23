jQuery(document).ready(function(){
    $("#city").change(function() {
      var city = $("#city").val();
      if(city !== null){
        var url = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=restaurants+in+"+city+"&key=AIzaSyD8DhUEL6u26yPUyKKcV9Tu3DCjekgEwLg";
        console.log(url);
        $.ajax({
          method : "GET",
          crossDomain: true,
          url: url,
          async:true,
          headers: {
            "accept": "application/json",
            "Access-Control-Allow-Origin":"*"
          },
         dataType: 'json',
          success: function(data){
            createTable(data.results);
            writeJsonToServer(data.results)
          },
          error: function(error) {
            console.log(error);
          }
        });
      }
    });
  });
function createTable(restaurant){
  var table = $("<table />");
  table[0].border = "1";
  $(table).attr('id','restaurantTable');
  $(table).attr('class','table table-striped');
  var restaurantHeader = new Array();
  restaurantHeader.push(["Sr.", "Restaurant Name", "Address","Rating"]);
  //Get the count of columns.
  var columnCount = restaurantHeader[0].length;
 
  //Add the header row.
  var row = $(table[0].insertRow(-1));
  for (var i = 0; i < columnCount; i++) {
      var headerCell = $("<th />");
      headerCell.html(restaurantHeader[0][i]);
      $(headerCell).attr('scope','col');
      row.append(headerCell);
  }
  //Add the data rows.
  for (var i = 0; i < restaurant.length; i++) {
    row = $(table[0].insertRow(-1));
    $(row).attr("class","clickable-row");
    $(row).attr("data-href","../foodzilla/restaurantPage.php?resto="+btoa(i));
    var cell = $("<th />");
    cell.html(i+1);
    $(cell).attr('scope','col');
    row.append(cell);
    var cell1 = $("<td />");
    cell1.html(restaurant[i]['name']);
    row.append(cell1);
    var cell2 = $("<td />");
    cell2.html(restaurant[i]['formatted_address']);
    row.append(cell2);
    var cell3 = $("<td />");
    cell3.html(restaurant[i]['rating']);
    row.append(cell3);
  } 

  var listOfRest = $("#listOfRest");
  listOfRest.html("");
  listOfRest.append(table);
  $(".clickable-row").click(function() {
    window.location = $(this).data("href");
  });
}

function writeJsonToServer(restaurant){
  var url = '../foodzilla/controller/searchController.php'; 
  $.ajax({
    type : "POST",
    url: url,
    async:false,
    data: {restoData : JSON.stringify(restaurant)},
    success: function(respone){
      console.log(respone);
    },
    error: function(error) {
      console.log(error);
    }
  });
}
function searchRestaurant() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("restaurant_name");
  filter = input.value.toUpperCase();
  table = document.getElementById("restaurantTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}