$(function(){
	$("#errMsg").hide();
});

$('#loginBtn').click(
      function() {
        var username = $("#username").val();
        var password = $("#password").val();
        $.post("validate", {
          'username' : username,
          'password' : password
        }, function(jsonData) {
        	var data = eval(jsonData);
          if (data.status == 1) {
            window.location.href = data.url;
          } else {
        	  $("#username").val('');
        	  $("#password").val('');
        	  $("#errMsg").html("Please input correct username or password");
        	  $("#errMsg").show();
          }
        })
      });