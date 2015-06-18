<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\core\record\Node */

$this->title = Yii::t('juva', 'Create Node');
$this->params['breadcrumbs'][] = ['label' => Yii::t('juva', 'Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
