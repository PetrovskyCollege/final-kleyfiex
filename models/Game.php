<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game".
 *
 * @property int $id
 * @property string $title
 * @property int $genre_id
 * @property int $category_id
 * @property int $release_year
 * @property int $developer_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $description
 * @property string|null $image
 *
 * @property Achievement[] $achievements
 * @property Category $category
 * @property Developer $developer
 * @property Genre $genre
 * @property UserGame[] $userGames
 * @property Wishlist[] $wishlists
 */
class Game extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'game';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'genre_id', 'category_id', 'release_year', 'developer_id'], 'required'],
            [['genre_id', 'category_id', 'release_year', 'developer_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['description'], 'string'],
            [['title', 'image'], 'string', 'max' => 255],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::class, 'targetAttribute' => ['genre_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['developer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Developer::class, 'targetAttribute' => ['developer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'genre_id' => 'Genre ID',
            'category_id' => 'Category ID',
            'release_year' => 'Release Year',
            'developer_id' => 'Developer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }

    /**
     * Gets query for [[Achievements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAchievements()
    {
        return $this->hasMany(Achievement::class, ['game_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Developer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeveloper()
    {
        return $this->hasOne(Developer::class, ['id' => 'developer_id']);
    }

    /**
     * Gets query for [[Genre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::class, ['id' => 'genre_id']);
    }

    /**
     * Gets query for [[UserGames]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserGames()
    {
        return $this->hasMany(UserGame::class, ['game_id' => 'id']);
    }

    /**
     * Gets query for [[Wishlists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWishlists()
    {
        return $this->hasMany(Wishlist::class, ['game_id' => 'id']);
    }
}
