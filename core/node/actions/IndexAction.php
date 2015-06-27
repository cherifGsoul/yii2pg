<?php
namespace app\core\node\actions;

use Yii;
use app\core\node\record\Node;
use app\core\node\record\NodeSearch;

class IndexAction extends \yii\base\Action
{
	public $view= 'index';
	
	public function run($type)
	{
		$searchModel = new NodeSearch();
		
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->controller->render($this->view, [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);	
	}
}