<?php

/** @var yii\web\View $this */
/** @var string $content */




use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use app\models\User;

AppAsset::register($this);

// Регистрация CSS файла

$this->registerCssFile('@web/css/main.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);
$this->registerCssFile('@web/css/layout.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);

$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/img/app-logo.svg')]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Html::encode($this->title ?: 'Games App') ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex">
<?php $this->beginBody() ?>
<?php
// Проверяем, не является ли текущая страница страницей входа или регистрации
$isLoginPage = Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'login';
$isSignupPage = Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'signup';

if(!$isLoginPage && !$isSignupPage) {
    $userRole = Yii::$app->user->identity->role_id;
}
?>

<?php if (!$isLoginPage && !$isSignupPage): ?>
    <?php if($userRole == 1): ?>
    <header id="header">
                <div class="logo">
                    <?= Html::img('@web/img/logo-page.svg', ['alt' => 'Logo']) ?>
                </div>
            <nav id="sidebar" class="sidebar">
                
                <?php
                
                echo Nav::widget([
                    'options' => ['class' => 'nav-head'],
                    'items' => [
                        ['label' => 'Меню', 'url' => false, 'linkOptions' => ['class' => 'h-menu'], 'options' => ['class' => 'menu-item-h']],
                        ['label' => 'Главная', 'url' => ['/site/main'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-home']],
                        ['label' => 'Мои игры', 'url' => ['/site/my-games'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-my']],
                        ['label' => 'Список игр', 'url' => ['/site/list'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-list']],
                        // ['label' => 'Желаемые игры', 'url' => ['/site/wishlist'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-wishlist']],
                        ['label' => 'Подробнее', 'url' => false, 'linkOptions' => ['class' => 'h-menu'], 'options' => ['class' => 'menu-item-h']], 
                        ['label' => 'Мой профиль', 'url' => ['/site/profile'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-profile']],
                        // ['label' => 'Статистика', 'url' => ['/site/statistic'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-statistic']],
                        Yii::$app->user->isGuest
                        ? ['label' => 'Войти', 'url' => ['/site/login']]
                        : ['label' => 'Выход', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post', 'class' => 'icon-exit'], 'options' => ['class' => 'menu-item']], 

                    ],
                ]);
                ?>
            </nav>
    </header>
    <?php endif; ?> 
    <?php if($userRole == 2): ?>
    <header id="header">
                <div class="logo">
                    <?= Html::img('@web/img/logo-page.svg', ['alt' => 'Logo']) ?>
                </div>
            <nav id="sidebar" class="sidebar">
                
                <?php
                
                echo Nav::widget([
                    'options' => ['class' => 'nav-head'],
                    'items' => [
                        ['label' => 'Меню', 'url' => false, 'linkOptions' => ['class' => 'h-menu'], 'options' => ['class' => 'menu-item-h']],
                        ['label' => 'Главная', 'url' => ['/site/admin-panel'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-home']],
                        ['label' => 'Список пользователей', 'url' => ['/user/index'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-list']],
                        ['label' => 'Список игр', 'url' => ['/game/index'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-list']],
                        // ['label' => 'Желаемые игры', 'url' => ['/site/wishlist'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-wishlist']],
                        ['label' => 'Добавить игру', 'url' => ['/game/create'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-add']],
                        ['label' => 'Добавить пользователя', 'url' => ['/user/create'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-add']],
                        ['label' => 'Список категорий', 'url' => ['/category/index'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-list']],
                        ['label' => 'Список жанров', 'url' => ['/genre/index'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-list']],
                        ['label' => 'Список разработчиков', 'url' => ['/developer/index'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-list']],
                        // ['label' => 'Статистика', 'url' => ['/site/statistic'], 'options' => ['class' => 'menu-item'], 'linkOptions' => ['class' => 'icon-statistic']],
                        Yii::$app->user->isGuest
                        ? ['label' => 'Войти', 'url' => ['/site/login']]
                        : ['label' => 'Выход', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post', 'class' => 'icon-exit'], 'options' => ['class' => 'menu-item']], 

                    ],
                ]);
                ?>
            </nav>
    </header>
    <?php endif; ?> 
    <?php endif; ?>
        <main>
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </main>
</div>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
