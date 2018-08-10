<?php
session_start();
?>

	<form action="process.php?action=check" method="post">
   comment<input type="text" name="user" size="20"/>
   <input type="hidden" name="csrftoken" value="<?php echo $_COOKIE['jsession']; ?>" />
   <input type="hidden" name="sessiontoken" value="<?php echo $_COOKIE['csrf']; ?>" />
   <input type="submit" value="post"/>
	</form>

	<script src="http://localhost/ssd_sliit/assignment1/node_modules/jquery/dist/jquery.min.js"></script>
        <script>
        //When the page has loaded.
        $( document ).ready(function(){
            //Perform Ajax request.
            $.ajax({
                url: 'process.php?action=csrf',
                type: 'post',
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
