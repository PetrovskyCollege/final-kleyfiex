<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */
use app\models\Game;

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\i18n\Formatter;

use yii\bootstrap5\Alert;

$session = Yii::$app->session;
if ($session->hasFlash('danger')) {
    $dangerMessage = $session->getFlash('danger');
    echo Alert::widget([
        'options' => [
            'class' => 'alert-danger',
        ],
        'body' => $dangerMessage,
    ]);
}

// Регистрация CSS файла
$this->registerCssFile('@web/css/user.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);
$this->registerCssFile('@web/css/list.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);

// $this->title = 'Авторизация';
$Games = Game::find()->all();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <div class="main-container">
        <div class="content-container">
            <div class="up-row">
                <div class="page-head-txt">
                    <h1>Список игр</h1>
                </div>
                <div class="account-view">
                    <div class="before-exit">
                        <div class="acc-avatar"></div>
                        <div class="acc-name">
                            <p><?= Yii::$app->user->identity->first_name ?> <?= Yii::$app->user->identity->last_name ?></p>
                            <?= Html::a('Профиль - ' . Yii::$app->user->identity->username, ['/site/profile'], ['class' => 'link-to-profile']) ?>
                        </div>
                    </div>
                    <div class="acc-logout">
                    <?php
                    if (Yii::$app->user->isGuest) {
                        echo Html::a('Войти', ['/site/login'], ['class' => 'nav-link']);
                    } else {
                        echo Html::a(Html::tag('span', '', ['class' => 'icon-exit']), ['/site/logout'], ['data-method' => 'post']);
                    }
                    ?>
                    </div>
                </div>
            </div>
            
            <div class="main-blck">
                <?php foreach ($Games as $Game): ?>
                    <div class="card-game">
                        <div class="img-card">
                        <?php
                        $imagePath = $Game->image; // Путь к изображению из модели игры
                        echo Html::img(Yii::$app->urlManager->baseUrl . '/' . $imagePath, ['alt' => 'Game Image', 'class' => 'game-img']);
                        ?>
                        </div>
                        <div class="card-content">
                        <h1 class="h1"><?= Html::encode($Game->title) ?></h1>
                        <p>Жанр: <?= Html::encode($Game->genre->name) ?></p>
                        <p>Категория: <?= Html::encode($Game->category->name) ?></p>
                        <p>Разработчик: <?= Html::encode($Game->developer->name) ?></p>
                        <?= Html::a('Добавить в мои игры', ['site/add-to-my-games', 'gameId' => $Game->id], ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>