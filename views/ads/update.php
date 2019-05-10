<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ads */

$this->title = 'Редактирование объявления: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Объявления', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="ads-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'create' => false,
    ]) ?>

</div>
