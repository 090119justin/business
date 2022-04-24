<?php
//echo $_REQUEST['data'];
$json_arr=json_decode($_GET['data'],true);
//print_r($json_arr['info']);

foreach($json_arr['info'][0] as $key => $value) {
    for($i=1; $i <= intval($value['count']); $i++) {
        echo "</div>".$value['td'.$i]."</div>";
    }
}

?>