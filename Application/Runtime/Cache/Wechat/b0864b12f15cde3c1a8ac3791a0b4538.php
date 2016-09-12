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
    <title>Staff Binding</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h4>Welcome, <?php echo ($nickName); ?></h4>
			<p>Please bind your staff ID with your wechat account.</p>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div id="errMsg" class="alert alert-danger hide">
                
            </div>
            <form class="form-horizontal" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input id="username" name="username" type="text" class="form-control" placeholder="PWID">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="clearfix"></div>

                    
                   
                    <p class="center col-md-5">
                        <button id="loginBtn" type="button" class="btn btn-primary">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

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
	//$("#errMsg").hide();
});

$('#loginBtn').click(function() {
        var username = $("#username").val();
        var password = $("#password").val();
        $.post("validateBind", {
          'username' : username,
          'password' : password
        }, function(jsonData) {
        	var data = eval(jsonData);
            if (data.status == 1) {
            	alert("Congratulation! \n You bind your Staff ID and Wechat Account successfully.");
            	WeixinJSBridge.invoke('closeWindow',{},function(res){});

            } else {
          	  $("#username").val('');
          	  $("#password").val('');
          	  $("#errMsg").html(data.info);
          	  $("#errMsg").removeClass("hide");
            }
        })
});
</script>


</body>
</html>