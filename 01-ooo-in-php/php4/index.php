<?php

require_once 'includes/bootstrap.php';

$first_name = $db->queryOne( 'SELECT first_name FROM fake_table' );

require 'templates/layout.php';

