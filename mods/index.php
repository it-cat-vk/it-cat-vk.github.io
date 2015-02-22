<?php

defined("IT_CAT_CMS_RUNNING") or die();

abstract class DataModel
{
	public $title;
	abstract public function show_content();
}
