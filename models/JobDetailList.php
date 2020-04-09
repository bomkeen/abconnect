<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job_detail_list".
 *
 * @property int $job_detail_list_id
 * @property int|null $job_detail_id
 * @property string|null $line1
 * @property string|null $line2
 * @property string|null $line3
 * @property string|null $line4
 * @property string|null $line5
 * @property string|null $line6
 * @property string|null $line7
 * @property string|null $line8
 * @property string|null $line9
 * @property string|null $line10
 * @property string|null $waranty
 * @property int|null $user_create
 * @property int|null $user_update
 *
 * @property JobDetail $jobDetail
 */
class JobDetailList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_detail_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_detail_id', 'user_create', 'user_update'], 'integer'],
            [['line1', 'line2', 'line3', 'line4', 'line5', 'line6', 'line7', 'line8', 'line9', 'line10', 'waranty'], 'string', 'max' => 255],
            [['job_detail_id'], 'exist', 'skipOnError' => true, 'targetClass' => JobDetail::className(), 'targetAttribute' => ['job_detail_id' => 'job_detail_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'job_detail_list_id' => 'Job Detail List ID',
            'job_detail_id' => 'Job Detail ID',
            'line1' => 'Line1',
            'line2' => 'Line2',
            'line3' => 'Line3',
            'line4' => 'Line4',
            'line5' => 'Line5',
            'line6' => 'Line6',
            'line7' => 'Line7',
            'line8' => 'Line8',
            'line9' => 'Line9',
            'line10' => 'Line10',
            'waranty' => 'Waranty',
            'user_create' => 'User Create',
            'user_update' => 'User Update',
        ];
    }

    /**
     * Gets query for [[JobDetail]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJobDetail()
    {
        return $this->hasOne(JobDetail::className(), ['job_detail_id' => 'job_detail_id']);
    }
}
