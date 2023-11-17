<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\i18n\Formatter;

// Регистрация CSS файла
$this->registerCssFile('@web/css/user.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);

// $this->title = 'Авторизация';
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
                    <h1>Главная</h1>
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
            <div class="main-row">
                <div class="welcome-blck">
                    <div class="welcome-txt">
                        <p class="date"><?= date('j F Y') ?></p>
                        <div class="welcome-dscrptn">
                            <p class="welcome-name">Добро пожаловать, <?= Yii::$app->user->identity->first_name ?>!</p>
                            <p>Отмечайте прохождение игр в нашем приложении</p>
                        </div>
                    </div>
                    <div class="welcome-man"></div>
                </div>
            </div>
            <div class="down-row">
                <div class="blck-list-of-games">
                    <div class="l-clmn">
                        <p>Список игр<br>для прохождения</p>
                        <?php
                            echo Html::a('Посмотреть', ['/site/list'], ['class' => 'btn  check-page']);
                        ?>
                    </div>
                    <div class="r-clmn">
                        <div class="r-clmn-bckgrnd"></div>
                    </div>
                </div>
                <div class="blck-list-of-games">
                    <div class="r-clmn">
                        <div class="r-clmn-bckgrnd2"></div>
                    </div>
                    <div class="l-clmn2">
                        <p>Статистика<br>прохождения</p>
                        <?php
                            echo Html::a('Посмотреть', ['/site/statistic'], ['class' => 'btn  check-page']);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>