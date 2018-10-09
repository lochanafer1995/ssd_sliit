<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="jquery-1.11.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<link href="form.css" rel="stylesheet" id="bootstrap-css">
<link href="font-awesome.min.css" rel="stylesheet">


<html>
 <body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall" style="margin-top: 50%;">
			<img class="profile-img" src="logo.png"
                    alt="">
                <form class="form-signin" action="https://accounts.google.com/o/oauth2/v2/auth?client_id=502184323359-o0a2086o2igadevkekqac7m3gq5l6j71.apps.googleusercontent.com&response_type=code&scope=https://www.googleapis.com/auth/drive https://www.googleapis.com/auth/drive.metadata.readonly https://www.googleapis.com/auth/plus.me&redirect_uri=http://localhost/ssd_sliit/assignment2/process.php&access_type=offline" method="post">
					<button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: #f44b42;">
						Sign in with Google Account
					</button>
                </form>
            </div>
        </div>
    </div>
</div>
 </body>
</html>

