<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserGame $model */

$this->title = 'Create User Game';
$this->params['breadcrumbs'][] = ['label' => 'User Games', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-game-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
