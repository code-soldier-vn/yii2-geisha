<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_meta".
 *
 * @property int $meta_id
 * @property int $user_id
 * @property string $meta_key
 * @property string $meta_value
 */
class UserMeta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_meta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
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
            'user_id' => Yii::t('app', 'User ID'),
            'meta_key' => Yii::t('app', 'Meta Key'),
            'meta_value' => Yii::t('app', 'Meta Value'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserMetaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserMetaQuery(get_called_class());
    }
}
