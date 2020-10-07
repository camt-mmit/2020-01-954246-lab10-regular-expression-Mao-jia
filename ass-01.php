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
    /**
     * This is a great solution but I have a little suggession:
     * 
     * 1. you can improve performance of lookahead assertion by using
     *    exact quantifier, e.g. change (?=(.*[A-Z]){2,}) to (?=(.*[A-Z]){2})
     *    because we don't care the next pattern after that, we require at least 2.
     *    If you use {2,} lookahead will look of the next pattern but it will
     *    return the same result.
     * 2. For (?!.*[ ]), I think (?!.*\s) is better because it can handle other
     *    white-space, e.g. \t.
     * 3. On the last pattern, \S{8,}, I think .{8,} just enought because you
     *    already check whit-space with assertion (?!.*[ ]).
     */
    if(preg_match("/(?=(.*[A-Z]){2,})(?=(.*\d){2,})(?=(.*[\$@&]){2,})(?!.*[ ])\S{8,}/", $datas[$i])) {
        $yes[]=$datas[$i];} 
    else {$no[]=$datas[$i];}
}

printf("Satisfied:\n");
// Try to don't use the same variable name here.
// foreach($yes as $yes){
//     printf("    %s\n",$yes);
// }
// printf("Non-satisfied:\n");
// foreach($no as $no){
//     printf("    %s\n",$no);
// }
foreach($yes as $iyes){
    printf("    %s\n",$iyes);
}
printf("Non-satisfied:\n");
foreach($no as $ino){
    printf("    %s\n",$ino);
}

