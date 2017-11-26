<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\User;
use yii\helpers\Html;

/**
 * Site controller
 */
class SiteController extends Controller
{
   
    public function actionUser()
    {
       // $this->layout = "main";
        return $this->render("index");
    }

    public function actionAdmin()
    {
        return $this->render("admin");
    }

    /**
     * @inheritdoc
     */
    
    public function behaviors()
    {
   
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'user', 'admin'],
                'rules' => [
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => ['logout', 'admin'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserAdmin(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
                       'actions' => ['logout', 'user'],
                       //Esta propiedad establece que tiene permisos
                       'allow' => true,
                       //Usuarios autenticados, el signo ? es para invitados
                       'roles' => ['@'],
                       //Este método nos permite crear un filtro sobre la identidad del usuario
                       //y así establecer si tiene permisos o no
                       'matchCallback' => function ($rule, $action) {
                          //Llamada al método que comprueba si es un usuario simple
                          return User::isUserSimple(Yii::$app->user->identity->id);
                      },
                   ],
                ],
            ],
     //Controla el modo en que se accede a las acciones, en este ejemplo a la acción logout
     //sólo se puede acceder a través del método post
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
        
    }


    /**
     * @inheritdoc
     */
    public function actions()
    {
       
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
       return $this->render('index');
   }

    /**
     * Logs in a user.
     *
     * @return mixed
     */

    public function actionLogin()
    {
        // $this->layout='login';
          if (!\Yii::$app->user->isGuest) {
           
               if (User::isUserAdmin(Yii::$app->user->identity->id))
               {    
                
                Yii::$app->user->logout();
                
                return $this->redirect(["../peyco/backend/"]);
                
               }
               else
               {
                 //return $this->goHome();
                  return $this->redirect(["site/index"]);
               }
            }
         
            $model = new LoginForm();
               if ($model->load(Yii::$app->request->post()) && $model->login()) {
           
                    if (User::isUserAdmin(Yii::$app->user->identity->id))
                    {
               
                    Yii::$app->user->logout();
                    return $this->redirect(["../peyco/backend/"]);
                    }
                   else
                   {
                   
                    return $this->redirect(["site/index"]);
                   }
                   
                } else {
                    return $this->render('login', [
                        'model' => $model,
                    ]);
                }
        }



    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
       Yii::$app->user->logout();
           
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->redirect(["site/user"]);
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionShop()
    {
        return $this->render('shop');
    }

    public function actionProductDetails()
    {
        return $this->render('product-details');
    }

    public function actionCart()
    {

        return $this->render('cart');
        
    }

}
