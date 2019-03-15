<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Объявления';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="ads-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Добавить объявление', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
    <ul>
        <?php foreach ($ads as $ad){ ?>

        <div  class="ad">

                <h4>Объявление №<?=$ad->number?>. <?=$ad->title?></h4>
                <hr />
                <table class="ad_info">
                    <tr>
                        <td>
                            <p>Автор: <?= app\models\Users::findone($ad->user_id)->fullname?> &nbsp;&nbsp;&nbsp;</p>
                        </td>
                        <td>
                            <p><?=$ad->date?></p>
                        </td>
                        <td class = "center">
                            <p> &nbsp;&nbsp;&nbsp;  <?=$ad->hits?>   </p>

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
    </ul>
    </p>

    <br />
    <hr />
    <div id="pages">

        <?= LinkPager::widget([
                'pagination' => $pagination,
                'firstPageLabel' => 'В начало',
                'lastPageLabel' => 'В конец',
                'prevPageLabel' => '&laquo;'
            ]) ?>
        <span>Страница <?=$active_page?> из <?=$count_pages?></span>
        <div class="clear"></div>
    </div>
