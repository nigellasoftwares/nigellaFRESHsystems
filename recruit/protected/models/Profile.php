<?php

class Profile extends CActiveRecord {

    public function tableName() {
        return 'profiles';
    }
    
    public function defaultScope()
    {
        return array(
            'condition' => "disable = 'ACTIVE'",
        );
    }
    
    public function rules() {
        return array(
            array('company_id, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('code, guid, type, fullname, initial, contact_number1, contact_number2, mobile_number1, mobile_number2, status, disable', 'length', 'max' => 255),
            array('remark, created_at, updated_at', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, code, guid, company_id, type, fullname, initial, contact_number1, contact_number2, mobile_number1, mobile_number2, remark, status, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on' => 'search'),
            
            array('created_at, updated_at','default', 'value'=>date('Y-m-d H:i:s'), 'setOnEmpty'=>false,'on'=>'insert'),
            array('created_by, updated_by','default', 'value'=>Yii::app()->user->getState('userid'), 'setOnEmpty'=>false,'on'=>'insert'),
            array('updated_at','default', 'value'=>date('Y-m-d H:i:s'), 'setOnEmpty'=>false,'on'=>'update'),
            array('updated_by','default', 'value'=>Yii::app()->user->getState('userid'), 'setOnEmpty'=>false,'on'=>'update'),
        );
    }

    public function relations() {
        return array(
            'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
            'users' => array(self::HAS_MANY, 'User', 'profile_id'),
            'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
            'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
        );
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public static function agency_stat() 
    {
        $agency = Profile::model()->findAllByAttributes(array(
            'type' => 'SOURCE AGENT'
        ), array(
            'order' => 'id ASC'
        ));
        
        foreach($agency as $a){
            $manage = array(
                'total' => 0,
                'medical' => 0,
                'pending_vdr' => 0,
                'vdr_approved' => 0,
                'approval' => 0,
                'departure' => 0,
                'arrival' => 0
            );

            $transaction = Transaction::model()->findAllByAttributes(array('sourceagency_id' => $a->id));
            $manage['total'] = count($transaction);
            foreach($transaction as $t){
                if(!empty($t->medical)){
                    $manage['medical'] += 1;

                    if(empty($t->visa)){
                        $manage['pending_vdr'] += 1;
                    } else {
                        $manage['vdr_approved'] += 1;

                        if(!empty($t->approval)){
                            $manage['approval'] += 1;

                            if(!empty($t->departure)){
                                $manage['departure'] += 1;

                                if(!empty($t->arrival)){
                                    $manage['arrival'] += 1;
                                }
                            }
                        }
                    }
                }
            }
            
            $output[] = array(
                'id' => $a->id,
                'company' => $a->company->remark,
                'country' => $a->company->country->name,
                'total' => $manage['total'],
                'medical' => $manage['medical'],
                'pending_vdr' => $manage['pending_vdr'],
                'vdr_approved' => $manage['vdr_approved'],
                'approval' => $manage['approval'],
                'departure' => $manage['departure'],
                'arrival' => $manage['arrival']
            );
        }
        
        array_multisort(array_column($output, 'country'),SORT_ASC,array_column($output, 'company'),SORT_ASC,$output);
        return $output;
    }
}
