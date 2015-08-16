<?PHP 
$a = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
print_r($a);
$POST = json_decode($a,true);
var_dump($POST);
?>