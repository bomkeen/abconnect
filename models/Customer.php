<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $customer_id
 * @property string $customer_name
 * @property string $customer_detail
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_name', 'customer_detail','add_line1','add_line2','add_line3','tel'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'customer_name' => 'Customer Name',
            'add_line1'=>'add_line1',
            'add_line2'=>'add_line2',
            'add_line3'=>'add_line3',
            'tel'=>'tel',
            'customer_detail' => 'Customer Detail',
            
        ];
    }
}
