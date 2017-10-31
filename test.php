<?php
/**
 * Created by PhpStorm.
 * User: shawo
 * Date: 10/31/2017
 * Time: 1:24 PM
 */


if ($_REQUEST) {
    $user = $_REQUEST['txtusername'];
    $pass = $_REQUEST['txtpassword'];


    print_r($user,$pass);
}