<?php
session_start();

if (isset($_SESSION["user"])) {
    echo "<p>Welcome back, " . $_SESSION["user"] . "!<br/>";
    echo '<a href="process.php?action=logout">Logout</a></p>';
	?>
	
	<?php
    } else {
?>
<?php
    }
?>