<?php
/**
 * Created by PhpStorm.
 * User: Рамиль
 * Date: 19.03.2019
 * Time: 23:54
 */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>

    Здравствуйте <?= $user->username ?>,
    Следующая ссылка позволит вам сбросить пароль:
    <?= $resetLink ?>