<?php
/**
* 
*/
class CreateAction extends \yii\base\Action
{
	public $view = 'create';
	
	public function run()
	{
		$model = new Node();
		$type = \Yii::$app->request->get('type');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
		
	}
}