<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ads */
/* @var $form yii\widgets\ActiveForm */

$model->date = time();

 if ($create) {
            $model->user_id = Yii::$app->user->id;
            $model->hits = 0;
//            $model->is_release = 0;
        }

//    print_r($model);
 ?>

<div class="ads-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intro_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_text')->textarea(['cols' => 10, 'rows' => 10]) ?>

    <?= $form->field($model, 'hits')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <?= $form->field($model, 'user_id')->hiddenInput()->label( 'Автор: '.\app\models\User::findOne($model->user_id)->fullname); ?>

    <?= $form->field($model,'date')->hiddenInput()->label(false) ?>

</div>

   <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


