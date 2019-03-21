<?php
/**
 * Created by PhpStorm.
 * User: Рамиль
 * Date: 19.03.2019
 * Time: 23:52
 */

use yii\helpers\Html;

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>

<div class="password-reset">
    <p>Здравствуйте <?= Html::encode($user->username) ?>,</p>
    <p>Следующая ссылка позволит вам сбросить пароль:</p>
    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>