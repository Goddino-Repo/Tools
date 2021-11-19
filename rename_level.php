<?php
if(empty($argv[1]))
    die("Usage: php $argv[0] <level>" . PHP_EOL);
$files = shell_exec('find ./ -name "*.*2" | grep -i gr2');
$files = explode("\n", $files);
unset($files[count($files)-1]); // remove the last array element, used because the last element is an empty string
foreach($files as $original_filename) {
    $file = substr($original_filename, 0, -3) . "gr2";
    preg_match('/^\.\/[^\/]*\/[^\/]*\/([^.]*)\.[gGrR]{2}2/i', $file, $name);
    $new_path = str_replace($name[1], "livello$argv[1]", $name[0]);
    shell_exec("mv $original_filename $new_path");
    echo "renamed [$original_filename] -> $new_path" . PHP_EOL;
}