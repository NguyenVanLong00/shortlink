<?php
require_once('../_private/bundle.php');



$json = [];
class obj {
    public $name;
    public $age;
}
for($i=0;$i<10;$i++){
        $oj = new obj();
        $oj->name = "name".$i;
        $oj->age = $i;
        array_push($json,$oj);
}
header('Content-type: application/json');
echo json_encode($json);