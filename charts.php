<?php
  $con = mysqli_connect("localhost","root","","eias");
  if($con){
    echo "Item Inventory";
  }
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['students', 'contribution'],
         <?php
         $sql = "SELECT * FROM `tbl_items` INNER JOIN tbl_category ON tbl_items.category_id=tbl_category.category_id";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['category_name']."',".$result['item_quantity']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Items Inventory'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>

<?php
  $con = mysqli_connect("localhost","root","","eias");
  if($con){
    echo "Most Borrowed Item Inventory";
  }
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['students', 'contribution'],
         <?php
         $sql = "SELECT * FROM `tbl_items` INNER JOIN tbl_returned_item ON tbl_items.item_id=tbl_returned_item.item_id INNER JOIN tbl_category ON tbl_items.category_id=tbl_category.category_id";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['category_name']."',".$result['return_quantity']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Borrowed Items'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart2" style="width: 900px; height: 500px;"></div>
  </body>
</html>