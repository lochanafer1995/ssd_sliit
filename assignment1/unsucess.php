<?php
session_start();

if (isset($_SESSION["user"])) {
    echo "<p>Something went wrong, CSRF Protection Enabled, !<br/>";
	?>
<?php
    }
?>