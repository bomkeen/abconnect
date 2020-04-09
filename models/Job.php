<?php

namespace app\models;
use app\models\Customer;
use app\models\SystemUser;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property int $job_id
 * @property string $job_name
 * @property string $etc
 * @property int $customer_id
 * @property double $total_cost
 * @property double $total_profit
 * @property string $job_date
 * @property string $job_update_date
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_date','job_name','customer_id'], 'required'],
            [['customer_id','user_create','user_update'], 'integer'],
            [['total_cost', 'total_profit','total_price','total_vat'], 'number'],
            [['job_date', 'job_update_date','doc_num'], 'safe'],
            [['job_name', 'etc','status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'job_id' => 'Job ID',
            'job_name' => 'Project Name',
            'etc' => 'รายละเอียดอื่นๆ',
            'customer_id' => 'Customer ID',
            'customer'=>'ลูกค้า',
            'total_price'=>'ราคาขายรวม',
            'total_cost' => 'ต้นทุนรวม',
            'total_vat'=>'ภาษีรวม',
            'total_profit' => 'กำไรโดยประมาณ',
            'job_date' => 'วันที่ทำรายการ',
            'job_update_date' => 'Job Update Date',
            'doc_num'=>'doc_num',
            'status'=>'status',
            'user_create'=>'user_create',
            'user_update'=>'user_update'
            
        ];
    }
    public function getCustomer() {
        return $this->hasOne(Customer::className(), ['customer_id' => 'customer_id']);
    }
    public function getUsercreate() {
        return $this->hasOne(SystemUser::className(), ['user_create' => 'id']);
    }
    public function getUserupdate() {
        return $this->hasOne(SystemUser::className(), ['user_update' => 'id']);
    }
   
}
