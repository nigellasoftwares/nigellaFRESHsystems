<?php

class Sequence extends CActiveRecord {

    public function tableName() {
        return 'sequences';
    }

    public function rules() {
        return array(
            array('increment, min_letter, max_letter, min_number, max_number, cur_letter1, cur_letter2, cur_letter3, cur_letter4, cur_letter5, cur_number, cycle', 'numerical', 'integerOnly' => true),
            array('name, code', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, code, increment, min_letter, max_letter, min_number, max_number, cur_letter1, cur_letter2, cur_letter3, cur_letter4, cur_letter5, cur_number, cycle', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public static function sequence_item($id)
    {
        $sequence = Sequence::model()->findByPk($id);

        $code = $sequence->cur_number + $sequence->increment;
        $plate1 = $sequence->cur_letter1;
        $plate2 = $sequence->cur_letter2;
        $plate3 = $sequence->cur_letter3;

        if($code > 9999){
            $code = $sequence->min_number;
            $plate3 = $plate3 + $sequence->increment;
        }

        if($plate3 > $sequence->max_letter){
            $plate3 = $sequence->min_letter;
            $plate2 = $plate2 + $sequence->increment;
        }

        if($plate2 > $sequence->max_letter){
            $plate2 = $sequence->min_letter;
            $plate1 = $plate1 + $sequence->increment;
        }

        if($plate1 > $sequence->max_letter){
            $plate1 = $sequence->min_letter;
            $plate2 = $sequence->min_letter;
            $plate3 = $sequence->min_letter;
        }

        $lcode = $sequence->code;
        $year = substr(date('Y'),2,4);
        $pcode1 = "&#".$plate1.";";
        $pcode2 = "&#".$plate2.";";
        $pcode3 = "&#".$plate3.";";
        $rcode = str_pad($code, '4', '0', STR_PAD_LEFT);

        $endcode = $lcode.$year.$pcode1.$pcode2.$pcode3.$rcode;

        $sequence->cur_letter1 = $plate1;
        $sequence->cur_letter2 = $plate2;
        $sequence->cur_letter3 = $plate3;
        $sequence->cur_number = $code;
        $sequence->save();

        return $endcode;
    }
    
    public static function sequence_transaction()
    {
        $sequence = Sequence::model()->findByPk(5);

        $code = $sequence->cur_number + $sequence->increment;
        $plate1 = $sequence->cur_letter1;
        $plate2 = $sequence->cur_letter2;
        $plate3 = $sequence->cur_letter3;
        $plate4 = $sequence->cur_letter4;
        $plate5 = $sequence->cur_letter5;

        if($code > 9999){
            $code = $sequence->min_number;
            $plate5 = $plate5 + $sequence->increment;
        }
        
        if($plate5 > $sequence->max_letter){
            $plate5 = $sequence->min_letter;
            $plate4 = $plate4 + $sequence->increment;
        }
        
        if($plate4 > $sequence->max_letter){
            $plate4 = $sequence->min_letter;
            $plate3 = $plate3 + $sequence->increment;
        }
        
        if($plate3 > $sequence->max_letter){
            $plate3 = $sequence->min_letter;
            $plate2 = $plate2 + $sequence->increment;
        }

        if($plate2 > $sequence->max_letter){
            $plate2 = $sequence->min_letter;
            $plate1 = $plate1 + $sequence->increment;
        }

        if($plate1 > $sequence->max_letter){
            $plate1 = $sequence->min_letter;
            $plate2 = $sequence->min_letter;
            $plate3 = $sequence->min_letter;
            $plate4 = $sequence->min_letter;
            $plate5 = $sequence->min_letter;
        }

        $lcode = $sequence->code;
        $year = substr(date('Y'),2,4);
        $pcode1 = "&#".$plate1.";";
        $pcode2 = "&#".$plate2.";";
        $pcode3 = "&#".$plate3.";";
        $pcode4 = "&#".$plate4.";";
        $pcode5 = "&#".$plate5.";";
        $rcode = str_pad($code, '4', '0', STR_PAD_LEFT);

        $endcode = $lcode.$year.'-'.$pcode1.$pcode2.$pcode3.'-'.$pcode4.$pcode5.'-'.$rcode;

        $sequence->cur_letter1 = $plate1;
        $sequence->cur_letter2 = $plate2;
        $sequence->cur_letter3 = $plate3;
        $sequence->cur_letter4 = $plate4;
        $sequence->cur_letter5 = $plate5;
        $sequence->cur_number = $code;
        $sequence->save();

        return $endcode;
    }
}
