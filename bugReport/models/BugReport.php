<?php

namespace common\modules\bugReport\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "bug_report".
 *
 * @property integer $id
 * @property string $email
 * @property string $url
 * @property string $description
 * @property integer $status
 * @property integer $created_at
 */
class BugReport extends \yii\db\ActiveRecord
{
    public $updated_at;
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bug_report}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'url','description'], 'required'],
            [['email'], 'email'],
            [['status', 'created_at'], 'integer'],
            [['email'], 'string', 'max' => 255],
            [['url'], 'string', 'max' => 2000],
            [['description'], 'string', 'max' => 2000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'url' => Yii::t('app', 'Url'),
            'description' => Yii::t('app', 'Description'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
?>