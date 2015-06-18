<?php

namespace app\manager;

use Yii;

class Manager extends \yii\base\Module
{
    public $controllerNamespace = 'app\manager\controllers';

    public function init()
    {
        parent::init();
        $this->components=[
        	'user'=>[
        		'class'=>'yii\web\User',
        		'identityClass' => 'app\models\User',
            	'enableAutoLogin' => true,
        	],
        ];

        var_dump($this->components);exit;
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
