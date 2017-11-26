<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
      public $nombres;
    public $apellidos;
   // public $cedula;
    public $telefono;
    public $username;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['nombres', 'trim'],
            ['nombres', 'required'],
            
            ['nombres', 'string', 'min' => 2, 'max' => 255],

            ['apellidos', 'trim'],
            ['apellidos', 'required'],
            ['apellidos', 'string', 'min' => 2, 'max' => 255],

           /* ['cedula', 'trim'],
            ['cedula', 'required'],
            ['cedula', 'unique', 'targetClass' => '\common\models\User', 'message' => 'La cedula ha sido registrada en otro registro.'],
            ['cedula', 'integer'],*/

            ['telefono', 'trim'],
            ['telefono', 'required'],
            ['telefono', 'integer'],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
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
        $user->nombres = $this->nombres;
        $user->apellidos = $this->apellidos;
       // $user->cedula = $this->cedula;
        $user->telefono = $this->telefono;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
