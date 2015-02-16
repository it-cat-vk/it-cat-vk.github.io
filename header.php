<?php

function load($path)
{
	$files = {};
	if(is_dir("pages") && $dh = opendir("pages"))
	{
		while(($fn = readdir($dh)) !== false)
		{
			$files[] = $fn;
		}
		closedir($dh);
	}
	else
	{
		echo("Error opening directory: ".$path);
		exit;
	}
	return $files;
}

$page = $_GET["page"];
$pagefie = "";
if(is_dir("pages") && $dh = opendir("pages"))
{
	while(($fn = readdir($dh)) !== false)
	{
		if($fn == $page. ".dat")
		{
			$pagefile = $fn;
		}
	}
	closedir($dh);
}
else
{
	exit;
}
if(empty($pagefile))
{
	if($page != "err404")
	{
		header("Location: /?page=err404");
	}
	echo("Error 404: not found");
	exit;
}
?>