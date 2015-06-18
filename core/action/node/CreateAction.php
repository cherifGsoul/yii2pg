<?php
	namespace app\core\actions\node;
	
	use Yii;
	use yii\base\Action;
	
	class CreateAction extends Action {
		
		public $view;
		
		public function init() {
			
		}
		
		public function run() {
			$model = new app\core\records\Node();

		    if ($model->load(Yii::$app->request->post())) {
		        if ($model->validate()) {
		            // form inputs are valid, do something here
		            return;
		        }
		    }

		    return $this->render($this->view, [
		        'model' => $model,
		    ]);
		}
	}