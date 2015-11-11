<?php

// class Chang {
// 		function logResult($word='') {
// 			$fp = fopen("log.txt","a");
// 			flock($fp, LOCK_EX) ;
// 			fwrite($fp,"执行日期：".strftime("%Y%m%d%H%M%S",time())."\n".$word."\n");
// 			flock($fp, LOCK_UN);
// 			fclose($fp);
// 		} 

// 		function test($var) {
// 			$result = $var."haha";
// 			return $result;
// 		}
// }

function testLiu($var) {
	$result = $var."Liu";
	return $result;
}

function logResults($word='') {
	$fp = fopen("log.txt","a");
	flock($fp, LOCK_EX);
	fwrite($fp,"执行日期：".strftime("%Y%m%d%H%M%S",time())."\n".$word."\n");
	flock($fp, LOCK_UN);
	fclose($fp);
}

?>