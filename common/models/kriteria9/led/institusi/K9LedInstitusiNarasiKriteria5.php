<?php

namespace common\models\kriteria9\led\institusi;

use common\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "k9_led_institusi_narasi_kriteria5".
 *
 * @property int $id
 * @property int $id_led_institusi_kriteria5
 * @property string $_5_1
 * @property string $_5_2
 * @property string $_5_3
 * @property string $_5_4
 * @property string $_5_5
 * @property string $_5_6
 * @property string $_5_7
 * @property string $_5_8
 * @property string $_5_9
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property K9LedInstitusiKriteria5 $ledInstitusiKriteria5
 */
class K9LedInstitusiNarasiKriteria5 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'k9_led_institusi_narasi_kriteria5';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_led_institusi_kriteria5', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['_5_1', '_5_2', '_5_3', '_5_4', '_5_5', '_5_6', '_5_7', '_5_8', '_5_9'], 'string'],
            [['progress'], 'number'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['id_led_institusi_kriteria5'], 'exist', 'skipOnError' => true, 'targetClass' => K9LedInstitusiKriteria5::className(), 'targetAttribute' => ['id_led_institusi_kriteria5' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_led_institusi_kriteria5' => 'Id Led Institusi Kriteria5',
            '_5_1' => '5 1',
            '_5_2' => '5 2',
            '_5_3' => '5 3',
            '_5_4' => '5 4',
            '_5_5' => '5 5',
            '_5_6' => '5 6',
            '_5_7' => '5 7',
            '_5_8' => '5 8',
            '_5_9' => '5 9',
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLedInstitusiKriteria5()
    {
        return $this->hasOne(K9LedInstitusiKriteria5::className(), ['id' => 'id_led_institusi_kriteria5']);
    }
}
