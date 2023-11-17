<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserAchievement $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-achievement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_game_id')->textInput() ?>

    <?= $form->field($model, 'achievement_id')->textInput() ?>

    <?= $form->field($model, 'is_completed')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
