<?php
$data = $_POST['data'];

$today = date("Y-m-d H:i:s");	//timestamp of this reception
$record = $today . ",  " . $data."\n";

$file = "sound.log";	//specify the file name
	if(file_exists($file))
		$fp = fopen($file, "a");	//open file in appanding mode
	else
		$fp = fopen($file, "w");	//open file in wrting mode
	fwrite($fp, $record);			//write the record to the file
	fclose($fp);
?>