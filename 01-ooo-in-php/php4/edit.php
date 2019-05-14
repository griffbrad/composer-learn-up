<?php

require_once 'includes/bootstrap.php';

$_POST['first_name'] = 'Example';

$db->query( 'UPDATE fake_table SET first_name = ?', array( $_POST['first_name'] ) );

header( 'Location: /index.php' );
exit;

