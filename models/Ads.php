<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "ads".
 *
 * @property int $id
 * @property int $is_release
 * @property string $title
 * @property string $intro_text
 * @property string $full_text
 * @property int $date
 * @property int $hits
 * @property int $user_id
 * @property int $sum
 */
class Ads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $number;
    public $link;

    public static function tableName()
    {
        return 'ads';
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'intro_text', 'full_text', 'date', 'user_id'], 'required'],
            [['is_release', 'date', 'hits', 'user_id', 'sum'], 'integer'],
            [['intro_text', 'full_text'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_release' => 'Опубликовано',
            'title' => 'Заголовок',
            'intro_text' => 'Краткий текст',
            'full_text' => 'Полный текст',
            'date' => 'Дата публикации',
            'hits' => 'Количество просмотров',
            'user_id' => 'ID пользователя',
            'sum' => 'Сумма объявления',
        ];
    }

    public function afterFind()
    {
       $monthes = [
           1=>'Января', 2=>'Февраля', 3=>'Марта', 4=>'Апреля', 5=>'Мая', 6=>'Июня',7=>'Июля',8=>'Августа', 9=>'Сентября', 10=>'Октября', 11=>'Ноября', 12=>'Декабря'
       ];
        $this->date = date('j ', $this->date).$monthes[date('n', $this->date)].date(', Y, ', $this->date). date('H:i', $this->date);

        $this->link = Yii::$app->urlManager->createUrl(["ads/view", "id" =>$this->id]);
    }

    public static function setNumbers($ads)
    {
        $all_ads = Ads::find()->orderBy("date")->all();
        $number = 1;
        foreach ($all_ads as $all_ad) {
            foreach ($ads as $ad) {
                if ($ad->id == $all_ad->id) $ad->number = $number;
            }
            $number++;
        }

    }
}
