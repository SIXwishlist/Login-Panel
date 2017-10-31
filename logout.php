<?php
/**
 * Created by PhpStorm.
 * User: shawo
 * Date: 10/31/2017
 * Time: 2:42 PM
 */
session_start();
session_destroy();

header("Location: index.php?success=2");