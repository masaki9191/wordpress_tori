<?php
/*------------------------------------------------------------
 管理画面メニューを追加
------------------------------------------------------------*/
function my_admin_menu(){
	add_menu_page(
		'休日管理',
		'休日管理',
		'7', //編集者権限以上
		'../../calendar_edit/',
		'',
		'',
		9 //位置
	);
}
add_action('admin_menu','my_admin_menu');


/*////////////////////////////////////////////////////////////
   カレンダー用関数
////////////////////////////////////////////////////////////*/

//今月の最初と最後の日を返す
function thisMonth($year,$month){
	$count = date('t', mktime(0, 0, 0, $month, 1, $year));
	
	$array = array();
	for($i=1;$i <= $count;$i++){
		$date=date('Ymd', mktime(0, 0, 0, $month, ($i), $year) );
		array_push($array,$date);
	}
	
	return $array;
}

//前月日数取得
function prevDays($year,$month){
	
	$week_id = date('w', mktime(0, 0, 0, $month, 1, $year) ); //今月1日の曜日
	

	// 日曜始まり
	 if($week_id == 0){ //日曜の場合
	 	return null;
	 }else{ //それ以外
	 	$week_count = -1*$week_id+1;
	 }

	// 月曜始まり
//	if($week_id == 0){ //日曜の場合は6つ表示
//		$week_count=-5;
//	}elseif($week_id == 1){ //月曜の場合
//		return null;
//	}else{ //それ以外
//		$week_count = -1*$week_id+2;
//	}
	
	//日にちの配列を表示
	if(isset($week_count)){
		$array = array();
		for($i=$week_count;$i<=0;$i++){
			$date=date('Ymd', mktime(0, 0, 0, $month, ($i), $year) );
			array_push($array,$date);
		}
		
		return $array;
	}
}

//翌月日数取得
function nextDays($year,$month){
	
	$week_id = date('w', mktime(0, 0, 0, $month+1, 0, $year) );
	
	// 日曜始まり
	 if($week_id == 1){
	  return null;
	 }else{
	 	$week_count = 6-$week_id;
	 }

	// 月曜始まり
//	if($week_id == 0){
//	 return null;
//	}else{
//		$week_count = 7-$week_id;
//	}
	
	if(isset($week_count)){
		$array = array();
		for($i=1;$i <= $week_count;$i++){
			$date=date('Ymd', mktime(0, 0, 0, $month+1, ($i), $year) );
			array_push($array,$date);
		}
		return $array;
	}
}
?>