<?php
//return json format
header('Content-Type: application/json;charset=utf-8');

include_once("config.php");
$db=mysql_connect($servername,$sqlservername,$sqlserverpws);
mysql_query("SET NAMES 'utf8'",$db);
mysql_select_db($sqlname,$db);

$lvnum = $_GET['lv'];//get ajax data 'lv'
$jarray = array();//使用array儲存結果，再以json_encode一次回傳
if($lvnum != ""){
        $query = "SELECT id,kind_name FROM kind where top= '$lvnum' and del = 0";
        $result = mysql_query($query);
        //fetch_assoc return [{},{}]
        //fetch_row return[[],[]]
        //fetch_object return[{},{}]
        //fetch_array return [{},{}]
        while ($row = mysql_fetch_assoc($result)) {
            $jarray[] = $row;        
        }
}else{
    echo 0;
    return;
}
echo json_encode($jarray);
return;

?>