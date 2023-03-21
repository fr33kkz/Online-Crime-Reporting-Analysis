<?php
// Make sure recordings folder exists
##if(!is_dir("recordings")){
    ##$res = mkdir("recordings",0777);
##}
error_reporting(E_ALL ^ E_WARNING);
$time = date("d-m-Y")."-".time();
$filename = "audio-".$time.".mp3";
move_uploaded_file($_FILES['file']['tmp_name'], $filename);
?>
