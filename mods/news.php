<?php

defined("IT_CAT_CMS_RUNNING") or die();

class NewsData extends DataModel
{
	public $news_list = array();
}

class NewsElement
{
	// FIXME: может быть изменить названия полей на более информативные?
	/*
	public var $header;		// заголовок новости
	public var $text;		// текст новости
	public var $datetime;	// дата публикации
	public var $author;		// кто добавил
	*/
	public function __construct($h, $t, $d, $a)
	{
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
		$reault->news_list[] = new NewsElement("Новость 1", "Текст новости", 0, 1);
		return $result;
	}
}
