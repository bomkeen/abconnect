<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job_detail".
 *
 * @property int $job_detail_id
 * @property int $job_id
 * @property string $job_detail
 * @property int $product_id
 * @property string $product_detail
 * @property double $cost
 */
class JobDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['job_detail_id'], 'required'],
            [['job_detail_id', 'job_id', 'product_id','user_create','user_update'], 'integer'],
            [['job_detail', 'product_detail'], 'string'],
            [['cost','price','num','total_cost','total_price'], 'number'],
            [['job_detail_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'job_detail_id' => 'Job Detail ID',
            'job_id' => 'Job ID',
            'job_detail' => 'รายละเอียดสินค้า',
            'product_id' => 'Product ID',
            'product_detail' => 'link',
            'cost' => 'ต้นทุน',
            'price'=>'ราคาขาย',
            'num'=>'จำนวน',
            'total_cost'=>'ทุนรวม',
            'total_proce'=>'ราคารวม',
            'user_create'=>'user_create',
            'doc_num'=>'doc_num',
            'user_update'=>'user_update'
        ];
    }
}
