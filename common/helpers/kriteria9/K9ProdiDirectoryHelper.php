<?php
/**
 * mutu-v2
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 */
/**
 * Class K9ProdiDirectoryHelper
 * @package common\helpers\kriteria9
 */


namespace common\helpers\kriteria9;

use common\models\kriteria9\akreditasi\K9AkreditasiProdi;
use Yii;

class K9ProdiDirectoryHelper extends K9DirectoryHelper
{
    private static function getK9ProdiPath(K9AkreditasiProdi $akreditasiProdi)
    {
        $pathData = Yii::$app->params['uploadPath'];
        $pathReplacements = [
            '{lembaga}'=> $akreditasiProdi->akreditasi->lembaga,
            '{jenis_akreditasi}'=>$akreditasiProdi->akreditasi->jenis_akreditasi,
            '{tahun}'=> $akreditasiProdi->akreditasi->tahun,
            '{level}'=>'prodi',
            '{id}'=>$akreditasiProdi->id_prodi
        ];
        return strtr($pathData, $pathReplacements);
    }

    public static function getDokumenLedPath($akreditasi)
    {

        $path = Yii::getAlias('@uploadAkreditasi');
        $documentPath = self::getK9ProdiPath($akreditasi);
        return "$path/$documentPath/led";
    }

    public static function getDokumenLedUrl($akreditasi)
    {
        $path = Yii::getAlias('@.uploadAkreditasi');
        $documentPath = self::getK9ProdiPath($akreditasi);
        return "$path/$documentPath/led";
    }

    public static function getDetailLedPath($akreditasi)
    {
        $path = Yii::getAlias('@uploadAkreditasi');
        $documentPath = self::getK9ProdiPath($akreditasi);
        return "$path/$documentPath/led";
    }

    public static function getDetailLedUrl($akreditasi)
    {
        $path = Yii::getAlias('@.uploadAkreditasi');
        $documentPath = self::getK9ProdiPath($akreditasi);
        return "$path/$documentPath/led";
    }

    public static function getDokumenLkPath($akreditasi)
    {
        $path = Yii::getAlias('@uploadAkreditasi');
        $documentPath = self::getK9ProdiPath($akreditasi);
        return "$path/$documentPath/lk";
    }

    public static function getDokumenLkUrl($akreditasi)
    {
        $path = Yii::getAlias('@.uploadAkreditasi');
        $documentPath = self::getK9ProdiPath($akreditasi);
        return "$path/$documentPath/lk";
    }

    public static function getDetailLkPath($akreditasi)
    {
        $path = Yii::getAlias('@uploadAkreditasi');
        $documentPath = self::getK9ProdiPath($akreditasi);
        return "$path/$documentPath/lk";
    }

    public static function getDetailLkUrl($akreditasi)
    {
        $path = Yii::getAlias('@.uploadAkreditasi');
        $documentPath = self::getK9ProdiPath($akreditasi);
        return "$path/$documentPath/lk";
    }

    public static function getKuantitatifPath($akreditasi)
    {
        $path = Yii::getAlias('@uploadAkreditasi');
        $documentPath = self::getK9ProdiPath($akreditasi);
        return "$path/$documentPath/matriks-kuantitatif";
    }

    public static function getKuantitatifUrl($akreditasi)
    {
        $path = Yii::getAlias('@.uploadAkreditasi');
        $documentPath = self::getK9ProdiPath($akreditasi);
        return "$path/$documentPath/matriks-kuantitatif";
    }


    public static function getTemplateLkPath()
    {
        $path = Yii::getAlias('@required');
        $pathReplacement = [
            '{borang}' => 'kriteria9',
            '{jenis_dokumen}' => 'aps',
            '{template}' => 'template',
            '{untuk}' => 'lk'

        ];
        return parent::getTemplateLk($pathReplacement);
    }
}
