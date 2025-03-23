<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                        <?php
                            if($_SESSION['role_id'] == 1){
                        ?>
                    <li class="active">
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">EIAS</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-clipboard-list"></i>Borrow Details</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="fa fa-people-carry"></i><a href="request.php">Request Approval</a></li>
                            <!-- <li><i class="fa fa-archive"></i><a href="myborrow.php">Borrowed Items</a></li> -->
                            <li><i class="fa fa-ban"></i><a href="penalties.php">Penalties</a></li>
                        </ul>
                    </li>


                    <li class="menu-title">Inventory</li><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Items</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="menu-icon fa fa-box-open"></i><a href="borrow.php">Borrow</a></li>  
                            <li><i class="fa fa-shopping-cart"></i><a href="viewBorrow.php">Checkout</a></li>                            -->
                            <li><i class="menu-icon fa fa-list-ol"></i><a href="return.php">Return</a></li>
                            <li><i class="menu-icon fa fa-map-marked-alt"></i><a href="tracker.php">Borrower's Tracker</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-wallet"></i>Borrow</a>
                        <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-archive"></i><a href="borrow.php">Borrow Items</a></li>   
                                <li><i class="fa fa-shopping-cart"></i><a href="viewBorrow.php">Checkout</a></li>                        
                                <li><i class="fa fa-people-carry"></i><a href="myborrow.php">Borrow Status</a></li>
                        </ul>
        
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-wrench"></i>Maintenance</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-boxes"></i><a href="items.php">Add Item</a></li>
                            <li><i class="menu-icon fas fa-user"></i><a href="users.php">Users</a></li>
                            <li><i class="menu-icon fa fa-list-alt "></i><a href="category.php">Category</a></li>
                            <li><i class="menu-icon fa fa-clone"></i><a href="brands.php">Brands</a></li>
                            <li><i class="menu-icon fa fa-parachute-box"></i><a href="supplier.php">Supplier</a></li>
                            <li><i class="menu-icon fa fa-map-marked-alt"></i><a href="locations.php">Locations</a></li>
                            <!-- <li><i class="menu-icon fa fa-map-marked-alt"></i><a href="track.php">Item Tracker</a></li> -->
                           
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-wrench"></i>Temporary Storage</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fas fa-user"></i><a href="recycleUsers.php">Users</a></li>
                            <li><i class="menu-icon fa fa-boxes"></i><a href="recycleItems.php">Borrowed Items</a></li>
                        </ul>
                    </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="logs.php" aria-expanded="false"><i class="menu-icon fas fa-history"></i><span
                        class="hide-menu">Activity Log</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="track.php" aria-expanded="false"><i class="menu-icon fa fa-map-marked-alt"></i><span
                        class="hide-menu">Item Tracker</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="report.php" aria-expanded="false"><i class="menu-icon fa fa-file"></i><span
                        class="hide-menu">Reports</span></a></li>
                        <?php
                        }else{
                        ?>
                        
                            <li class="active">
                                <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                            </li>
                            <li class="menu-title">EIAS</li><!-- /.menu-title -->
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-clipboard-list"></i>Borrow</a>
                                <ul class="sub-menu children dropdown-menu"> 
                                    <li><i class="fa fa-archive"></i><a href="borrow.php">Borrow Items</a></li>   
                                    <li><i class="fa fa-shopping-cart"></i><a href="viewBorrow.php">Checkout</a></li>                        
                                    <li><i class="fa fa-people-carry"></i><a href="myborrow.php">Borrow Status</a></li>
                                </ul>
                            </li>
                        <?php
                            }
                        ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/EIAS.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo-eias.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <!--<div class="dropdown for-notification">-->
                        <!--    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                        <!--        <i class="fa fa-bell"></i>-->
                        <!--        <span class="count bg-danger">3</span>-->
                        <!--    </button>-->
                        <!--    <div class="dropdown-menu" aria-labelledby="notification">-->
                        <!--        <p class="red">You have 3 Notification</p>-->
                        <!--        <a class="dropdown-item media" href="#">-->
                        <!--            <i class="fa fa-check"></i>-->
                        <!--            <p>Server #1 overloaded.</p>-->
                        <!--        </a>-->
                        <!--        <a class="dropdown-item media" href="#">-->
                        <!--            <i class="fa fa-info"></i>-->
                        <!--            <p>Server #2 overloaded.</p>-->
                        <!--        </a>-->
                        <!--        <a class="dropdown-item media" href="#">-->
                        <!--            <i class="fa fa-warning"></i>-->
                        <!--            <p>Server #3 overloaded.</p>-->
                        <!--        </a>-->
                        <!--    </div>-->
                        <!--</div>-->

                    <!--    <div class="dropdown for-message">-->
                    <!--        <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--            <i class="fa fa-envelope"></i>-->
                    <!--            <span class="count bg-primary">4</span>-->
                    <!--        </button>-->
                    <!--        <div class="dropdown-menu" aria-labelledby="message">-->
                    <!--            <p class="red">You have 4 Mails</p>-->
                    <!--            <a class="dropdown-item media" href="#">-->
                    <!--                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>-->
                    <!--                <div class="message media-body">-->
                    <!--                    <span class="name float-left">Jonathan Smith</span>-->
                    <!--                    <span class="time float-right">Just now</span>-->
                    <!--                    <p>Hello, this is an example msg</p>-->
                    <!--                </div>-->
                    <!--            </a>-->
                    <!--            <a class="dropdown-item media" href="#">-->
                    <!--                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>-->
                    <!--                <div class="message media-body">-->
                    <!--                    <span class="name float-left">Jack Sanders</span>-->
                    <!--                    <span class="time float-right">5 minutes ago</span>-->
                    <!--                    <p>Lorem ipsum dolor sit amet, consectetur</p>-->
                    <!--                </div>-->
                    <!--            </a>-->
                    <!--            <a class="dropdown-item media" href="#">-->
                    <!--                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>-->
                    <!--                <div class="message media-body">-->
                    <!--                    <span class="name float-left">Cheryl Wheeler</span>-->
                    <!--                    <span class="time float-right">10 minutes ago</span>-->
                    <!--                    <p>Hello, this is an example msg</p>-->
                    <!--                </div>-->
                    <!--            </a>-->
                    <!--            <a class="dropdown-item media" href="#">-->
                    <!--                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>-->
                    <!--                <div class="message media-body">-->
                    <!--                    <span class="name float-left">Rachel Santos</span>-->
                    <!--                    <span class="time float-right">15 minutes ago</span>-->
                    <!--                    <p>Lorem ipsum dolor sit amet, consectetur</p>-->
                    <!--                </div>-->
                    <!--            </a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <!--<a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>-->

                            <!--<a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>-->

                            <!--<a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>-->

                            <a class="nav-link" href="functions/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->