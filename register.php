<link rel="shortcut icon" href="images/logo-eias.png">
<?php 
session_start();
if(!empty($_SESSION['user_id'])){
    header("Location:dashboard.php");
}
include('nav.php'); 
include('functions/config.php'); 
?>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(dist/images/bg-pupt.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
				</div>

				<form class="login100-form validate-form" action="functions/addUser.php" method="post">               
                <div class="wrap-input100 validate-input" data-validate="First Name is required">
						<span class="label-input100">First Name</span>
						<input class="input100" class="form-control" type="text" name="fname" placeholder="First Name" id="fname">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Last Name is required">
						<span class="label-input100">Last Name</span>
						<input class="input100" class="form-control" type="text" name="lname" placeholder="Last Name" id="lname">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" class="form-control" type="text" name="email" placeholder="Email Address">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Contact No.</span>
						<input class="input100" class="form-control" type="number"
						maxlength="11" name="contactNo" placeholder="Contact Number"
						oninput="this.value=this.value.slice(0,this.maxLength)">
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Number Only">
						<span class="label-input100">Age</span>
						<input class="input100" class="form-control" type="text" name="age" placeholder="Age" id="lname">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" class="form-control" type="text" name="username" placeholder="Username" id="lname">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" class="form-control" type="password" name="password" placeholder="Password" id="lname">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Select Role</span>
					
						<span class="focus-input100"></span>
					</div> 
                    
                    <div class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-1" data-validate = "Role is required">
						<select class="form-control" name="role" id="role" required>
							<!--<option>Select Role</option>-->
								<?php 
                                    $query = "SELECT * FROM `tbl_role`";
                                    $result = $con->query($query);
                                    while($row = $result->fetch_assoc()){
                                ?>
								<?php if($row['role_id'] != 1): ?>
                                    <option value="<?php echo $row['role_id']; ?>"><?php echo $row['role_name']; ?></option>
                                <?php endif; ?>
								<?php
                                    }
                                ?>
						</select>
					</div>
                    
					<div style="color: red"><?php echo @$_GET['message']; ?></div>
					<div class="flex-sb-m w-full p-b-30">

						<div>
							<a href="#" class="txt1">
								
							</a>
						</div>
					</div>

                    <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Sign Up
							</button>
						</div>
					
                        <a href="index.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-alt-right m-l-5"></i>
						</a>

				</form>
			</div>
		</div>
	</div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
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
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <!--===============================================================================================-->
	<script src="dist/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="dist/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="dist/vendor/bootstrap/js/popper.js"></script>
	<script src="dist/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="dist/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="dist/vendor/daterangepicker/moment.min.js"></script>
	<script src="dist/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="dist/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="dist/js/main.js"></script>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>

    $(".preloader").fadeOut();
    // ============================================================== 
    </script>

</body>

</html>