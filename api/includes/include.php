<?php


require __DIR__ . '/config.php';

require_once '../modal/db.class.php';
//require_once DOCUMENT_ROOT . 'html/lang/en.php';
//$lang = new en();
$db = new db(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
//define the table name
$sql = "SELECT TABLE_NAME FROM information_schema.`TABLES` WHERE TABLE_TYPE LIKE 'BASE TABLE' AND TABLE_SCHEMA LIKE '" . DB_DATABASE . "'";
$results = $db->rawQuery($sql);
//print_r($results);
foreach ($results as $key => $val) {
    extract($val);
    $table_name = explode(DB_PREFIX, $TABLE_NAME);
    
    define(strtoupper('tbl_' . $table_name[1]), $TABLE_NAME);
}

?>
