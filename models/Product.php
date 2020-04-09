<?php

namespace app\models;

use Yii;
use app\models\ProductType;

/**
 * This is the model class for table "product".
 *
 * @property int $product_id
 * @property string $product_name
 * @property int $product_type_id
 */
class Product extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['product_name'], 'string'],
            [['product_type_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'product_id' => 'Product ID',
            'product_name' => 'ชื่อสินค้า',
            'product_type_id' => 'Product Type ID',
            'producttype' => 'ประเภทสินค้า'
        ];
    }

    public function getProducttype() {
        return $this->hasOne(ProductType::className(), ['product_type_id' => 'product_type_id']);
    }

}
