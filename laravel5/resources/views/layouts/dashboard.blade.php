@extends('layouts.plane')

@section('body')
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
            <!--
            <form class="navbar-form navbar-left" role="search" action="search.php" method="GET">
                <div class="form-group">
                    <input type="text" class="form-control" name= "search" placeholder="Enter User Id">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Choose Interval
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ url ('tablesTagdetailsThisweek') }}"> This Week</a>
                        </li>
                        <li><a href="{{ url ('tablesTagdetailslast15days') }}"> Last 15 days</a>
                        </li>
                        <li><a href="{{ url ('tablesTagdetailslast30days') }}"> Last 30 days</a>
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
                        
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
                            <a href="{{ url ('tables') }}"><i class="fa fa-table fa-fw"></i> Tables User info</a>
                        </li>
                        
                        <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
                            <a href="{{ url ('tablesTagdetails') }}"><i class="fa fa-table fa-fw"></i> Tables Admin Tags info</a>
                        </li>
                    <!--    <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
                            <a href="{{ url ('tablesindividualTagdetails') }}"><i class="fa fa-table fa-fw"></i> Tables Admin Tags Versions info</a>
                        </li> -->

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
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">  
				@yield('section')
                       <script>
                            $(document).ready(function() {
                            var table = $('#example').DataTable();

                            // Add event listeners to the two range filtering inputs
                            $('#min').keyup( function() { table.draw(); } );
                            $('#max').keyup( function() { table.draw(); } );
                        } );
                    </script>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker1').datetimepicker();
                        });
                    </script>
  
                    <!--
                    <script>
                        $(document).ready(function(){
                            $('#example').dataTable().columnFilter({
                
                                    aoColumns: [{ type: "text" },
                                                { type: "date-range" }]
                                });
                            });
    
                    </script> -->
                   
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop

