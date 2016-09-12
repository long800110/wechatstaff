<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    
    <title>Back Office</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link href="/wechatProperty/Public/css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="/wechatProperty/Public/css/charisma-app.css" rel="stylesheet">
    <link href="/wechatProperty/Public/bower_components/fullcalendar/dist/fullcalendar.css" rel='stylesheet'>
    <link href="/wechatProperty/Public/bower_components/fullcalendar/dist/fullcalendar.print.css" rel='stylesheet' media='print'>
    <link href="/wechatProperty/Public/bower_components/chosen/chosen.min.css" rel='stylesheet'>
    <link href="/wechatProperty/Public/bower_components/colorbox/example3/colorbox.css" rel='stylesheet'>
    <link href="/wechatProperty/Public/bower_components/responsive-tables/responsive-tables.css" rel='stylesheet'>
    <link href="/wechatProperty/Public/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css" rel='stylesheet'>
    <link href="/wechatProperty/Public/css/jquery.noty.css" rel='stylesheet'>
    <link href="/wechatProperty/Public/css/noty_theme_default.css" rel='stylesheet'>
    <link href="/wechatProperty/Public/css/elfinder.min.css" rel='stylesheet'>
    <link href="/wechatProperty/Public/css/elfinder.theme.css" rel='stylesheet'>
    <link href="/wechatProperty/Public/css/jquery.iphone.toggle.css" rel='stylesheet'>
    <link href="/wechatProperty/Public/css/uploadify.css" rel='stylesheet'>
    <link href="/wechatProperty/Public/css/animate.min.css" rel='stylesheet'>
    <link href="/wechatProperty/Public/css/datepicker.css" rel='stylesheet'>
    <link href="/wechatProperty/Public/css/customer.css" rel='stylesheet'>

    <!-- jQuery -->
    <script src="/wechatProperty/Public/bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="/wechatProperty/Public/img/customer/favicon.png">

</head>
<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"> <img alt="" src="/wechatProperty/Public/img/customer/scblogo.svg" class="hidden-xs"/>
                </a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="login.html">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            
            </ul>

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="dashboard"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                        
                        <li class="nav-header hidden-md">System Managerment</li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-user"></i><span> Staff </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="listUser">List Wechat User</a></li>
                                <li><a href="listStaff">List Staff</a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-qrcode"></i><span> QR Code </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="addQRCode">Add QR Code</a></li>
                                <li><a href="listQRCode">List QR Code</a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-user"></i><span> Role </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="addRole">Add Role</a></li>
                                <li><a href="listRole">List Role</a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-folder-open"></i><span> Function </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="addFunction">Add Function</a></li>
                                <li><a href="listFunction">List Function</a></li>
                            </ul>
                        </li>
                        <li class="nav-header hidden-md">Building Management</li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-home"></i><span> Building </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="addBuilding">Add Building</a></li>
                                <li><a href="listBuilding">List Building</a></li>
                            </ul>
                        </li>
                        <li class="nav-header hidden-md">Floor Management</li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-road"></i><span> Floor </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="addFloor">Add Floor</a></li>
                                <li><a href="listFloor">List Floor</a></li>
                            </ul>
                        </li>
                        <li class="nav-header hidden-md">Seat Management</li>
                        
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-map-marker"></i><span> Seat </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="addSeat">Add Seat</a></li>
                                <li><a href="listSeat">List Seat</a></li>
                                <li><a href="monitorSeat">Monitor & Report</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            

<div>
    <ul class="breadcrumb">
        <li>
            <a href="dashboard">Home</a>
        </li>
        <li>
            <a href="listStaff">List Staff</a>
        </li>
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i>Staff List</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable ">
                        <thead>
                        <tr>
                            <th>PWID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Cost Centre</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class="center"><?php echo ($vo['pwid']); ?></td>
                            <td class="center"><?php echo ($vo['name']); ?></td>
                            <td class="center"><?php echo ($vo['department']); ?></td>
                            <td class="center"><?php echo ($vo['cost_centre']); ?></td>
                             
                            <td class="center">
                            <?php if($vo['status'] == 0 ): ?><span class="label label-success">Yes</span>
							<?php else: ?>
								<span class="label label-default">No</span><?php endif; ?>                                
                            </td>
                            
                            <td class="center">
                                <a class="btn btn-info" href="#">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="#">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Delete
                                </a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>        
            </div>
        </div>
    </div>
</div><!--/row-->



    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright"></p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="mailto:yuan-long.cui@sc.com">Yuanlong</a></p>
    </footer>

</div><!--/.fluid-container-->
<body>


<!-- external javascript -->

<script src="/wechatProperty/Public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="/wechatProperty/Public/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src="/wechatProperty/Public/bower_components/moment/min/moment.min.js"></script>
<script src="/wechatProperty/Public/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- data table plugin -->
<script src="/wechatProperty/Public/js/jquery.dataTables.min.js"></script>

<!-- select or dropdown enhancer -->
<script src="/wechatProperty/Public/bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="/wechatProperty/Public/bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="/wechatProperty/Public/js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="/wechatProperty/Public/bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="/wechatProperty/Public/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="/wechatProperty/Public/js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="/wechatProperty/Public/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="/wechatProperty/Public/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="/wechatProperty/Public/js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="/wechatProperty/Public/js/jquery.history.js"></script>
<script src="/wechatProperty/Public/js/bootstrap-datepicker.js"></script>
<script src="/wechatProperty/Public/js/moment.js"></script>
<!-- application script for Charisma demo -->
<script src="/wechatProperty/Public/js/charisma.js"></script>

</body>
</html>