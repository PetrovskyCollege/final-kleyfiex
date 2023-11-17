<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\User $model */
use yii\widgets\DetailView;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\i18n\Formatter;
use app\models\User;

// Регистрация CSS файла
$this->registerCssFile('@web/css/user.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);
$this->registerCssFile('@web/css/profile.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);

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
                    <h1>Мой профиль</h1>
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
            <div class="profile-block">
                    <div class="profile-up-row">
                        <div class="profile-main-info">
                            <div class="profile-avatar-blck">
                                <div class="profile-avatar">
                                    <img src="/web/img/icons/heart.svg" alt="photo" class="avatar-bck">
                                </div>
                            </div>
                            
                            
                        </div>
                        
                    </div>
                    <div class="name-blck">
                    <p>Никнейм - <?= Yii::$app->user->identity->username?></p>
                    <p>Имя - <?= Yii::$app->user->identity->first_name?></p>
                    <p>Фамилия - <?= Yii::$app->user->identity->last_name?></p>
                    <p>Почта - <?= Yii::$app->user->identity->email?></p>
                    <p>Роль - <?= Yii::$app->user->identity->role->name ?></p>
                    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>