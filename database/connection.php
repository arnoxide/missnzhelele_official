<?php

$environment = 'local'; // Change this to 'server' when deploying to the production server
if ($environment === 'local') {
    require('local-server.php');
} else {
    require('live-server.php');
}

?>
 