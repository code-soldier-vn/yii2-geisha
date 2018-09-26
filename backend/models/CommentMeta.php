<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comment_meta".
 *
 * @property int $meta_id
 * @property int $content_id
 * @property string $meta_key
 * @property string $meta_value
 */
class CommentMeta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment_meta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_id'], 'integer'],
            [['meta_key'], 'required'],
            [['meta_value'], 'string'],
            [['meta_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'meta_id' => Yii::t('app', 'Meta ID'),
            'content_id' => Yii::t('app', 'Content ID'),
            'meta_key' => Yii::t('app', 'Meta Key'),
            'meta_value' => Yii::t('app', 'Meta Value'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CommentMetaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentMetaQuery(get_called_class());
    }
}
