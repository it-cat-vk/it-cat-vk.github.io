<?php

defined("IT_CAT_CMS_RUNNING") or die();

class Router
{
	public function __construct()
	{
		// TODO: найти альтернативу консрукции
		$this->page = isset($_GET['page']) ? $_GET['page'] : "news";
		// TODO: добавить модуль ошибок
		if(!ereg("^[[:alnum:]]+$", $this->page)) $this->page = "news";
	}
	public function get_module()
	{
		if(include("mods/" . $this->page . ".php")) return new Module();
		else throw new ImportError();
	}
}
