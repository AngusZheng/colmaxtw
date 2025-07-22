<?php
include("config.php");  //包含文件
// 資料庫設定
$host_sql = 'localhost';
$username_sql = 'user31';
$password_sql = '123456';

// 聯結資料庫
$link = mysql_connect($host_sql, $username_sql, $password_sql) or die('無法連結資料庫');
mysql_select_db('member', $link);
mysql_query('SET NAMES UTF8');



    // 預設選項
    $data['0'] = '請選擇';

    // 只有在 parentId 與 levelNum 都存在的情況下，才進行資料庫的搜尋
    if (0 !== (int) $_GET['id'] && 0 !== (int) $_GET['lv']) {
        $parentId =  $_GET['id'];
		$kind2 = $_GET['kind2'];
		
    
        $query = "SELECT * FROM kind_name where kinds1 = '$parentld' ";
        $result = mysql_query($query, $link); 
        while ($row = mysql_fetch_assoc($result)) {
		      		
			if($row['kind_name']==$kind2)	
			//$data['0'] =	$row['kind_name'];
            // 將取得的資料放入陣列中
            $data[$row['car_num']] = $row['car_num'];
        }
		//$data[""]="請選擇";
    }
    
    // 將陣列轉換為 json 格式輸入
    echo json_encode($data);