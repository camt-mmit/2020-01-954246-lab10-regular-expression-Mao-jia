<?php
/**
     * ID:602110189
     * Name: Mao Jia
     * WeChat: Ga
     */
$fp=fopen($_SERVER['argv'][1],"r");
$datas=[];

/**
 * Using preg_split() seem to be a good idea but it cannot
 * handle the case of capital letters start from the begining
 * of line and follow by ( or ) for example:
 * XXX(just test)
 * In this case you will get XXX in your result.
 */
while(! feof($fp)){
    // $n is not necessary.
    //$data=preg_split('/(\()|(\))/',trim(fgets($fp)),$n);
    $data=preg_split('/(\()|(\))/',trim(fgets($fp)));
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