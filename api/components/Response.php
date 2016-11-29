<?php

namespace api\components;


class Response extends \yii\web\Response
{
    private $_rcCode='RC0000';
    public $extraData = null;


    public function setrcCode($code)
    {
        $this->_rcCode=$code;
    }
    
    public function getrcCode()
    {
        return $this->_rcCode;
    }
    
} 