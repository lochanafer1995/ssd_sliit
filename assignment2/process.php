<?php
//The code for : process.php
//session_start();
$token = $_GET["code"];
if (isset($token))
{ ?>
	<script src="https://localhost/ssd_sliit/assignment2/node_modules/jquery/dist/jquery.min.js"></script>
        <script>
        //When the page has loaded.
        $( document ).ready(function(){
            //Perform Ajax request.
            $.ajax({
                url: 'https://graph.facebook.com/oauth/access_token',
                type: 'post',
				header : 'Authorization: Basic MjA4MjAyMDMyODQ5ODc1NjpjNTZkNTVlNTE0MDEyMWMzY2Q5NGZlMDgxMWFiNmI0Mw==',
				data: { 
					'grant_type': 'authorization_code',
					'redirect_uri': 'https%3A%2F%2Flocalhost%2Fssd_sliit%2Fassignment2%2Fprocess.php',
					'client_id':'2082020328498756',
					'code': '<?php echo $_GET["code"]; ?>'
				},
                success: function(data){
                    console.log(data);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    var errorMsg = 'Ajax request failed: ' + xhr.responseText;
                    //$('#content').html(errorMsg);
                  }
            });
        });
		
        </script>
<?php
}

?>
<!--<input type="text" name="user" value="<?php //echo $_GET["code"]; ?>"/> -->