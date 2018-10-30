<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "publication".
 *
 * @property int $id
 * @property string $url
 * @property string $title
 * @property string $text
 * @property int $author
 * @property int $status
 */
class Publication extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publication';
    }
    public function behaviors()
    {
        return [
            'timestampBehavior' =>
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'date_create',
                'updatedAtAttribute' => 'date_update',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            [['text'], 'string'],
            [['author', 'status'], 'integer'],
            [['url', 'title'], 'string', 'max' => 255],
            [['url'], 'unique'],
            [['date_create', 'date_update'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'title' => 'Title',
            'text' => 'Text',
            'author' => 'Author',
            'status' => 'Status',
            'date_create' => 'Date create',
            'date_update' => 'Date update',
        ];
    }

    public function getAuthor(){
       return $this->hasOne(User::className(), ['id' => 'author']);
    }
}
