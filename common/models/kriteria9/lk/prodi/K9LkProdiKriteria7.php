<?php

namespace common\models\kriteria9\lk\prodi;

use common\helpers\kriteria9\K9ProdiProgressHelper;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "k9_lk_prodi_kriteria7".
 *
 * @property int $id
 * @property int $id_lk_prodi
 * @property string $_7
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property K9LkProdi $lkProdi
 * @property K9LkProdiKriteria7Detail[] $k9LkProdiKriteria7Details
 */
class K9LkProdiKriteria7 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'k9_lk_prodi_kriteria7';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_lk_prodi', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['_7'], 'string'],
            [['id_lk_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => K9LkProdi::className(), 'targetAttribute' => ['id_lk_prodi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_lk_prodi' => 'Id Lk Prodi',
            '_7' => '7',
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLkProdi()
    {
        return $this->hasOne(K9LkProdi::className(), ['id' => 'id_lk_prodi']);
    }

    public function updateProgress()
    {
        $dokumen = K9ProdiProgressHelper::getDokumenLkProgress($this->id_lk_prodi, $this->getK9LkProdiKriteria7Details(), 7);

        $progress = round(($dokumen) / 1, 2);
        $this->progress = $progress;
        $this->save(false);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkProdiKriteria7Details()
    {
        return $this->hasMany(K9LkProdiKriteria7Detail::className(), ['id_lk_prodi_kriteria7' => 'id']);
    }
}
