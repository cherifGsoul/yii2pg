<?php

namespace app\manager;

use Yii;

class Manager extends \yii\base\Module
{
    public $controllerNamespace = 'app\manager\controllers';

    public function init()
    {
        parent::init();
        Yii::configure($this, require(__DIR__ . '/config.php'));
    }

    // public function beforeAction($action)
    // {
    // 	$user=Yii::$app->user;

    //     if (parent::beforeAction($action)) {
	   //      if(!$user->identity instanceof IdentityInterface) {
	   //      	$user->loginRequired();
	   //      } else {
				// return true;
	   //      }
    //     } else {
    // 		return false;
    //     }

     
    // }
}
