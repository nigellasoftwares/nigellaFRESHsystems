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
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'code' => 'Code',
			'increment' => 'Increment',
			'min_letter' => 'Min Letter',
			'max_letter' => 'Max Letter',
			'min_number' => 'Min Number',
			'max_number' => 'Max Number',
			'cur_letter1' => 'Cur Letter1',
			'cur_letter2' => 'Cur Letter2',
			'cur_letter3' => 'Cur Letter3',
			'cur_letter4' => 'Cur Letter4',
			'cur_letter5' => 'Cur Letter5',
			'cur_number' => 'Cur Number',
			'cycle' => 'Cycle',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('increment',$this->increment);
		$criteria->compare('min_letter',$this->min_letter);
		$criteria->compare('max_letter',$this->max_letter);
		$criteria->compare('min_number',$this->min_number);
		$criteria->compare('max_number',$this->max_number);
		$criteria->compare('cur_letter1',$this->cur_letter1);
		$criteria->compare('cur_letter2',$this->cur_letter2);
		$criteria->compare('cur_letter3',$this->cur_letter3);
		$criteria->compare('cur_letter4',$this->cur_letter4);
		$criteria->compare('cur_letter5',$this->cur_letter5);
		$criteria->compare('cur_number',$this->cur_number);
		$criteria->compare('cycle',$this->cycle);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
    
    public static function sequence_transaction()
    {
        $sequence = Sequence::model()->findByPk(9);

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
