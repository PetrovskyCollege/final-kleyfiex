<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

// Регистрация CSS файла
$this->registerCssFile('@web/css/main.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);
$this->registerCssFile('@web/css/layout.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);
$this->registerCssFile('@web/css/login.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);


// $this->title = 'Авторизация';
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?= Html::encode($this->title) ?></title>
    <?php $this->head();?>
</head>
<body>
<div class="site-login">
    <h1>Авторизация</h1>

    <p class="desc-h1">Войдите в аккаунт используя электронную почту</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'input-txt'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control input-style'],
                    'errorOptions' => ['class' => 'col-lg-10 invalid-feedback error-input'],
                ],
                'validateOnBlur' => false, // Включаем валидацию при потере фокуса
            ]); ?>

            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Введите вашу почту'])->Label('Электронная почта') ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Введите пароль'])->Label('Пароль') ?>


            <div class="form-group">
                <div>
                    <?= Html::submitButton('Войти', ['class' => 'btn-submit', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
            <div class="after-btn">
            <div class="no-reg-div">
                <p>Еще нет аккаунта?</p> <?= Html::a('Регистрация', Url::to(['site/signup']), ['class' => 'reg-href']) ?>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>