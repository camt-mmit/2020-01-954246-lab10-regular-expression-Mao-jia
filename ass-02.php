<?php
/**
     * ID:602110189
     * Name: Mao Jia
     * WeChat: Ga
     */
$fp=fopen($_SERVER['argv'][1],"r");
$datas=[];
$pattern=array('/\s+/','/\//');
while(! feof($fp)){
    $data=preg_split('/(\s+)|(\/)/',trim(fgets($fp)),$n);
    $datas[]=$data;
}

fclose($fp);

$pattern='/(^\d+$)|(^\d+\.\d+$)|(^\d+\.$)|(^\d+\,$)/';
$output=[];
foreach($datas as $data){
  $output[]=preg_filter($pattern,'$0',$data);
 }

foreach($output as $key){
    foreach($key as $key){
        printf("%s\n",trim($key,".|,"));
    }
}
