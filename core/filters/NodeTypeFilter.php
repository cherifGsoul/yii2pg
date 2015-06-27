<?php
namespace app\core\filters;

use Yii;


class NodeTypeFilter extends \yii\base\ActionFilter
{
	
	function beforeAction($action)
	{
		if(Yii::$app->request->get('type') == null)  {
			throw new \app\core\node\exceptions\UnknownNodeTypeException('Unknown node type');
		}

		return true;
	}
}