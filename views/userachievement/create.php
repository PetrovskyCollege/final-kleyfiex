<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserAchievement $model */

$this->title = 'Create User Achievement';
$this->params['breadcrumbs'][] = ['label' => 'User Achievements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-achievement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
