<?php
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 5/9/18
 * Time: 5:42 PM
 */
define('HOSTNAME','localhost');
define('USERNAME','root');
define('PASSWORD','');
define('DATABASE','naod_moses_co_ltd');
$db_conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
if(!$db_conn){
    echo mysqli_error($db_conn);
}
?>