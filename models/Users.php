<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $phone
 * @property string $fullname
 * @property string $salt
 * @property string $password
 * @property string $email
 * @property int $status
 * @property string $regdate
 * @property string $lastlogon
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'phone', 'fullname', 'salt', 'password', 'email', 'status', 'regdate', 'lastlogon'], 'required'],
            [['status'], 'integer'],
            [['regdate', 'lastlogon'], 'safe'],
            [['username'], 'string', 'max' => 20],
            [['phone'], 'string', 'max' => 15],
            [['fullname'], 'string', 'max' => 255],
            [['salt', 'password', 'email'], 'string', 'max' => 128],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин пользователя',
            'phone' => 'Телефон',
            'fullname' => 'Полное имя',
            'salt' => 'Salt',
            'password' => 'Пароль',
            'email' => 'Email',
            'status' => 'Статус',
            'regdate' => 'Дата регистрации',
            'lastlogon' => 'Дата последнего входа',
        ];
    }
}
