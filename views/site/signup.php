<?php
/**
 * Created by PhpStorm.
 * User: Рамиль
 * Date: 19.03.2019
 * Time: 23:26
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Для регистрации, пожалуйста, заполните следующие поля:</p>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин:') ?>
            <?= $form->field($model, 'email')->label('Email:') ?>
            <?= $form->field($model, 'password')->passwordInput()->label('Пароль:') ?>
            <?= $form->field($model, 'fullname')->textInput()->label('ФИО:') ?>
            <?= $form->field($model, 'phone')->textInput()->label('Телефон:') ?>
            <div class="form-group">
                <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>