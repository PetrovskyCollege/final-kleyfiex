<?php
 
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\SignupForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;
 
// Регистрация CSS файла
$this->registerCssFile('@web/css/login.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);
$this->registerCssFile('@web/css/signup.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);

// $this->title = 'Регистрация';
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<div class="site-signup">
    <h1>Регистрация</h1>
    <p class="desc-h1-sign">Пройдите регистрацию используя электронную почту</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'input-txt'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control input-style'],
                    'errorOptions' => ['class' => 'col-lg-10 invalid-feedback error-input'], // Указываем класс для стилей ошибок
                ],
                'validateOnBlur' => false, // Включаем валидацию при потере фокуса
            ]); ?>
            <div class="form-columns">
            <div class="l-col">
            <?= $form->field($model, 'username')->textInput(['placeholder' => 'Введите ваш никнейм'])->label('Никнейм') ?>
            <?= $form->field($model, 'first_name')->textInput(['placeholder' => 'Введите ваше имя'])->label('Имя') ?>
            <?= $form->field($model, 'last_name')->textInput(['placeholder' => 'Введите вашу фамилию'])->label('Фамилия') ?>
            </div>
            <div class="r-col">
            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Введите вашу почту'])->label('Электронная почта') ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Введите пароль'])->label('Пароль') ?>
            <?= $form->field($model, 'password_repeat')->passwordInput(['placeholder' => 'Введите пароль повторно'])->label('Повторите пароль') ?>
            </div>
            </div>
                <div class="form-group">
                    <div>
                    <?= Html::submitButton('Регистрация', ['class' => 'btn-submit', 'name' => 'signup-button']) ?>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
            
            <div class="after-btn">
            <div class="no-auth-div">
                <p>Уже есть аккаунт?<p> <?= Html::a('Войти', Url::to(['site/login']), ['class' => 'reg-href']) ?>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>