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
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Add Users</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Inventory</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Maintenance</li>
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <?php 
                            if(@$_GET['userid'] != ''){
                                ?>
                                <form class="form-horizontal" method="post" action="functions/updateUser.php">
                                    <div class="card-body">
                                        <?php 
                                        if(@$_GET['error'] == 1){
                                            ?>
                                            <div style="color: green;"><center><?php echo @$_GET['messsage'] ?></center></div>
                                            <?php
                                        }else{
                                            ?>
                                            <div style="color: red;"><center><?php echo @$_GET['messsage'] ?></center></div>
                                            <?php
                                        }
                                        ?>
                                        <?php 
                                        $uid = $_GET['userid'];
                                        $query = "SELECT * FROM `tbl_users` WHERE user_id=$uid";

                                        $result = $con->query($query);

                                        $fetchRow = $result->fetch_assoc();
                                        ?>
                                        <input type="hidden" class="form-control" name="uid" value="<?php echo $fetchRow['user_id']; ?>">
                                        <h4 class="card-title">Account Info</h4>
                                        <div class="form-group row">
                                            <label for="femail"
                                                class="col-sm-3 text-end control-label col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="email"
                                                    placeholder="Email Here" name="email" value="<?php echo $fetchRow['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email"
                                                class="col-sm-3 text-end control-label col-form-label">Contact No.</label>
                                            <div class="col-sm-9">
                                            <input class="form-control" type="number"
						                    maxlength="11" name="contactNo" placeholder="Contact Number"
						                    oninput="this.value=this.value.slice(0,this.maxLength)" value="<?php echo $fetchRow['contactNo']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname"
                                                class="col-sm-3 text-end control-label col-form-label">First Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="fname"
                                                    placeholder="First Name Here" name="fname" value="<?php echo $fetchRow['firstname']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Last
                                                Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="lname"
                                                    placeholder="Last Name Here" name="lname" value="<?php echo $fetchRow['lastname']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">
                                                Age</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="lname"
                                                    placeholder="Age Here" name="age" value="<?php echo $fetchRow['age']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cono1"
                                                class="col-sm-3 text-end control-label col-form-label">Role Type</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="role">
                                                    <?php 
                                                    if($fetchRow['role_id'] == 1){
                                                        ?>
                                                        <option value="<?php echo $fetchRow['role_id']; ?>" selected>Admin</option>
                                                        <?php
                                                    }else if($fetchRow['role_id'] == 2){
                                                        ?>
                                                        <option value="<?php echo $fetchRow['role_id']; ?>" selected>Student</option>
                                                        <?php
                                                    }else if($fetchRow['role_id'] == 3){
                                                        ?>
                                                        <option value="<?php echo $fetchRow['role_id']; ?>" selected>Teacher</option>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <option value="<?php echo $fetchRow['role_id']; ?>" selected>Visitor</option>
                                                        <?php
                                                    }   
                                                    ?>
                                                    <?php 
                                                    $query = "SELECT * FROM `tbl_role`";
                                                    $result = $con->query($query);
                                                    while($row = $result->fetch_assoc()){
                                                        ?>
                                                        <option value="<?php echo $row['role_id']; ?>"><?php echo $row['role_name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                            }else{
                                ?>
                                <form class="form-horizontal" method="post" action="functions/addUser.php">
                                    <div class="card-body">
                                        <?php 
                                        if(@$_GET['error'] == 1){
                                            ?>
                                            <div style="color: green;"><center><?php echo @$_GET['messsage'] ?></center></div>
                                            <?php
                                        }else{
                                            ?>
                                            <div style="color: red;"><center><?php echo @$_GET['messsage'] ?></center></div>
                                            <?php
                                        }
                                        ?>
                                        <h4 class="card-title">Account Info</h4>
                                        <div class="form-group row">
                                            <label for="email"
                                                class="col-sm-3 text-end control-label col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Email Here" name="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email"
                                                class="col-sm-3 text-end control-label col-form-label">Contact No.</label>
                                            <div class="col-sm-9">
                                            <input class="form-control" type="number"
						                    maxlength="11" name="contactNo" placeholder="Contact Number"
						                    oninput="this.value=this.value.slice(0,this.maxLength)" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname"
                                                class="col-sm-3 text-end control-label col-form-label">First Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="fname"
                                                    placeholder="First Name Here" name="fname" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Last
                                                Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="lname"
                                                    placeholder="Last Name Here" name="lname" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">
                                                Age</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="lname"
                                                    placeholder="Age Here" name="age" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">
                                                Username</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="lname"
                                                    placeholder="Username Here" name="username" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname"
                                                class="col-sm-3 text-end control-label col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="lname"
                                                    placeholder="Password Here" name="password" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cono1"
                                                class="col-sm-3 text-end control-label col-form-label">Role Type</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="role" require>
                                                    <option>Select Role</option>
                                                    <?php 
                                                    $query = "SELECT * FROM `tbl_role`";
                                                    $result = $con->query($query);
                                                    while($row = $result->fetch_assoc()){
                                                        ?>
                                                        <option value="<?php echo $row['role_id']; ?>"><?php echo $row['role_name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                                                Import CSV
                                                </button>
                                                <a href="functions/exportUser.php" <button type="submit" class="btn btn-secondary">Export CSV</button></a>    
                                                
                                        </div>
                                    </div>
                                </form>
                                <form action="functions/importUser.php" method="post"  name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                            
                            </form>
                                <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Import Spreadsheet</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                 
                                                <form class="form-horizontal" action="functions/importUser.php" method="post"
                                                        name="frmCSVImport" id="frmCSVImport"
                                                        enctype="multipart/form-data">
                                                        <div class="input-row">
                                                            <input type="file" name="file" id="file" accept=".csv">
                                                            <button type="submit" id="submit" name="import"
                                                                class="btn btn-primary">Upload
                                                            </button>
                                                            <br />

                                                        </div>

                                                    </form>
                                                 
                                                </div>
                                                <div class="modal-footer">
                                             
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            <!-- Modal -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Users Table</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th>Contact No.</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Age</th>
                                                <th>Username</th>
                                                <th>Role Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $query = "SELECT * FROM `tbl_users` INNER JOIN tbl_role ON tbl_users.role_id=tbl_role.role_id WHERE tbl_users.role_id != 1";
                                            $result = $con->query($query);
                                            while($row = $result->fetch_assoc()){
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['contactNo']; ?></td>
                                                    <td><?php echo $row['firstname']; ?></td>
                                                    <td><?php echo $row['lastname']; ?></td>
                                                    <td><?php echo $row['age']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['role_name']; ?></td>
                                                    <td><a href="users.php?userid=<?php echo $row['user_id']; ?>">Edit</a> | <a href="functions/recUsers.php?userid=<?php echo $row['user_id']; ?>">Temp. Del.</a></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Email</th>
                                                <th>Contact No.</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Age</th>
                                                <th>Username</th>
                                                <th>Role Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
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
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [0, 18000, 35000,  25000,  22000,  0],
                  [0, 33000, 15000,  20000,  15000,  300],
                  [0, 15000, 28000,  15000,  30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                        }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });

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
<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>