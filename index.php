<?php include("header.dat")?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>IT-КОТ</title>
		<link href="styles/normalize.css" rel="stylesheet">
		<link href="styles/header.css" rel="stylesheet">
		<link href="styles/main.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div class="logo"></div>
			<nav>
				<a href="/">Главная</a>
				<a href="/about.html">О нас</a>
				<a href="/news.html">Новости</a>
				<a href="/usable.html">Полезное</a>
				<a href="/fag.html">FAQ</a>
			</nav>
			<div class"menu-button"></div>
		</header>
		<aside>
			<a href="#" class="top-button" onclick="top()"></a>
		</aside>
		<main>
<?php echo("DEBUG: including ".$pagefile);include($pagefile); ?>
		</main>
		<footer>
			&copy; IT-кот, 2015
		</footer>
	</body>
</html>
