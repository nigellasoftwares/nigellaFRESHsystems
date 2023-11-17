<?php

/**
 * This is the model class for table "doctorexams".
 *
 * The followings are the available columns in table 'doctorexams':
 * @property integer $id
 * @property integer $transaction_id
 * @property integer $doctor_id
 * @property string $exam_date
 * @property integer $height
 * @property integer $weight
 * @property integer $pulse
 * @property integer $bp_systolic
 * @property integer $bp_diastolic
 * @property string $menstrual_date
 * @property string $skinrash
 * @property string $anaesthetic
 * @property string $deformites
 * @property string $pallor
 * @property string $jaundice
 * @property string $lymph
 * @property string $vis_unaided_right
 * @property string $vis_unaided_left
 * @property string $vis_aided_right
 * @property string $vis_aided_left
 * @property string $hear_right
 * @property string $hear_left
 * @property string $others_general
 * @property string $comment_general
 * @property string $hiv
 * @property string $hiv_date
 * @property string $tuber
 * @property string $tuber_date
 * @property string $leprosy
 * @property string $leprosy_date
 * @property string $viral
 * @property string $viral_date
 * @property string $psychiatric
 * @property string $psychiatric_date
 * @property string $epilepsy
 * @property string $epilepsy_date
 * @property string $cancer
 * @property string $cancer_date
 * @property string $std
 * @property string $std_date
 * @property string $malaria
 * @property string $malaria_date
 * @property string $hypertension
 * @property string $hypertension_date
 * @property string $heart_disease
 * @property string $heart_disease_date
 * @property string $asthma
 * @property string $asthma_date
 * @property string $diabetes
 * @property string $diabetes_date
 * @property string $ulcer
 * @property string $ulcer_date
 * @property string $kidney
 * @property string $kidney_date
 * @property string $others_history
 * @property string $others_history_date
 * @property string $drugs
 * @property string $comment_history
 * @property string $cardio_heartsize
 * @property string $cardio_heartsound
 * @property string $cardio_other
 * @property string $res_breath
 * @property string $res_other
 * @property string $abdomen_liver
 * @property string $abdomen_spleen
 * @property string $abdomen_swelling
 * @property string $abdomen_lymph
 * @property string $abdomen_rectal
 * @property string $nerv_mental
 * @property string $nerv_speech
 * @property string $nerv_cognitive
 * @property string $nerv_size
 * @property string $nerv_motor
 * @property string $nerv_sensor
 * @property string $nerv_reflex
 * @property string $gen_kidney
 * @property string $gen_discharge
 * @property string $gen_sores
 * @property string $comment_gen
 * @property integer $status_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $disable
 *
 * The followings are the available model relations:
 * @property Transactions[] $transactions
 * @property Transactions $transaction
 * @property Profiles $doctor
 * @property Statuses $status
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class Doctorexam extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'doctorexams';
	}
        
        public function defaultScope()
        {
            return array(
                'condition' => "disable = 'ACTIVE'",
            );
        }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('transaction_id, doctor_id, height, weight, pulse, bp_systolic, bp_diastolic, status_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('skinrash, anaesthetic, deformites, pallor, jaundice, lymph, vis_unaided_right, vis_unaided_left, vis_aided_right, vis_aided_left, hear_right, hear_left, others_general, hiv, tuber, leprosy, viral, psychiatric, epilepsy, cancer, std, malaria, hypertension, heart_disease, asthma, diabetes, ulcer, kidney, others_history, drugs, cardio_heartsound, cardio_other, res_breath, res_other, abdomen_liver, abdomen_spleen, abdomen_swelling, abdomen_lymph, abdomen_rectal, nerv_mental, nerv_speech, nerv_cognitive, nerv_motor, nerv_sensor, nerv_reflex, gen_kidney, gen_discharge, gen_sores, disable', 'length', 'max'=>255),
			array('exam_date, menstrual_date, comment_general, hiv_date, tuber_date, leprosy_date, viral_date, psychiatric_date, epilepsy_date, cancer_date, std_date, malaria_date, hypertension_date, heart_disease_date, asthma_date, diabetes_date, ulcer_date, kidney_date, others_history_date, comment_history, cardio_heartsize, nerv_size, comment_gen, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, transaction_id, doctor_id, exam_date, height, weight, pulse, bp_systolic, bp_diastolic, menstrual_date, skinrash, anaesthetic, deformites, pallor, jaundice, lymph, vis_unaided_right, vis_unaided_left, vis_aided_right, vis_aided_left, hear_right, hear_left, others_general, comment_general, hiv, hiv_date, tuber, tuber_date, leprosy, leprosy_date, viral, viral_date, psychiatric, psychiatric_date, epilepsy, epilepsy_date, cancer, cancer_date, std, std_date, malaria, malaria_date, hypertension, hypertension_date, heart_disease, heart_disease_date, asthma, asthma_date, diabetes, diabetes_date, ulcer, ulcer_date, kidney, kidney_date, others_history, others_history_date, drugs, comment_history, cardio_heartsize, cardio_heartsound, cardio_other, res_breath, res_other, abdomen_liver, abdomen_spleen, abdomen_swelling, abdomen_lymph, abdomen_rectal, nerv_mental, nerv_speech, nerv_cognitive, nerv_size, nerv_motor, nerv_sensor, nerv_reflex, gen_kidney, gen_discharge, gen_sores, comment_gen, status_id, created_at, created_by, updated_at, updated_by, disable', 'safe', 'on'=>'search'),
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
			'transactions' => array(self::HAS_MANY, 'Transaction', 'doctorexam_id'),
			'transaction' => array(self::BELONGS_TO, 'Transaction', 'transaction_id'),
			'doctor' => array(self::BELONGS_TO, 'Profile', 'doctor_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'transaction_id' => 'Transaction',
			'doctor_id' => 'Doctor',
			'exam_date' => 'Exam Date',
			'height' => 'Height',
			'weight' => 'Weight',
			'pulse' => 'Pulse',
			'bp_systolic' => 'Bp Systolic',
			'bp_diastolic' => 'Bp Diastolic',
			'menstrual_date' => 'Menstrual Date',
			'skinrash' => 'Skinrash',
			'anaesthetic' => 'Anaesthetic',
			'deformites' => 'Deformites',
			'pallor' => 'Pallor',
			'jaundice' => 'Jaundice',
			'lymph' => 'Lymph',
			'vis_unaided_right' => 'Vis Unaided Right',
			'vis_unaided_left' => 'Vis Unaided Left',
			'vis_aided_right' => 'Vis Aided Right',
			'vis_aided_left' => 'Vis Aided Left',
			'hear_right' => 'Hear Right',
			'hear_left' => 'Hear Left',
			'others_general' => 'Others General',
			'comment_general' => 'Comment General',
			'hiv' => 'Hiv',
			'hiv_date' => 'Hiv Date',
			'tuber' => 'Tuber',
			'tuber_date' => 'Tuber Date',
			'leprosy' => 'Leprosy',
			'leprosy_date' => 'Leprosy Date',
			'viral' => 'Viral',
			'viral_date' => 'Viral Date',
			'psychiatric' => 'Psychiatric',
			'psychiatric_date' => 'Psychiatric Date',
			'epilepsy' => 'Epilepsy',
			'epilepsy_date' => 'Epilepsy Date',
			'cancer' => 'Cancer',
			'cancer_date' => 'Cancer Date',
			'std' => 'Std',
			'std_date' => 'Std Date',
			'malaria' => 'Malaria',
			'malaria_date' => 'Malaria Date',
			'hypertension' => 'Hypertension',
			'hypertension_date' => 'Hypertension Date',
			'heart_disease' => 'Heart Disease',
			'heart_disease_date' => 'Heart Disease Date',
			'asthma' => 'Asthma',
			'asthma_date' => 'Asthma Date',
			'diabetes' => 'Diabetes',
			'diabetes_date' => 'Diabetes Date',
			'ulcer' => 'Ulcer',
			'ulcer_date' => 'Ulcer Date',
			'kidney' => 'Kidney',
			'kidney_date' => 'Kidney Date',
			'others_history' => 'Others History',
			'others_history_date' => 'Others History Date',
			'drugs' => 'Drugs',
			'comment_history' => 'Comment History',
			'cardio_heartsize' => 'Cardio Heartsize',
			'cardio_heartsound' => 'Cardio Heartsound',
			'cardio_other' => 'Cardio Other',
			'res_breath' => 'Res Breath',
			'res_other' => 'Res Other',
			'abdomen_liver' => 'Abdomen Liver',
			'abdomen_spleen' => 'Abdomen Spleen',
			'abdomen_swelling' => 'Abdomen Swelling',
			'abdomen_lymph' => 'Abdomen Lymph',
			'abdomen_rectal' => 'Abdomen Rectal',
			'nerv_mental' => 'Nerv Mental',
			'nerv_speech' => 'Nerv Speech',
			'nerv_cognitive' => 'Nerv Cognitive',
			'nerv_size' => 'Nerv Size',
			'nerv_motor' => 'Nerv Motor',
			'nerv_sensor' => 'Nerv Sensor',
			'nerv_reflex' => 'Nerv Reflex',
			'gen_kidney' => 'Gen Kidney',
			'gen_discharge' => 'Gen Discharge',
			'gen_sores' => 'Gen Sores',
			'comment_gen' => 'Comment Gen',
			'status_id' => 'Status',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
			'updated_at' => 'Updated At',
			'updated_by' => 'Updated By',
			'disable' => 'Disable',
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
		$criteria->compare('transaction_id',$this->transaction_id);
		$criteria->compare('doctor_id',$this->doctor_id);
		$criteria->compare('exam_date',$this->exam_date,true);
		$criteria->compare('height',$this->height);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('pulse',$this->pulse);
		$criteria->compare('bp_systolic',$this->bp_systolic);
		$criteria->compare('bp_diastolic',$this->bp_diastolic);
		$criteria->compare('menstrual_date',$this->menstrual_date,true);
		$criteria->compare('skinrash',$this->skinrash,true);
		$criteria->compare('anaesthetic',$this->anaesthetic,true);
		$criteria->compare('deformites',$this->deformites,true);
		$criteria->compare('pallor',$this->pallor,true);
		$criteria->compare('jaundice',$this->jaundice,true);
		$criteria->compare('lymph',$this->lymph,true);
		$criteria->compare('vis_unaided_right',$this->vis_unaided_right,true);
		$criteria->compare('vis_unaided_left',$this->vis_unaided_left,true);
		$criteria->compare('vis_aided_right',$this->vis_aided_right,true);
		$criteria->compare('vis_aided_left',$this->vis_aided_left,true);
		$criteria->compare('hear_right',$this->hear_right,true);
		$criteria->compare('hear_left',$this->hear_left,true);
		$criteria->compare('others_general',$this->others_general,true);
		$criteria->compare('comment_general',$this->comment_general,true);
		$criteria->compare('hiv',$this->hiv,true);
		$criteria->compare('hiv_date',$this->hiv_date,true);
		$criteria->compare('tuber',$this->tuber,true);
		$criteria->compare('tuber_date',$this->tuber_date,true);
		$criteria->compare('leprosy',$this->leprosy,true);
		$criteria->compare('leprosy_date',$this->leprosy_date,true);
		$criteria->compare('viral',$this->viral,true);
		$criteria->compare('viral_date',$this->viral_date,true);
		$criteria->compare('psychiatric',$this->psychiatric,true);
		$criteria->compare('psychiatric_date',$this->psychiatric_date,true);
		$criteria->compare('epilepsy',$this->epilepsy,true);
		$criteria->compare('epilepsy_date',$this->epilepsy_date,true);
		$criteria->compare('cancer',$this->cancer,true);
		$criteria->compare('cancer_date',$this->cancer_date,true);
		$criteria->compare('std',$this->std,true);
		$criteria->compare('std_date',$this->std_date,true);
		$criteria->compare('malaria',$this->malaria,true);
		$criteria->compare('malaria_date',$this->malaria_date,true);
		$criteria->compare('hypertension',$this->hypertension,true);
		$criteria->compare('hypertension_date',$this->hypertension_date,true);
		$criteria->compare('heart_disease',$this->heart_disease,true);
		$criteria->compare('heart_disease_date',$this->heart_disease_date,true);
		$criteria->compare('asthma',$this->asthma,true);
		$criteria->compare('asthma_date',$this->asthma_date,true);
		$criteria->compare('diabetes',$this->diabetes,true);
		$criteria->compare('diabetes_date',$this->diabetes_date,true);
		$criteria->compare('ulcer',$this->ulcer,true);
		$criteria->compare('ulcer_date',$this->ulcer_date,true);
		$criteria->compare('kidney',$this->kidney,true);
		$criteria->compare('kidney_date',$this->kidney_date,true);
		$criteria->compare('others_history',$this->others_history,true);
		$criteria->compare('others_history_date',$this->others_history_date,true);
		$criteria->compare('drugs',$this->drugs,true);
		$criteria->compare('comment_history',$this->comment_history,true);
		$criteria->compare('cardio_heartsize',$this->cardio_heartsize,true);
		$criteria->compare('cardio_heartsound',$this->cardio_heartsound,true);
		$criteria->compare('cardio_other',$this->cardio_other,true);
		$criteria->compare('res_breath',$this->res_breath,true);
		$criteria->compare('res_other',$this->res_other,true);
		$criteria->compare('abdomen_liver',$this->abdomen_liver,true);
		$criteria->compare('abdomen_spleen',$this->abdomen_spleen,true);
		$criteria->compare('abdomen_swelling',$this->abdomen_swelling,true);
		$criteria->compare('abdomen_lymph',$this->abdomen_lymph,true);
		$criteria->compare('abdomen_rectal',$this->abdomen_rectal,true);
		$criteria->compare('nerv_mental',$this->nerv_mental,true);
		$criteria->compare('nerv_speech',$this->nerv_speech,true);
		$criteria->compare('nerv_cognitive',$this->nerv_cognitive,true);
		$criteria->compare('nerv_size',$this->nerv_size,true);
		$criteria->compare('nerv_motor',$this->nerv_motor,true);
		$criteria->compare('nerv_sensor',$this->nerv_sensor,true);
		$criteria->compare('nerv_reflex',$this->nerv_reflex,true);
		$criteria->compare('gen_kidney',$this->gen_kidney,true);
		$criteria->compare('gen_discharge',$this->gen_discharge,true);
		$criteria->compare('gen_sores',$this->gen_sores,true);
		$criteria->compare('comment_gen',$this->comment_gen,true);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('disable',$this->disable,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Doctorexam the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
