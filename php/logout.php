// task_manager/php/logout.php
<?php
session_start();
session_destroy();
echo "Logged out";
?>
