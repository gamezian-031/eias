<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<?php 
session_start();
if(empty($_SESSION['user_id'])){
    header("Location:index.php");
}
include('functions/config.php'); 
include('nav.php'); 
include('sidebar.php');
?>
<body>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                <?php 
                        if($_SESSION['role_id'] == 1){
                            ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <span class="count">
                                                <?php 
                                                    $query = "SELECT COUNT(*) as total_count FROM `tbl_users` WHERE role_id != 1";

                                                    $result = $con->query($query);
                                                    $total = $result->fetch_assoc();
                                                    
                                                    echo $total['total_count'];
                                                ?>
                                            </span>
                                            <div class="stat-heading">Users</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-box2"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <span class="count">
                                                <?php 
                                                    $userids = $_SESSION['user_id'];

                                                    $query = "SELECT COUNT(*) as total_count FROM `tbl_add_item` WHERE status=2";
                                                    $result = $con->query($query);
                                                    $total = $result->fetch_assoc();
                                                    
                                                    echo $total['total_count'];
                                                ?>
                                            </span>
                                            <div class="stat-heading">Borrowed</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-timer"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <span class="count">
                                                <?php 
                                                    $userid = $_SESSION['user_id'];
                                                    $query = "SELECT COUNT(*) as total_count FROM `tbl_add_item` WHERE status=1";
        
                                                    $result = $con->query($query);
                                                    $total = $result->fetch_assoc();
                                                    
                                                    echo $total['total_count'];
                                                ?>
                                            </span>
                                            <div class="stat-heading">Pending</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-close"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                                <div class="stat-text">
                                                    <span class="count">
                                                        <?php 
                                                            $userid = $_SESSION['user_id'];
                                                            $query = "SELECT COUNT(*) as total_count FROM `tbl_add_item` WHERE status=3";

                                                            $result = $con->query($query);
                                                            $total = $result->fetch_assoc();
                                                            
                                                            echo $total['total_count'];
                                                        ?>
                                                    </span>
                                                </div>
                                            <div class="stat-heading">Denied</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->              
                
                <!-- Orders -->
                <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Summary</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item Name</th>
                                                <th>Category Name</th>
                                                <th>Brand</th>
                                                <th>Location</th>
                                                <th>Item Quantity</th>
                                                <th>Status</th>
                                                <th>Days of borrowed</th>
                                                <th>Date & Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $userid = $_SESSION['user_id'];
                                            $quer = "SELECT role_id FROM tbl_users WHERE user_id = '$userid'";
                                            $query;
                                            $res = $con->query($quer);
                                            $fetch = $res->fetch_assoc();
                                            $roleid = $fetch['role_id'];
                                            if($roleid == '1'){
                                                $query =    "SELECT item_name,category_name,brand_name,location_name,borrow_quantity,status,DATEDIFF(curdate(), DATE_FORMAT(update_date,'%Y-%m-%d')) as days,tbl_add_item.timestamp 
                                                            FROM `tbl_add_item` INNER JOIN tbl_items ON tbl_add_item.item_id=tbl_items.item_id INNER JOIN tbl_location ON tbl_items.location_id=tbl_location.location_id INNER JOIN tbl_category ON tbl_items.category_id = tbl_category.category_id INNER JOIN tbl_brands ON tbl_brands.brand_id = tbl_items.brand_id
                                                            WHERE status != 0  ORDER BY timestamp DESC";
                                            } else{
                                                $query =    "SELECT item_name,category_name,brand_name,location_name,borrow_quantity,status,DATEDIFF(curdate(), DATE_FORMAT(update_date,'%Y-%m-%d')) as days,tbl_add_item.timestamp 
                                                            FROM `tbl_add_item` INNER JOIN tbl_items ON tbl_add_item.item_id=tbl_items.item_id INNER JOIN tbl_location ON tbl_items.location_id=tbl_location.location_id INNER JOIN tbl_category ON tbl_items.category_id = tbl_category.category_id INNER JOIN tbl_brands ON tbl_brands.brand_id = tbl_items.brand_id
                                                            WHERE user_id = '$userid' AND status != 0 ORDER BY timestamp DESC";
                                            }
                                            $result = $con->query($query);
                                            $no = 1;
                                            while($row = $result->fetch_assoc()){
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['item_name']; ?></td>
                                                    <td><?php echo $row['category_name']; ?></td>
                                                    <td><?php echo $row['brand_name']; ?></td>
                                                    <td><?php echo $row['location_name']; ?></td>
                                                    <td><?php echo $row['borrow_quantity']; ?></td>
                                                    <td>
                                                        <?php 
                                                        if($row['status'] == 1){
                                                            echo '<button type="button" class="btn btn-warning btn-sm text-white">Pending</button>';
                                                        }else if($row['status'] == 2){
                                                            echo '<button type="button" class="btn btn-success btn-sm text-white">Out</button>';
                                                        }else if($row['status'] == 4){
                                                            echo '';
                                                        }else if($row['status'] == 5){
                                                            echo '<button type="button" class="btn btn-default btn-sm text-white">In</button>';
                                                        }else{
                                                            echo '<button type="button" class="btn btn-danger btn-sm text-white">Denied</button>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        if($row['status'] == 2){
                                                            ?>
                                                            <h6><b><?php echo $row['days']; ?></b></h6>
                                                            <?php
                                                        }else if($row['status'] == 4){
                                                            ?>
                                                            <h6><b></b></h6>
                                                            <?php
                                                        }else if($row['status'] == 5){
                                                            ?>
                                                            <h6><b></b></h6>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <h6><b>N/A</b></h6>
                                                            <?php
                                                        }
                                                        ?>
                                                        
                                                        
                                                    </td>
                                                    <td><?php echo $row['timestamp']; ?></td>
                                                </tr>
                                                <?php
                                                $no++;
                                            }
                                            ?>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Item Name</th>
                                                <th>Category Name</th>
                                                <th>Brand</th>
                                                <th>Location</th>
                                                <th>Item Quantity</th>
                                                <th>Status</th>
                                                <th>Days of borrowed</th>
                                                <th>Date & Time</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                    All Rights Reserved by EIAS System | Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

   <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- This Page JS -->
    <script src="assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="dist/js/pages/mask/mask.init.js"></script>
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/libs/quill/dist/quill.min.js"></script>
    <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>

    <!--Local Stuff-->
    <script>
        $('#zero_config').DataTable();
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function () {
            //
            // Dear reader, it's actually very easy to initialize MiniColors. For example:
            //
            //  $(selector).minicolors();
            //
            // The way I've done it below is just for the demo, so don't get confused
            // by it. Also, data- attributes aren't supported at this time...they're
            // only used for this demo.
            //
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function (value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>
</body>
</html>