<?php
/**
 * Created by PhpStorm.
 * User: Рамиль
 * Date: 19.03.2019
 * Time: 23:20
 */

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $fullname;
    public $phone;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такой логин уже существует.'],
            ['username', 'string', 'min' => 3, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такой email уже существует.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['fullname', 'trim'],
            ['fullname', 'required'],
            ['fullname', 'string', 'min' => 5, 'max' => 255],
            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'string', 'min' => 5, 'max' => 30],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->fullname = $this->fullname;
        $user->phone = $this->phone;
        $user->last_login = time();

        return $user->save() ? $user : null;
    }

}