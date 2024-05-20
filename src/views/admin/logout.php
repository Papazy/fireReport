<?php

include_once(__DIR__ .'/../components/config.php');
session_unset();
session_destroy();
echo "<script>window.location.href='/'</script>";
