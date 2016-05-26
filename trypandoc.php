<?php
$text = $_GET["text"];
$from = $_GET['from'];
$to = $_GET['to'];
$iptime = $_SERVER['REMOTE_ADDR'].$_SERVER['REQUEST_TIME'];
$input = "/tmp/{$iptime}.in";
file_put_contents($input, $text);
$output = "/tmp/{$iptime}.out";
$cmd = "pandoc --from $from --to $to -o {$output} $input";
file_put_contents("/tmp/{$iptime}.log", $cmd);
exec($cmd);
$d = array("name"=>"pandoc", "version"=>"1.12.2.1", "result"=> file_get_contents($output));
echo json_encode($d);
