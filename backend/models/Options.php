<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property int $option_id
 * @property string $option_name
 * @property string $option_value
 * @property string $autoload
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['option_name', 'option_value'], 'required'],
            [['option_value'], 'string'],
            [['option_name'], 'string', 'max' => 255],
            [['autoload'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'option_id' => Yii::t('app', 'Option ID'),
            'option_name' => Yii::t('app', 'Option Name'),
            'option_value' => Yii::t('app', 'Option Value'),
            'autoload' => Yii::t('app', 'Autoload'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return OptionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OptionsQuery(get_called_class());
    }
}
