<?php
session_start();
echo "logging you out. Please wait for a momment...";
session_destroy();
header("location: /forum");
?>