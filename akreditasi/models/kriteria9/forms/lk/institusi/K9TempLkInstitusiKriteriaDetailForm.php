<?php


namespace akreditasi\models\kriteria9\forms\lk\institusi;


use Carbon\Carbon;
use common\helpers\kriteria9\K9InstitusiDirectoryHelper;
use yii\base\Model;

class K9TempLkInstitusiKriteriaDetailForm extends Model
{
    public $kodeDokumen;
    public $namaDokumen;
    public $isiDokumen;
    public $jenisDokumen;

    private $_dokumenLk;

    public function rules(): array
    {
        return [
            ['isiDokumen','file','skipOnEmpty' => false],
            [['kodeDokumen', 'namaDokumen','jenisDokumen'],'string',],
            [['kodeDokumen', 'namaDokumen','jenisDokumen'],'required']
        ];
    }

    public function uploadTemplate($id, $kriteria){

        if ($this->validate()){

            $detailClass = 'common\\models\\kriteria9\\lk\\institusi\\K9LkInstitusiKriteria'.$kriteria.'Detail';
            $this->_dokumenLk = new $detailClass;

            $carbon = Carbon::now('Asia/Jakarta');
            $tgl = $carbon->format('U');

            $fileName = $this->isiDokumen->getBaseName().'-'.$this->jenisDokumen.'-'.$tgl.'.'.$this->isiDokumen->getExtension();

            $detailAttr = 'id_lk_institusi_kriteria'.$kriteria;
            $this->_dokumenLk->$detailAttr = $id;
            $this->_dokumenLk->nama_dokumen = $this->namaDokumen;
            $this->_dokumenLk->isi_dokumen = $fileName;
            $this->_dokumenLk->kode_dokumen = $this->kodeDokumen;
            $this->_dokumenLk->bentuk_dokumen = $this->isiDokumen->getExtension();
            $this->_dokumenLk->jenis_dokumen = $this->jenisDokumen;

            $lkAttr = 'lkInstitusiKriteria'.$kriteria;
            $path = K9InstitusiDirectoryHelper::getDokumenLkPath($this->_dokumenLk->$lkAttr->lkInstitusi->akreditasiInstitusi);

            $this->isiDokumen->saveAs("$path/$fileName");
            $this->_dokumenLk->save(false);

            return true;
        }

        return false;
    }
}