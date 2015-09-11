<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\base\InlineAction;
use yii\helpers\Url;
use yii\helpers\Html;
//use common\models\User;
/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            ['username', 'required', 'message' => 'Sila Isikan Nama Pengguna'],
            ['password', 'required', 'message' => 'Sila Isikan Kata Laluan'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();


            $username = $this->username; // this to get username

            $userModel = User::findOne([
                'username' => $username,
            ]);
           
            if (empty($userModel->username)) {

                Yii::$app->getSession()->setFlash('errorLoginUsername', 'Harap Maaf ! Anda Masih Belum Berdaftar. Sila Klik '.Html::a('Pendaftaran',['/user/create'],['target' => '_blank']).'');
                return $this->redirect(['site/login']);

            } elseif ($userModel->role == 0 && !empty($userModel->password_hash)) {

                 Yii::$app->getSession()->setFlash('roleEmpty', 'Akaun Anda Masih Belum Aktif,Sila Berjumpa Dengan Supervisor Yang Bertugas!');
                return $this->redirect(['site/login']);

            } elseif (empty($userModel->password_hash)) {

                Yii::$app->getSession()->setFlash('errorLogin', 'Harap Maaf ! <b>Komuniti Development System (KDS)</b> Sedang Di Perbaharui, Sila Kemaskini Kata Laluan Anda. '.Html::a('Klik Di Sini',['/user/password','id'=>base64_encode($userModel->id)]).'');
                return $this->redirect(['site/login']);

            } elseif (!$user || !$user->validatePassword($this->password)) {

                 $this->addError($attribute, 'Incorrect username or password.');
            }

            

        }
    }


    public function attributeLabels()
    {
        return [
            'username' => 'Nama Pengguna',
            'password' => 'Kata Laluan',

        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
           return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    public function redirect($url, $statusCode = 302)
    {
        return Yii::$app->getResponse()->redirect(Url::to($url), $statusCode);
    }
}
