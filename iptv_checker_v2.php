<?php
$m3u8_for_check="list.m3u8";
$timeoutsec=3;

$m3u8='';
$alarr=array();

$igood=0;
$ibad=0;

foreach (explode(PHP_EOL, file_get_contents($m3u8_for_check)) as $line) { $alarr[]=$line;

if (($line[0]=="#") or ($line[0]=="")) continue;

$ress=shell_exec("/usr/bin/timeout {$timeoutsec} /usr/bin/ffprobe -i \"". trim($line) . '" -v quiet -print_format json -show_streams -show_format');

if (strpos($ress,'streams')>1){
	++$igood;
	echo "++GOOD {$igood} = ".$line."\n";

	$m3u8='';
	foreach ($alarr as $line) $m3u8.=$line.PHP_EOL;
	file_put_contents($m3u8_for_check."_good.m3u8","".$m3u8);
	
	} else {
	++$ibad;
	echo "--BAD {$ibad} = ".$line."\n"; 
	$alarr=array_splice($alarr, 0,-2);
	}
}

//print_r($alarr);




?>
