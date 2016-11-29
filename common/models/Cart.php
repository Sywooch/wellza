<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $type
 * @property integer $type_id
 * @property integer $quantity
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $customer
 */
class Cart extends base\BaseCart
{
//    public $product;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

     /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'type_id', 'quantity'], 'integer'],
            [['type'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'type' => 'Type',
            'type_id' => 'Type ID',
            'quantity' => 'Quantity',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /**
     * 
     * @return type
     */
    
    public function behaviors() {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * 
     * @inheritdoc
     */
    public function fields() {
        return ArrayHelper::merge(parent::fields(), [
                    'product' => function($model) {
                        if($model->type == 'product') {
                            return $model->product;
                        } else {
                            return null;
                        }
                    },
                    'appointment' => function($model) {
                        if($model->type == 'appointment') {
                            $appointment =  $model->appointment;
                            $providerName = $appointment->provider->first_name.' '.$appointment->provider->last_name;
                            $profileImage = $appointment->provider->profile_image;
                            $address = $appointment->provider->address;
                            $address2 = $appointment->provider->address2;
                            $city = $appointment->provider->city;
                            $province = $appointment->provider->province;
                            $postalCode = $appointment->provider->postal_code;
                            $country = $appointment->provider->country;
                            $categoryImage = $appointment->package->parent0->category_image;

                            $appointment = $appointment->toArray();
                            $appointment['provider_name'] = $providerName;
                            $appointment['profile_image'] = $profileImage;
                            $appointment['provider_address'] = $address;
                            $appointment['provider_address2'] = $address2;
                            $appointment['provider_city'] = $city;
                            $appointment['provider_province'] = $province;
                            $appointment['provider_postal_code'] = $postalCode;
                            $appointment['provider_country'] = $country;
                            $appointment['category_image'] = $categoryImage;
                            
                            
                            $url = \yii\helpers\Url::to('@web', true);
                            if (!empty($profileImage) && file_exists('./' . $profileImage)) {
                                $appointment['profile_image'] =  $url . '/' . $profileImage;
                            } else {
                                $appointment['profile_image'] =   $url . '/uploads/profile/images/default-profile.png';
                            }
                            if ($appointment['category_image'] != '' && file_exists($appointment['category_image'])) {
                                $appointment['category_image'] = $url . '/' . $appointment['category_image'];
                            }
                            return $appointment;
                        } else {
                            return null;
                        }
                    },
                    'wellza_bundle' => function($model) {
                        if($model->type == 'wellza_bundle') {
                            $data = $model->wellzaBundle;
                            if(!empty($data)) {
                                $data = $data->toArray();
                                $data['bundle_categories'] = $model->wellzaBundle->bundleCategories;
                            }
                            return $data;
                        } else {
                            return null;
                        }
                    },
                    'wellza_membership' => function($model) {
                        if($model->type == 'wellza_membership') {
                            return $model->wellzaMembership;
                        } else {
                            return null;
                        }
                    },
                    'giftcard' => function($model) {
                        
                        if($model->type == 'giftcard') {
                            return $model->gift_Voucher;
                        } else {
                            return null;
                        }
                    }
        ]);
    }

    /**
     * 
     * @inheritdoc
     */
   

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointment()
    {
        return $this->hasOne(Appointment::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'type_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGift_Voucher() {
        return $this->hasOne(GiftVoucher::className(), ['id' => 'type_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWellzaBundle()
    {
        return $this->hasOne(Bundles::className(), ['bundle_id' => 'type_id']);
    }
//    /**
//     * @return \yii\db\ActiveQuery
//     */
    public function getWellzaMembership()
    {
        return $this->hasOne(MasterMembershipPlan::className(), ['id' => 'type_id']);
    }
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getGiftcard()
//    {
//        return $this->hasOne(Product::className(), ['id' => 'product_id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(User::className(), ['id' => 'customer_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CartQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CartQuery(get_called_class());
    }
    
    /**
     * Add to cart
     */
    public static function add($data){
        if(!cart::isAlreadyInCart($data)) {
            $model = new Cart;
            $model->load($data,'');
        } else {
            if(($data['type'] == 'wellza_membership') || $data['type'] == 'wellza_bundle') {
                return ['message'=>'you already added this in your cart.'];
            }
            $model = self::find()->byCustomerId($data['customer_id'])->byTypeId($data['type_id'])->byType('product')->one();
            $model->quantity += $data['quantity'];
        }
        return $model->save();
    }
    
    /**
     * Check whether the product is already in cart or not
     * @param type $data
     * @return boolean
     */
    public static function isAlreadyInCart($data) {
        if($data['type'] == 'product') {
            $cart = self::find()->byCustomerId($data['customer_id'])->byTypeId($data['type_id'])->byType($data['type'])->one();
            if(!empty($cart)) {
                return true;
            } else {
                return false;
            }
        } else {
            if ($data['type'] == 'wellza_membership' || $data['type'] == 'wellza_bundle') {
                $cart = self::find()->byCustomerId($data['customer_id'])->byTypeId($data['type_id'])->byType($data['type'])->one();
                if (!empty($cart)) {
                    return true;
                }
            } else {
                return false;
            }
        }
    }
    
    /**
     * Check whether the appointment  already in cart or not
     * @param type $data
     * @return boolean
     */
    /*public static function isAlreadyInCart($data) {
        
    }*/
    /**
     * User's Cart
     * @param type $userId
     * @return type
     */
    public static function myCart($userId){
        $query =  self::find()->byCustomerId($userId);
        $total = 0;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $query->count(),
            ],
        ]);
        if (!empty($dataProvider->getModels())) {
            foreach ($dataProvider->getModels() as $data) {
                switch ($data['type']) {
                    case 'appointment':
                         $total += $data['appointment']['appointment_price'];
                        break;
                    case 'product':
                         $total += $data['product']['price'];
                        break;
                    case 'giftcard':
                         $total += $data['gift_Voucher']['amount'];
                        break;
                    case 'wellza_bundle':
                         $total += $data['wellzaBundle']['price'];
                        break;
                    case 'wellza_membership':
                         $total += $data['wellzaMembership']['price'];
                        break;
                }
            }
        }
        \yii::$app->response->extraData=['total'=>$total];
        return $dataProvider;
    }
    /**
     * Delete item from cart
     * @param type $id
     * @return boolean
     */
    public static function deleteFromCart($id){
        $item = self::find()->byId($id)->one();
        if(!empty($item)) {
            $item->delete();
            return true;
        } else {
            return false;
        }
    }
    /**
     * Delete all items from cart
     * @param userId
     * @return boolean
     */
    public static function emptyCart($userId){
        return Cart::deleteAll(['customer_id'=>$userId]);
    }
    
    /**
     * save session data to db
     * @param type $product id
     * @param type $qty
     */
    public static function saveSessionData($pro = null, $qty = null,$type = null) {
        $user = Yii::$app->user->id;
        if ($user) {
            if ($pro && $qty) {
                $model = self::findOne(['customer_id' => $user, 'type' => $type, 'type_id' => $pro]);
                if ($model) {
                    $model->quantity = $qty;
                    $model->save(false);
                } else {
                    $model = new Cart();
                    $model->type_id = $pro;
                    $model->customer_id = $user;
                    $model->type = $type;
                    $model->quantity = $qty;
                    $model->save(false);
                }
            } elseif ($pro && $qty == '') {
                $model = self::findOne(['customer_id' => $user, 'type' => $type, 'type_id' => $pro]);
                if ($model) {
                    $model->delete();
                    switch($type) {
                        case 'appointment': 
                            Appointment::deleteAll(['id' => $pro]);
                        break;
                        case 'giftcard': 
                            GiftVoucher::deleteAll(['id' => $pro]);
                        break;
                        case 'wellza_membership': 
                            UserMembership::deleteAll(['id' => $pro]);
                        break;
                    }
                }
            } elseif ($pro == '' && $qty == '') {
                $cart = Yii::$app->cart->getPositions();
                if (count($cart) > 0) {
                    foreach ($cart as $cart) {
                        $model = self::findOne(['customer_id' => $user,'type' => $type, 'type_id' => $cart->getId()]);
                        if ($model) {
                            $model->quantity = $cart->getQuantity();
                            $model->save(false);
                        } else {
                            $model = new Cart();
                            $model->type_id = $cart->getId();
                            $model->customer_id = $user;
                            $model->type = $type;
                            $model->quantity = $cart->getQuantity();
                            $model->save(false);
                        }
                    }
                }
            }
        }
    } 
    public static function userCart($userId){
        return  self::find()->byCustomerId($userId)->all();
        
    }
}
