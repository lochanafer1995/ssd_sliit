<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="jquery-1.11.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<link href="style.css" rel="stylesheet" id="bootstrap-css">
<link href="font-awesome.min.css" rel="stylesheet">

<?php

$token = $_GET["code"];
if (isset($token))
{ 
?>
	<script src="node_modules/jquery/dist/jquery.min.js"></script>
        <script>
        //When the page has loaded.
			$( document ).ready(function(){
				//Perform Ajax request.
				$.ajax({
					url: 'https://www.googleapis.com/oauth2/v4/token',
					type: 'post',
					header : 'Content-Type: application/x-www-form-urlencoded',
					data: { 
					
						'code': '<?php echo $_GET["code"]; ?>',
						'scope': 'https://www.googleapis.com/auth/drive https://www.googleapis.com/auth/drive.metadata.readonly https://www.googleapis.com/auth/plus.me',
						'client_id': '502184323359-o0a2086o2igadevkekqac7m3gq5l6j71.apps.googleusercontent.com',
						'client_secret': 'q2Tsd8kabX0UHrAh1f8eto5Z',
						'grant_type':'authorization_code',
						'redirect_uri':'http://localhost/ssd_sliit/assignment2/process.php'
						
					},
					success: function(data){
						console.log(data);
						getval(data.access_token);
						getfiles(data.access_token);
					},
					error: function (xhr, ajaxOptions, thrownError) {
						var errorMsg = 'Ajax request failed: ' + xhr.responseText;
						//$('#content').html(errorMsg);
					  }
				});
			});
			function getval(value){
				var url = 'https://www.googleapis.com/plus/v1/people/me?access_token='; 
				var res = url.concat(value);
				$.ajax({
					url: res,
					type: 'GET',
					header : 'Content-Type: application/x-www-form-urlencoded',
					success: function(data){
							console.log(data);
							$('#name').text(data.displayName);
							$("#image1").attr("src",data.image.url);
							$("#name").attr("href",data.url);
					},
					error: function (xhr, ajaxOptions, thrownError) {
							var errorMsg = 'Ajax request failed: ' + xhr.responseText;
							//$('#content').html(errorMsg);
						  }
				});
			}
			
			function getfiles(value){
				var url = 'https://www.googleapis.com/drive/v2/files?access_token='; 
				var res = url.concat(value);
				$.ajax({
					url: res,
					type: 'GET',
					header : 'Content-Type: application/x-www-form-urlencoded',
					success: function(data){
							console.log(data.items);
							var list = "";
							for (var i = 0; i < data.items.length; i++) {
								console.log(data.items[i].title);
								list +="<li><a onclick=downloadfile('"+data.items[i].downloadUrl+"','"+value+"')>"+data.items[i].title+"</a></li>";
							}
							$("#gamelist").append(list);
					},
					error: function (xhr, ajaxOptions, thrownError) {
							var errorMsg = 'Ajax request failed: ' + xhr.responseText;
							//$('#content').html(errorMsg);
						  }
				});
			}
			function downloadfile(urlval,access){
				var head = 'Authorization : Bearer '; 
				var res = head.concat(access);
				console.log(res);
				$.ajax({
					url: urlval,
					type: 'GET',
					header : res,
					success: function(data){
							console.log(data);
					},
					error: function (xhr, ajaxOptions, thrownError) {
							var errorMsg = 'Ajax request failed: ' + xhr.responseText;
							//$('#content').html(errorMsg);
						  }
				});
				
			}
        </script>
<?php } ?>

<div class="container">
	<div class="row">
		<div>
            <div class="card hovercard">
                <div class="cardheader">
					
                </div>
                <div class="avatar">
                    <img alt="" id="image1"/>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" id="name"></a>
                    </div>
                </div>
                <div class="bottom">           
                </div>
            </div>
        </div>

	</div>
	<div class="row" >
		<div>

            <div class="card hovercard">
                <div class="info">
                    <div class="title">
						<h3>Google drive files</h3>
                    </div>
					
					 <ul id="gamelist"></ul>
                </div>
                <div class="bottom">
                   
                </div>
            </div>

        </div>
</div>

