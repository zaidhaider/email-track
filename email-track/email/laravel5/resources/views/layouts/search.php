<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>SB Admin v2.0 in Laravel 5</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
</head>
<body>
	<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('') }}">Rankwatch Mandrill Mail Manager</a>
            </div>
            <!-- /.navbar-header -->
            <form class="navbar-form navbar-left" role="search" action="search.php" method="GET">
                <div class="form-group">
                    <input type="text" class="form-control" name= "search" placeholder="Enter User Id">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Choose Interval
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"> This Week</a>
                        </li>
                        <li><a href="#"> Previous Week</a>
                        </li>
                        <li><a href="#"> 2 weeks before</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url ('login') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
                            <a href="{{ url ('tables') }}"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Searc result</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">  
				

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
	<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
</body>
</html>
<?php

$error_list=array();
error_reporting(E_ALL);

$search= $_GET['search'];
try
{
	$sql= "SELECT * FROM taginfos WHERE _id LIKE '%$search%'";
}
catch(exception $e)
{
	$error_list[]="connection could not be established";
}
 
$query= mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);

?>