<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\core\node\record\Node */

$this->title = Yii::t('juva', 'Update {modelClass}: ', [
    'modelClass' => 'Node',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('juva', 'Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('juva', 'Update');
?>
<div class="node-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
