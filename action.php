<?php

// Prepare environment

include("header.dat");

$target = $_GET["target"];

$names = array();
$data  = array();

switch($target)
{
	case "news":
		$subj = $_GET["subject"];
		$text = $_GET["text"];
		$names = array("nd", "nt", "na", "ns", "ntext");
		$data  = array("false", time(), $id, '"'.$subj.'"', '"'.$text.'"');
		break;
	case "profiles":
		// Check fields for bad characters
		$login    = $_POST["login"];
		$password = $_POST["password"];
		$nickname = $_POST["nickname"];
		if(empty($nickname))
		{
			$nickname == $login;
		}
		// Do the check here
		$phash = password_hash($password, PASSWORD_DEFAULT);
		$names = array("login", "nickname", "phash");
		$data  = array('"'.$login.'"', '"'.$nickname.'"', '"'.$phash.'"');
		break;
	//case "messages":
	default:
		exit;
}

// Write data to the file

$n = sizeof(load($target)) + 1;

if(!is_dir($target))
	mkdir($target);

$fh = fopen($target."/".$target[0].$n.".dat", "w");
if(!$fh)
	exit;

$n = sizeof($data);
fwrite($fh, "<?php");
for($i = 0; $i < $n; ++$i)
{
	fwrite($fh, "
	$".$names[$i]."=".$data[$i].";");
}
fwrite($fh, "
?>");
fclose($fh);
header("Location: /?page=".$page);
exit;
?>