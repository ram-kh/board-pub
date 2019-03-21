<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ads */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Объявления', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ads-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Yii::$app->user->id == $model->user_id)   { ?>
            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены что хотите удалить это объявление?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php    } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
     //       'id',
            'title',
            'intro_text',
            'full_text',
            'hits',
            [
                    'label' => 'Автор:',
                    'value' => $model->user->fullname,
            ],
     //       'user_id',
            'sum',
            'date',
        ],
    ]) ?>

</div>
