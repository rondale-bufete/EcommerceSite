<?php
session_start();

session_unset();

session_destroy();

echo "<script>
alert('LOGGED OUT');
window.open('admin_login.php', '_self');


</script>";
