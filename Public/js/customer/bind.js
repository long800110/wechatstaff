        	var data = eval(jsonData);
          if (data.status == 1) {
				alert("Congratulation! \n You bind your Staff ID and Wechat Account successfully.", function(){
					WeixinJSBridge.call('closeWindow');
				});
          } else {
        	  $("#username").val('');
        	  $("#password").val('');
        	  $("#errMsg").html("Please input correct username or password");
        	  $("#errMsg").show();
          }