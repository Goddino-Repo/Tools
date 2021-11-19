<?php

    /**
     * @author Lorenzo Pellegrini
     * This script convert all files names into the current directory to lowercase
     */
    $path = "./";
    $files = array_diff(scandir($path), array('.', '..'));
    foreach($files as $file) {
        $new_name = strtolower($file);
		if($file == $new_name) {
			echo "$file is already lowercase, skipping it..." . PHP_EOL;
			continue;
		}
        shell_exec("mv {$file} {$file}.old");
        shell_exec("mv {$file}.old {$new_name}");
        echo "renamed {$file} -> {$new_name}" . PHP_EOL;
    }
	echo PHP_EOL . "All files renamed successfully" . PHP_EOL;
?>