<?php

namespace app\manager\controllers;

class NodeController extends \yii\web\Controller
{

	public function behaviors()
	{
		return [
			'nodeType'=>[
				'class'=>'app\core\filters\NodeTypeFilter',
				'only'=>['create','index']
			]
		];
	}

	public function actions()
	{
		return [
			'index'=>'app\core\node\actions\IndexAction',
			'create'=>'app\core\node\actions\CreateAction',
			'view'=>'app\core\node\actions\ViewAction',
			'update'=>'app\core\node\actions\UpdateAction',
			'delete'=>'app\core\node\actions\DeleteAction'
		];
	}
}
