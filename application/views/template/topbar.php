</head>
<?php error_reporting(E_ALL ^ E_DEPRECATED);
                                                                $user1 = $_SESSION['nama'];
                                                                include "koneksi.php";
                                                                $query = mysql_query("SELECT * from admin where username = '$user1'");
                                                                if($query === FALSE) { 
                                                                    die(mysql_error()); // TODO: better error handling
                                                                }

                                                                while($row = mysql_fetch_array($query))
                                                                {
                                                                    $foto = $row['foto'];
                                                                    ?>
<body class="skin-blue">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <a href="#" class="logo"><b>Welcome</b></a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                      
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class = "fa fa-user"></i>
                                <span class="hidden-xs"><?php 
																	echo $row['nama'];
																
																?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url('gambar/'.$foto) ?>" class="img-circle" alt="User Image"/>
                                    <p>
                                        <?php echo $row['nama']; ?>
																<small><?php echo $row['privileges']; }?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url('profile?user='.$user1) ?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->