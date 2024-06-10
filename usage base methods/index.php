<?php
function Read($filename) : void
{
    $content = file_get_contents($filename);
    $line = explode(PHP_EOL, $content);
    foreach($line as $lineItem){
        $decode = json_decode($lineItem, true);
        Write($decode);
    }
}
function Write($decode) : void
{
    if (isset($decode['name']) && isset($decode['uid'])){
        $file = $decode['uid'].' '.$decode['name'];
        file_put_contents("users/$file.txt", json_encode($decode));
    };
}
Read("firstacc.txt");