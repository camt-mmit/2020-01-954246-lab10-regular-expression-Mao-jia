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

/**
 * This pattern seem OK but how did you know there are
 * only . or , or / in your document, it may be contain : or ?.
 * You cannot deal with all of symbols without meta-character.
 * In this case, word boundary assertion \b can help.
 * Change your pattern to '/\b(\d+)|(\d+\.\d+)\b/' or
 * '/\b\d+(\.\d+)?\b/' for shorter.
 */
//$pattern='/(^\d+$)|(^\d+\.\d+$)|(^\d+\.$)|(^\d+\,$)/';
$pattern='/\b\d+(\.\d+)?\b/';
$output=[];
foreach($datas as $data){
  $output[]=preg_filter($pattern,'$0',$data);
 }

foreach($output as $key){
    foreach($key as $key){
        printf("%s\n",trim($key,".|,"));
    }
}
