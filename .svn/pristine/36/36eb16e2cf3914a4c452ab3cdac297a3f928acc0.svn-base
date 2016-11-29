<?php

namespace common\models\query;
/**
 * This is the ActiveQuery class for [[\common\models\base\Appointment]].
 *
 * @see \common\models\base\Appointment
 */
class AppointmentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\Appointment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\Appointment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public function byUpcoming($val)
    {   $this->andWhere('appointment.appointment_date >= :cur_date AND appointment.customer_id = :id',[':cur_date' => CURDATE(),':id' => $val]);
        //WHERE `date` >= CURDATE() ORDER BY `date`;
        return $this;
    }
       
    public function byStatus($val = null,$id = null)
    {
        $this->andWhere('appointment.status = :status AND appointment.customer_id = :id',[':status' => $val,':id' => $id]);
        return $this;
    }
    
    public function byProviderStatus($val = null,$id = null)
    {   
        $this->where('appointment.status = :status AND appointment.provider_id = :id',[':status' => $val,':id' => $id]);
        return $this;
    }    
    
    public function byCurrentStatus($val = null,$id = null)
    {
        $this->andWhere('appointment.status = :status',[':status' => $val]);
        return $this;
    }
    
    public function byDate($now = null)
    {
        $this->andWhere(['>=','appointment.appointment_date',"{$now}"]);
        return $this;
    }   
    
    public function byId($id)
    {
        $this->andWhere(['id' => $id]);
        return $this;
    }
    public function byProviderId($providerId)
    {
        $this->andWhere(['provider_id' => $providerId]);
        return $this;
    }
    
    public function bySlot($user_id = null,$start_time = null,$date = null)
    {
        $this->andFilterWhere(['and',['=','customer_id',$user_id],
            ['=','appointment_time',$start_time],
            ['=','appointment_date',$date]]);
        return $this;
    }
    
    public function byAppointment($appointment_id = null)
    {
        $this->where('id=:id',[':id' => $appointment_id]);        
        return $this;
    }
}
