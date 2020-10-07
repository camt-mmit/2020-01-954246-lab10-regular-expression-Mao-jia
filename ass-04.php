<?php
/**
     * ID:602110189
     * Name: Mao Jia
     * WeChat: Ga
     */
$fp=fopen($_SERVER['argv'][1],"r");
$datas=[];

while(! feof($fp)){
    $data=trim(fgets($fp));
    $datas[]=$data;
}

fclose($fp);
$datas=implode(" ",$datas);
/**
 * Same as the previous assignments, you cannot
 * just chek for , or . because document may contain
 * another symbols.
 * Please correct this to work with all cases.
 */
$data=preg_split('/( [a-z]+)|(\, )|(\. )/',$datas);

$output=[];
foreach($data as $data){
    if($data!="") $output[]=trim($data);
}

$pattern='/(?=.*[a-z]+)(?=.*[A-Z]+)/';
$output=preg_filter($pattern,"$0", $output);

foreach($output as $out){
    // This must be
    //if ($out!="My" and "The") printf("%s\n",$out);
    if ($out!="My" && $out!="The") printf("%s\n",$out);
}