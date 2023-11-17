<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Genre $model */

$this->title = $model->name;
$this->registerCssFile('@web/css/user.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);
$this->registerCssFile('@web/css/admin.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);
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
                    <h1>Категория <?= Html::encode($this->title) ?></h1>
                </div>
                <div class="account-view">
                    <div class="before-exit">
                        <div class="acc-avatar"></div>
                        <div class="acc-name">
                            <p>Администратор</p>
                            <?= Html::a('Профиль - ' . Yii::$app->user->identity->username, ['/site/admin-panel'], ['class' => 'link-to-profile']) ?>
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
            <div class="user-view">

    

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'custom-detail-view'],
        'attributes' => [
            'id',
            'name',
            'created_at',
            'updated_at',
        ],
    ]) ?>

<p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
</div>
        </div>
    </div>
</div>
</body>
</html>