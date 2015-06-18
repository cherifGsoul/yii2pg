<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\core\record\Node */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('juva', 'Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('juva', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('juva', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('juva', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'guid',
            'title',
            'content:ntext',
            'excerpt:ntext',
            'type',
            'slug',
            'root',
            'lft',
            'rgt',
            'level',
            'mime_type',
            'menu_order',
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'comment_count',
        ],
    ]) ?>

</div>
