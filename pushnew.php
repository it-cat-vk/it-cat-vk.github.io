<?php
include("header.dat");
$n = sizeof(load("news")) + 1;

$fh = fopen("news/n".$n.".dat", "w");
if(!fh)
	exit;

$subj = $_GET["subject"];
$text = $_GET["text"];

fwrite($fh, "<?php
	\$nd[] = false;
	\$nt[] = ".time().";
	\$na[] = \"".$id."\";
	\$ns[] = \"".$subj."\";
	\$ntext[] = \"".$text."\";
?>");
fclose($fh);
header("Location: /?page=".$page);
exit;
?>