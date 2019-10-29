<?php  
//有些php文件由于不小心保存成了含bom头的格式而导致出现一系列的问题。以下是批量清除bom头的代码
 
   
$basedir="./en/";
$auto = 1;    
 
checkdir ( $basedir );    
 
function checkdir($basedir) {    
    if ($dh = opendir ( $basedir )) {    
        while ( ($file = readdir ( $dh )) !== false ) {    
            if ($file != '.' && $file != '..') {    
                if (! is_dir ( $basedir . "/" . $file )) { // 如果是文件    
                    echo "filename: $basedir/$file " . checkBOM ( "$basedir/$file" ) . " <br>";    
                } else {    
                    $dirname = $basedir . "/" .$file; // 如果是目录    
                    checkdir ( $dirname ); // 递归    
                }    
            }    
        }    
        closedir ( $dh );    
    }    
}    
 
function checkBOM($filename)
{
    global $auto;
    $contents = file_get_contents($filename);
    $charset [1] = substr($contents, 0, 1);
    $charset [2] = substr($contents, 1, 1);
    $charset [3] = substr($contents, 2, 1);
    //if (ord($charset [1]) == 239 && ord($charset [2]) == 187 && ord($charset [3]) == 191) { // BOM 的前三个字符的ASCII 码分别为 239 187 191
        //if ($auto == 1) {
            $rest = str_replace('$lang[\' ','$lang[\'',$contents);
            //$rest = str_replace(' "]','\']',$rest);
            rewrite($filename, $rest);return;
        //    return ("<font color=red>BOM found, automatically removed.</font>");
        //} else {
        //    return ("<font color=red>BOM found.</font>");
        //}
    //} else{
        return ("BOM Not Found.");
    //}

}    
 
function rewrite($filename, $data) {    
    $filenum = fopen ( $filename, "w" );    
    flock ( $filenum, LOCK_EX );    
    fwrite ( $filenum, $data );    
    fclose ( $filenum );    
} 