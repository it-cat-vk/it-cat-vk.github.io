<?php

defined("IT_CAT_CMS_RUNNING") or die();

class Module
{
	public function get_data()
	{
		return array(
				'title'	=> "Новости",
				'data'		=> array(
						array(
								'header'	=> "Новость 1",
								'text'		=> "Текст новости",
								'datetime'	=> 0,
								'author'	=> 1,
						),
				),
		);
	}
}
