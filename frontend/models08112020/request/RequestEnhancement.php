<?php

namespace frontend\models\request;

use Yii;

/**
 * This is the model class for table "service_request_enhancement".
 *
 * @property integer $id
 * @property integer $category
 * @property string $material
 * @property string $description
 * @property integer $created_by
 * @property string $creation_datetime
 * @property string $last_modified_datetime
 * @property integer $deleted
 */
class RequestEnhancement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_request_enhancement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'created_by', 'deleted'], 'integer'],
            [['description'], 'string'],
            [['creation_datetime', 'last_modified_datetime'], 'safe'],
            [['material'], 'string', 'max' => 250],
            [['material'], 'required', 'message'=>'']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'material' => 'Material',
            'description' => 'Description',
            'created_by' => 'Created By',
            'creation_datetime' => 'Creation Datetime',
            'last_modified_datetime' => 'Last Modified Datetime',
            'deleted' => 'Status',
        ];
    }

    public function getName() {
        return $this->categoryObject->name." - ".$this->material." - ".$this->description;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryObject()
    {
        return $this->hasOne(RequestEnhancementCategory::className(), ['id' => 'category']);
    }
}
