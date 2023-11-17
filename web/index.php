<?php

use app\models\User;
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();

// Код для вывода данных
$users = User::find()->all();
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .user-data {
            text-align: left;
        }
    </style>
</head>
<body>

<div class="user-data">
    <?php foreach ($users as $user): ?>
        <p>
            <strong>ID:</strong> <?= $user->id ?><br>
            <strong>Nickname:</strong> <?= $user->username ?><br>
            <strong>First Name:</strong> <?= $user->first_name ?><br>
            <strong>Last Name:</strong> <?= $user->last_name ?><br>
            <strong>Email:</strong> <?= $user->email ?><br>
            ----------------------------------
        </p>
    <?php endforeach; ?>
</div>

</body>
</html> -->