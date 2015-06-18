<?php
namespace app\core\record;

/**
* 
*/
class Page extends Node
{
	const TYPE = 'page';
	
	public static function find() {
		return new NodeQuery(get_called_class(),['where'=>['type'=>self::TYPE]]);
	}

	public function beforeSave($insert) {
		$this->type= self::TYPE;
		return parent::beforeSave($insert);
	}
}