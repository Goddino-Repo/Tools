<?php
$files = array_diff(scandir("./"), ['.', '..', '.git', '.gitignore', '.idea']);
$filenames = [];
foreach($files as $filename) {
	if (!strpos($filename, '.'))
		continue;
	array_push($filenames, $filename);
}
foreach($filenames as $filename) {
	if(strpos($filename, '.ud2'))
		$new_filename = str_replace('.ud2', '.ud3', $filename);
	elseif(strpos($filename, '.undead2'))
		$new_filename = str_replace('.undead2', '.undead3', $filename);
	else
		continue;
	shell_exec("mv $filename $new_filename");
	echo "Renamed [$filename] -> [$new_filename]" . PHP_EOL;
}