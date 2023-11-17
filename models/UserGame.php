<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_game".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $game_id
 * @property string|null $status
 * @property float|null $completion_percentage
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $in_wishlist
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Game $game
 * @property User $user
 * @property UserAchievement[] $userAchievements
 */
class UserGame extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_game';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'game_id', 'in_wishlist'], 'integer'],
            [['completion_percentage'], 'number'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['game_id'], 'exist', 'skipOnError' => true, 'targetClass' => Game::class, 'targetAttribute' => ['game_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'game_id' => 'Game ID',
            'status' => 'Status',
            'completion_percentage' => 'Completion Percentage',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'in_wishlist' => 'In Wishlist',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Game]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGame()
    {
        return $this->hasOne(Game::class, ['id' => 'game_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[UserAchievements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserAchievements()
    {
        return $this->hasMany(UserAchievement::class, ['user_game_id' => 'id']);
    }
}
