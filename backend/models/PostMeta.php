<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "post_meta".
 *
 * @property int $meta_id
 * @property int $post_id
 * @property string $meta_key
 * @property string $meta_value
 */
class PostMeta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_meta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id'], 'integer'],
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
            'post_id' => Yii::t('app', 'Post ID'),
            'meta_key' => Yii::t('app', 'Meta Key'),
            'meta_value' => Yii::t('app', 'Meta Value'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return PostMetaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostMetaQuery(get_called_class());
    }
}
