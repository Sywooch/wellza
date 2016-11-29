<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "coupon".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $discount
 * @property string $type
 * @property string $total
 * @property string $date_start
 * @property string $date_end
 * @property integer $uses_total
 * @property integer $uses_customer
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CouponHistory[] $couponHistories
 */
class BaseCoupon extends \yii\db\ActiveRecord {
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'coupon';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name','discount',], 'trim'],
            [['name','discount','date_start','date_end'], 'required'],
            [['discount', 'total'], 'number'],
            [['date_start', 'date_end', 'created_at', 'updated_at'], 'safe'],
            [['uses_total', 'uses_customer'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['code'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'discount' => 'Discount',
            'type' => 'Type',
            'total' => 'Total',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'uses_total' => 'Uses Total',
            'uses_customer' => 'Uses Customer',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCouponHistories() {
        return $this->hasMany(CouponHistory::className(), ['coupon_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CouponQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\query\CouponQuery(get_called_class());
    }

}
