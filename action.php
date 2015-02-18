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
		
		// Regular checks here
		
		$names = array("nd", "nt", "na", "ns", "ntext");
		$data  = array("false", time(), $id, '"'.$subj.'"', '"'.$text.'"');
		break;
	case "profiles":
		// Check fields for bad characters
		$tl = $_GET["login"];
		$password = $_GET["password"];
		$pr = load("profiles");
		$n = sizeof($pr);
		$err = 0;
		
		// Regular checks here

		for($i = 0; $i < $n; ++$i)
		{
			if(is_file("profiles/p".$i.".dat"))
			{
				include("profiles/p".$i.".dat");
				if($tl == $login)
				{
					$err = 1;
					break;
				}
			}
		}

		if($err)
		{
			header("Location: /?page=register&err=".$err);
		}

		$login = $tl;

		// Do the check here

		$phash = password_hash($password, PASSWORD_DEFAULT);
		$names = array("login", "phash", "ban");
		$data  = array('"'.$login.'"', '"'.$phash.'"', "0");
		break;
	default:
		header("Location: /?page=main");
}

// Write data to the file

$n = sizeof(load($target)) + 1;

if(!is_dir($target))
{
	mkdir($target);
}


$fh = fopen($target."/".$target[0].($n).".dat", "w");
if(!$fh)
{
	exit;
}

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