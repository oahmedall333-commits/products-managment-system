<?php

include (__DIR__."/../../core/config.php");
include (BASE_PATH."core/database.php");
include (BASE_PATH."core/session.php");




logout($conn);
set_message('success',"logged out successfully");
header("Location:".BASE_URL."views/auth/login.php");
exit;