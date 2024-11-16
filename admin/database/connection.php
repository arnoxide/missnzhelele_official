<?php

// $environment = 'server'; // Change this to 'server' when deploying to the production server
$environment = 'local'; // Change this to 'server' when deploying to the production server
if ($environment === 'local') {
    require('config_local.php');
} else {
    require('config_server.php');
}

?>
 