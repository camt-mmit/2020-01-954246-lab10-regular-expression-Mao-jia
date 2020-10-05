<?php
/**
     * ID:602110189
     * Name: Mao Jia
     * WeChat: Ga
     */
$fp=fopen($_SERVER['argv'][1],"r");
$datas=[];
fscanf($fp,"%d",$n);
for($i=0;$i<$n;$i++){
    $data=trim(fgets($fp));
    $datas[]=$data;
}
fclose($fp);

$yes=[];$no=[];
for($i=0;$i<$n;$i++){
    if(preg_match("/(?=(.*[A-Z]){2,})(?=(.*\d){2,})(?=(.*[\$@&]){2,})(?!.*[ ])\S{8,}/", $datas[$i])) {
        $yes[]=$datas[$i];} 
    else {$no[]=$datas[$i];}
}

printf("Satisfied:\n");
foreach($yes as $yes){
    printf("    %s\n",$yes);
}
printf("Non-satisfied:\n");
foreach($no as $no){
    printf("    %s\n",$no);
}

