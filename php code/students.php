<?php
$db= new PDO("mysql:dbname=innoattendance;host=localhost","root","") or die("cant connect");
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
		get_by_course = $_GET['course'];
		get_by_group  = $_GET['group'];
		get_by_class  = $_GET['class'];
		get_by_subject  = $_GET['subject'];
		
}
?>