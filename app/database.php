<?php

defined("IT_CAT_CMS_RUNNING") or die();

interface DataBase
{
	const ORDER_ASC = "ASC";
	const ORDER_DESC = "DESC";
	public function select($table, $params = array());
}

class SQLiteDateBase implements DataBase
{
	private $base_id;
	public function __construct()
	{
		$this->base_id = sqlite_open(":memory:");
	}
	public function __destruct()
	{
		sqlite_close($this->base_id);
	}
	public function select($table, $params = array())
	{
		$table = sqlite_escape_string($table);

		if(isset($params['columns']))
		{
			foreach($params['columns'] as &$col)
			$col = sprintf("`%s`", sqlite_escape_string($col));
			$columns = implode(", ", $params['columns']);
		}
		else $columns = "*";

		$request = "SELECT $columns FROM `$table`";

		// TODO: реаализовать WHERE

		if(isset($params['order']))
		{
			$request .= sprintf(" ORDER BY `%s`", sqlite_escape_string($params['order']));
			if(isset($params['order_direction']))
				if($params['order_direction'] === self::ORDER_ASC)
					$request .= " ASC";
				else if($params['order_direction'] === self::ORDER_DESC)
					$request .= " DESC";
		}
		
		if(isset($params['count']))
		{
			if(isset($params['start']))
				$request .= sprintf(" LIMIT %d, %d", $params['start'], $params['count']);
			else $request .= sprintf(" LIMIT %d", $params['count']);
		}

		$result = sqlite_query($this->base_id, $request);
		return (object) sqlite_fetch_array($result);
	}
}
