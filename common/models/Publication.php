<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

//TODO: move to common\models\db
/**
 * This is the model class for table "publication".
 *
 * @property int $publicationId
 * @property string $url
 * @property string $title
 * @property string $text
 * @property int $author
 * @property int $status
 */
//TODO: devide into Publication and BasePublication
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
                'createdAtAttribute' => 'dateCreate',
                'updatedAtAttribute' => 'dateUpdate',
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
            [['dateCreate', 'dateUpdate'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'publicationId' => 'ID',
            'url' => 'Url',
            'title' => 'Title',
            'text' => 'Text',
            'author' => 'Author',
            'status' => 'Status',
            'dateCreate' => 'Date create',
            'dateUpdate' => 'Date update',
        ];
    }
}
