<?php
namespace app\core\node\actions;

class ViewAction extends Action
{
	public $view= 'view';

	public function run($id)
	{
		return $this->controller->render($this->view,[
			'model' => $this->findModel($id),
		]);
	}
}