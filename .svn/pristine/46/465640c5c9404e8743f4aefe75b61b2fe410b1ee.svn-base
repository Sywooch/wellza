<?php
namespace common\models;

use Yii;

/**
 * Search model form
 */
class Search extends \yii\db\ActiveRecord
{ 
    public $searchstring;
    
    
    public function rules()
    {
        // only fields in rules() are searchable
        return [
            [['searchstring'], 'safe'],
        ];
    }
    
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return \yii\base\Model::scenarios();
    }
    
    /**
     * Performs Search 
     *
     */
    public function search($params =null)
    {   
        return true;                      
    }
}