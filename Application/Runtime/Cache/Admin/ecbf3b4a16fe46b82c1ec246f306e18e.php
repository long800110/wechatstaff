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
            <a href="listSeat">List Seat</a>
        </li>
    </ul>
</div>


<div class="row">

	<div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-search"></i></h2>
                <div class="box-icon">                 
                    <a href="" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-search"></i></a>
                    
                </div>
            </div>
            <div class="box-content">
            	<div class="control-group col-md-4">
                    <label class="control-label" for="building">Building</label>
                    <div class="controls">
                        <select id="building" data-rel="chosen">
                            <option>Please Selete Building</option>
                            <option>MSD</option>
                            <option>B2</option>
                            <option>ABP</option>
                        </select>
                    </div>
                </div>
                <div class="control-group col-md-4">
                    <label class="control-label" for="floor">Floor</label>
                    <div class="controls">
                        <select id="floor" data-rel="chosen">
                            <option>Please Selete Floor</option>
                            <option>MSD-F27</option>
                            <option>MSD-F28</option>
                            <option>MSD-F29</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                	<label class="control-label" for="sdate">Monitor Date</label>
	            	<div class="input-group date-picker col-md-2 right" id="sdate" data-date="2016-09-10" data-date-format="yyyy-mm-dd">
	  					<input id="scanDate" type="text" class="form-control" size="16" value="" readonly="readonly" placeholder="">
	  					<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
				</div>
			
				
            </div>
        </div>
    </div>
            

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i>Seat Monitor</h2>

                <div class="box-icon">                 
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <ul class="thumbnails">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['cnt'] > 0 ): ?><li class="thumbnail cust-thumbnail">
	                		<div  class="seat-monitor s-booked" data-qrcode-id="<?php echo ($vo['qrcode_id']); ?>" data-scan-date="<?php echo ($vo['scan_date']); ?>">
	                		<label><?php echo ($vo['seat_name']); ?></label>
	                		<i class="glyphicon glyphicon-user"></i>
                		</div>
                		</li>
					<?php else: ?>
						<li class="thumbnail">
	                		<div  class="seat-monitor s-non-book">
	                		<label><?php echo ($vo['seat_name']); ?></label>
	                		<i class="glyphicon glyphicon-ban-circle"></i>
                		</div>
                	</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-offset-8 col-md-4">
    	<a class="btn btn-success export-file" href="#" id="exportExcel" data-file-type="EXCEL">
    		<i class="glyphicon glyphicon-download-alt icon-white"></i>Export Excel
		</a>
		<!-- 
		<a class="btn btn-danger export-file" href="#" id="exportPDF" data-file-type="PDF">
    		<i class="glyphicon glyphicon-download-alt icon-white"></i>Export PDF
		</a>
		 -->
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

<script>
	$(function(){

		var nowStr = moment().format("YYYY-MM-DD");
		
		$("#scanDate").val(nowStr);
		$("#sdate").data("date", nowStr);
		$("#sdate").datepicker({
			endDate: new Date(),
            format: "yyyy-mm-dd"
		})
		.on('changeDate',function(ev){
			  var theTime = ev.date.valueOf();
			  var nowStr = moment(theTime).format("YYYY-MM-DD");
			  $("#scanDate").val(nowStr);
		});
	});
	$(".seat-monitor.s-booked").click(function(e){
		var qrcodeId = $(this).data("qrcodeId");
		var scanDate = $(this).data("scanDate");
		var $self = $(this);
		$.post("getStaffInfo", {
 	          'qrcodeId' : qrcodeId,
 	          'scanDate' : scanDate
 	        }, function(jsonData) {
 	        	var data = eval(jsonData);
 	        	var content = "<hr>";
 	        	var info = data.info;
 	        	for(key in info){
 	        		value = info[key];
 	        		content += "<p class='cust-tooltip'>PWID: " + value.pwid + "</p>";
 	        		content += "<p class='cust-tooltip'>Name: " + value.name + "</p>";
 	        		content += "<p class='cust-tooltip'>Department: " + value.department + "</p>";
 	        		content += "<p class='cust-tooltip'>Cost Centre: " + value.cost_centre + "</p>"; 
 	        		content += "<hr>";
 	        	}
 	        	$self.data("toggle", "tooltip");
 	        	$self.data("title", content);
 	        	$self.data("html", true);
 	        	$self.data("placement", "bottom");
 	        	$self.tooltip('show');
 	        	
 	        	
 	        });
	});
	$(".export-file").click(function(e){
		var self = $(this);
		var fileType = self.data("fileType");
		var scanDate = $("#scanDate").val();
		/*  this is a mock data so far, Yuanlong*/
		var floorId = 2;
		window.location.href = "exportSeatMonitorReport?fileType="+fileType+"&scanDate=" + scanDate + "&floorId=" + floorId;
		/* $.post("exportSeatMonitorReport", {
	          'fileType' : fileType,
	          'scanDate' : scanDate,
	          'floorId' : floorId
	        },
        function(jsonData) {
        	var data = eval(jsonData);
        }); */
	});
	
</script>

</body>
</html>