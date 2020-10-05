<?php
/**
     * ID:602110189
     * Name: Mao Jia
     * WeChat: Ga
     */
$fp=fopen($_SERVER['argv'][1],"r");
$datas=[];

while(! feof($fp)){
    $data=preg_split('/(\()|(\))/',trim(fgets($fp)),$n);
    $datas[]=$data;
}

fclose($fp);

$pattern='/(^[A-Z]+$)/';
$output=[];
foreach($datas as $data){
  $output[]=preg_filter($pattern,'$0',$data);
 }

 foreach($output as $key){
    foreach($key as $key){
        printf("%s\n",$key);
    }
}