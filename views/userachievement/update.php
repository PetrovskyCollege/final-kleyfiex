<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserAchievement $model */

$this->title = 'Update User Achievement: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Achievements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-achievement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
