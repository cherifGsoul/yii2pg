<?php
namespace app\core\node\actions;

use app\core\node\record\Node;

class Action extends \yii\base\Action
{

	protected function findModel($id) 
	{
		if (($model = Node::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
	}

}