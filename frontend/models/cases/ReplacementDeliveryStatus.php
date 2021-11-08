<?php

namespace frontend\models\cases;

use Yii;

/**
 * This is the model class for table "replacement_delivery_status".
 *
 * @property int $id
 * @property string $name
 * @property int $created_by
 * @property string $created_by_datetime
 * @property bool $deleted
 *
 * @property CustomerCases[] $customerCases
 */
class ReplacementDeliveryStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'replacement_delivery_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_by'], 'integer'],
            [['created_by_datetime'], 'safe'],
            [['deleted'], 'boolean'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_by' => 'Created By',
            'created_by_datetime' => 'Created By Datetime',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerCases()
    {
        return $this->hasMany(CustomerCases::className(), ['replacement_delivery_status' => 'id']);
    }
}
