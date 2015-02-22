<?php

defined("IT_CAT_CMS_RUNNING") or die();

class NewsData extends DataModel
{
	public $news_list = array();
	public function show_content()
	{
		// FIXME: исправить зависимость
		include("template/news.php");
	}
}

class NewsElement
{
	public function __construct($h, $t, $d, $a)
	{
		// FIXME: может быть изменить названия полей на более информативные?
		$this->header = $h;
		$this->text = $t;
		$this->datetime = $d;
		$this->author = $a;
	}
}

class Module
{
	public function get_data()
	{
		// заглушка
		$result = new NewsData();
		$result->title = "Новости";
		$result->news_list[] = new NewsElement("Новость 1", "Текст новости", 0, 1);
		return $result;
	}
}
