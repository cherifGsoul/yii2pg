<?php
namespace app\core\record;

/**
* 
*/
class Article extends Node
{
	const TYPE = 'article';
	
	public static function find() {
		return new NodeQuery(get_called_class(),['where'=>['type'=>self::TYPE]]);
	}

	public function beforeSave($insert) {
		$this->type= self::TYPE;
		return parent::beforeSave($insert);
	}
}