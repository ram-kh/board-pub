<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */

$this->title = 'Объявления';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="ads-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php if(!Yii::$app->user->isGuest) { echo Html::a('Добавить объявление', ['create'], ['class' => 'btn btn-success']); } ; ?>
    </p>

    <p>

        <?php foreach ($ads as $ad){ ?>

        <div  class="ad">
            <hr>
                <h4><?= Html::a('Объявление №'.$ad->number, ['ads/view', 'id' => $ad->id]);?><?='. '.$ad->title;?></h4>

                <table class="ad_info">
                    <tr>
                        <td>
                            <p>Автор: <?= $ad->user->fullname ?> &nbsp;&nbsp;&nbsp;</p>
                        </td>
                        <td>
                            <p>Дата: <?=$ad->date?></p>
                        </td>
                        <td class = "center">
                            <p> &nbsp; Кол-во просмотров: <?=$ad->hits?>   </p>

                        </td>
                    </tr>
                </table>
                <div class="ad_text">
                    <p><?=$ad->intro_text?></p>
                </div>
                <div class="clear"></div>
                <p><a href="<?=$ad->link?>">Читать полностью</a></p>
        </div>
        <?php }?>

    </p>

    <br />
    <hr />
    <div>
        <?= LinkPager::widget([
                'pagination' => $pagination,
                'firstPageLabel' => 'В начало',
                'lastPageLabel' => 'В конец',
                'prevPageLabel' => '&laquo;'
            ]) ?>
        <span>Страница <?=$active_page?> из <?=$count_pages?></span>
        <div class="clear"></div>
    </div>
