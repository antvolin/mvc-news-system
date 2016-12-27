<?php
class Tag extends Entity
{
	protected $tag_id;
	protected $name;

	public function getTableName()
	{
		return "tag";
	}
}
