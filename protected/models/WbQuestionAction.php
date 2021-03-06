<?php

/**
 * This is the model class for table "wb_question_action".
 *
 * The followings are the available columns in table 'wb_question_action':
 * @property integer $act_id
 * @property integer $act_like
 * @property integer $ques_id
 * @property integer $mem_id
 * @property integer $act_updatedate
 */
class WbQuestionAction extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'wb_question_action';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ques_id, mem_id, act_updatedate', 'required'),
            array('act_like, ques_id, mem_id, act_updatedate', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('act_id, act_like, ques_id, mem_id, act_updatedate', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            //'member' => array(self::BELONGS_TO, 'Member', 'mem_id'),
            //'question' => array(self::BELONGS_TO, 'WbQuestion', 'ques_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'act_id' => 'Act',
            'act_like' => 'Act Like',
            'ques_id' => 'Ques',
            'mem_id' => 'Mem',
            'act_updatedate' => 'Act Updatedate',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('act_id', $this->act_id);
        $criteria->compare('act_like', $this->act_like);
        $criteria->compare('ques_id', $this->ques_id);
        $criteria->compare('mem_id', $this->mem_id);
        $criteria->compare('act_updatedate', $this->act_updatedate);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return WbQuestionAction the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
