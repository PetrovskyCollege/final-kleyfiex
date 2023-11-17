<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_achievement".
 *
 * @property int $id
 * @property int|null $user_game_id
 * @property int|null $achievement_id
 * @property int|null $is_completed
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Achievement $achievement
 * @property UserGame $userGame
 */
class UserAchievement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_achievement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_game_id', 'achievement_id', 'is_completed'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_game_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserGame::class, 'targetAttribute' => ['user_game_id' => 'id']],
            [['achievement_id'], 'exist', 'skipOnError' => true, 'targetClass' => Achievement::class, 'targetAttribute' => ['achievement_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_game_id' => 'User Game ID',
            'achievement_id' => 'Achievement ID',
            'is_completed' => 'Is Completed',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Achievement]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAchievement()
    {
        return $this->hasOne(Achievement::class, ['id' => 'achievement_id']);
    }

    /**
     * Gets query for [[UserGame]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserGame()
    {
        return $this->hasOne(UserGame::class, ['id' => 'user_game_id']);
    }
}
