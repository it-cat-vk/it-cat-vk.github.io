<?php
include("header.dat");

$pr = load("profiles");
$n = sizeof($pr);

$id = 0;
$err = 1;
$tl = $_GET["login"];

for($i = 0; $i < $n; ++$i)
{
	if(is_file("profiles/p".$i.".dat"))
	{
		include("profiles/p".$i.".dat");
		if($tl == $login)
		{
			if(password_verify($tp, $phash))
			{
				$id = $i;
			}
			else
			{
				$err = 2;
			}
			break;
		}
	}
}

if($id)
{
	header("Location: /?page=".$page);
}
else
{
	header("Location: /?page=auth&npage=".$page."&err=".$err);
}
exit;
?>