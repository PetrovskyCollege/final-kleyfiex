<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\Game;
use app\models\UserGame;
use yii\web\NotFoundHttpException;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/main']);
        }
    
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            // Сохраняем атрибуты модели во флэш-сообщении
            Yii::$app->session->setFlash('loginFormAttributes', $model->attributes);

            // Получаем роль текущего пользователя
            $userRole = Yii::$app->user->identity->role_id;

            // Определяем, куда перенаправить пользователя
            if ($userRole == 1) {
                return $this->redirect(['site/main']);
            } elseif ($userRole == 2) {
                return $this->redirect(['site/admin-panel']);
            } else {
                //....
            }
        } 
        
        // Восстанавливаем атрибуты модели из флэш-сообщения
        $model->attributes = Yii::$app->session->getFlash('loginFormAttributes', []);
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
    }

    public function actionAddToMyGames($gameId)
    {
        // Получаем текущего пользователя
    $userId = Yii::$app->user->identity->id;

    // Проверяем, существует ли игра с указанным $gameId
    $game = Game::findOne($gameId);
    if (!$game) {
        throw new NotFoundHttpException('Игра не найдена');
    }

    // Проверяем, не добавлена ли уже эта игра в "Мои игры" пользователя
    $userGame = UserGame::findOne(['user_id' => $userId, 'game_id' => $gameId]);
    if ($userGame) {
        // Если игра уже добавлена, можно выполнить какие-то дополнительные действия или просто вернуться
        Yii::$app->session->setFlash('error', 'Игра уже добавлена в ваши игры.');
        return $this->render('list', [
            'id' => $gameId,
        ]);
    }

    // Создаем новую запись в таблице user_game
    $userGame = new UserGame([
        'user_id' => $userId,
        'game_id' => $gameId,
        'status' => 'В процессе', 
        'completion_percentage' => 0.00,  
    ]);

    // Сохраняем запись
    if ($userGame->save()) {
        Yii::$app->session->setFlash('success', 'Игра добавлена в "Мои игры".');
    } else {
        Yii::$app->session->setFlash('error', 'Не удалось добавить игру в "Мои игры".');
    }

    // Перенаправляем пользователя на страницу с деталями игры или куда вам нужно
    return $this->redirect(['site/my-games', 'id' => $gameId]);
    }

    public function actionMain()
    {
        return $this->render('main');
    }

    public function actionAdminPanel()
    {
        return $this->render('admin-panel');
    }

    public function actionMyGames()
    {
        return $this->render('my-games');
    }

    public function actionList()
    {
        return $this->render('list');
    }

    public function actionMainPageAdmin()
    {
        return $this->render('main-page-admin');
    }

    public function actionWishlist()
    {
        return $this->render('wishlist');
    }

    public function actionAddGame()
    {
        return $this->render('add-game');
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }

    public function actionStatistic()
    {
        return $this->render('statistic');
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionSignup()
    {
        $model = new SignupForm();
 
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->redirect(['site/main']);
                }
            }
        }
 
        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
