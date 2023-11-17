<?php

/**
 * This is the model class for table "sequences".
 *
 * The followings are the available columns in table 'sequences':
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $increment
 * @property integer $min_letter
 * @property integer $max_letter
 * @property integer $min_number
 * @property integer $max_number
 * @property integer $cur_letter1
 * @property integer $cur_letter2
 * @property integer $cur_letter3
 * @property integer $cur_letter4
 * @property integer $cur_letter5
 * @property integer $cur_number
 * @property integer $cycle
 */
class Sequence extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sequences';
	}
        
        /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('increment, min_letter, max_letter, min_number, max_number, cur_letter1, cur_letter2, cur_letter3, cur_letter4, cur_letter5, cur_number, cycle', 'numerical', 'integerOnly'=>true),
			array('name, code', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, code, increment, min_letter, max_letter, min_number, max_number, cur_letter1, cur_letter2, cur_letter3, cur_letter4, cur_letter5, cur_number, cycle', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sequence the static model class
	 */
	public static function model($className=__CLASS__)
	{
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
}
