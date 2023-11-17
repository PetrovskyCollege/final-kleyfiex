<?php
 
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
    public $password_repeat;
    public $first_name;
    public $last_name;
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_repeat', 'first_name', 'last_name'], 'trim'],
            [['username', 'email', 'password', 'password_repeat', 'first_name', 'last_name'], 'required', 'message' => 'Поле обязательно для заполнения'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот username уже зарегистрирован'],
            ['username', 'string', 'min' => 2, 'max' => 255, 'tooShort' => 'Никнейм должен содержать минимум 2 символа.'],
            ['email', 'email', 'message' => 'Email имеет некорректный формат.'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот email уже зарегистрирован'],
            ['password', 'string', 'min' => 4, 'tooShort' => 'Пароль должен содержать минимум 4 символа.'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => "Пароли не совпадают"],
            ['first_name', 'string', 'max' => 255],
            ['last_name', 'string', 'max' => 255],
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
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->password = $this->password;
        return $user->save() ? $user : null;
    }
 
}