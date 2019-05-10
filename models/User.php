<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use app\models\Ads;


/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $fullname
 * @property string $phone
 * @property int $last_login
 * @property string $password write-only password
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_VALIDATION = 5;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    public function getAds()
    {
        return $this->hasMany(Ads::className(), ['user_id' => 'id']);
    }
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
          TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
 /*           [['username', 'auth_key', 'password_hash', 'status', 'email', 'created_at', 'updated_at', 'fullname', 'last_login'], 'required'],
            [['status', 'created_at', 'updated_at', 'last_login'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'fullname'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 30],
            [['username'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['email'], 'unique'],    */
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED, self::STATUS_VALIDATION]],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" не осуществляется');
    }

    /**
     * Поиск пользователя по полю username
     *
     * @param string $username
     * @param static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);

    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }



    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Проверка пароля
     *
     * @param string $password пароль для проверки
     * @return bool возвращает истину, если пароль верен для текущего пользователя
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }


    public static function findByPasswordResetToken($token)
    {

        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function isPasswordResetTokenValid($token)
    {

        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя пользователя (логин)',
            'auth_key' => 'Ключ аутентификации',
            'password_hash' => 'Хэш пароля',
            'password_reset_token' => 'Токен для сброса пароля',
            'email' => 'Email',
            'status' => 'Статус',
            'created_at' => 'Дата создания пользователя',
            'updated_at' => 'Дата обновления профиля',
            'fullname' => 'Полное имя',
            'phone' => 'Телефон',
            'last_login' => 'Последний вход',
        ];
    }

    public function getFullname()
    {
        return ($this->fullname) ? $this->fullname : $this->getId();
    }

    public function getAdsCount()
    {
        return $this->getAds()->count();
    }
}
