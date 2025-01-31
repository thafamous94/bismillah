<?php

use akreditasi\models\kriteria9\forms\lk\prodi\K9LinkLkProdiKriteriaDetailForm;
use akreditasi\models\kriteria9\forms\lk\prodi\K9LkProdiKriteriaDetailForm;
use akreditasi\models\kriteria9\forms\lk\prodi\K9TextLkProdiKriteriaDetailForm;
use akreditasi\models\kriteria9\lk\prodi\K9LkProdiNarasiKriteria1Form;
use common\helpers\FileIconHelper;
use common\models\Constants;
use common\models\kriteria9\lk\prodi\K9LkProdi;
use dosamigos\tinymce\TinyMce;
use kartik\file\FileInput;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use yii\bootstrap4\Progress;

/* @var $this yii\web\View */
/* @var $lkProdi K9LkProdi */
/* @var $modelNarasi K9LkProdiNarasiKriteria1Form */
/* @var $dataKriteria */
/* @var $poinKriteria */

$prodi = Yii::$app->request->get('prodi');
$kriteria = Yii::$app->request->get('kriteria');
$this->title = "Kriteria " . $kriteria;
$this->params['breadcrumbs'][] = ['label' => 'Beranda', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => '9 Kriteria', 'url' => ['/kriteria9/default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Program Studi', 'url' => ['/kriteria9/k9-prodi', 'prodi' => $prodi]];
$this->params['breadcrumbs'][] = ['label' => 'Isi Kriteria', 'url' => ['/kriteria9/k9-prodi/lk/isi', 'lk' => $lkProdi->id, 'prodi' => $_GET['prodi']]];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                <?= $this->title ?>

            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-actions">
                <strong>Kelengkapan Berkas &nbsp; : <?= $modelNarasi->progress; ?> %</strong>
                <div class="kt-space-10"></div>
                <?=
                Progress::widget([
                    'percent' => $modelNarasi->progress,
                    'barOptions' => ['class' => 'progress-bar-info'],
                    'options' => ['class' => 'progress-sm']
                ]);
                ?>
            </div>
        </div>
    </div>

    <div class="kt-portlet__body">
        <div class="kt-section kt-section--first" style="margin-bottom: 0;">

            <!--begin::Accordion-->
            <div class="accordion accordion-solid  accordion-toggle-arrow" id="accordionExample2">

                <?php foreach ($poinKriteria

                               as $key => $item) :
                    $modelAttribute = '_' . str_replace('.', '_', $item['tabel']); ?>

                    <div class="card">
                        <div class="card-header" id="heading<?= $key ?>">
                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse<?= $key ?>"
                                 aria-expanded="false" aria-controls="collapse<?= $key ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <i class="flaticon-file-2"></i> <?=
                                        $item['tabel'] ?>&nbsp;
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <small>&nbsp;<?= $item['isi'] ?></small>

                                    </div>
                                </div>
                            </div>

                            <div id="collapse<?= $key ?>" class="collapse" aria-labelledby="heading<?= $key ?>"
                                 data-parent="#accordionExample2" style="">
                                <div class="card-body">

                                    <div class="kt-portlet kt-portlet--mobile">
                                        <div class="kt-portlet__body">
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <?=$modelNarasi->$modelAttribute ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!--                            Tabel dokumen sumber-->
                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th colspan="3" class="text-center">Dokumen Sumber</th>
                                        </tr>
                                        </thead>
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>Kode</th>
                                            <th colspan="2">Dokumen</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach ($item['dokumen_sumber'] as $keyDoksum => $doksum) :

                                        $clear = trim($doksum['kode']);
                                        $kodeSumber = '_' . str_replace('.', '_', $clear);

                                        if (!empty($doksum['kode'])) : ?>

                                            <tr>
                                                <th scope="row"><?= $doksum['kode'] ?></th>
                                                <td>
                                                    <p style="font-size: 14px;font-weight: 400"><?= $doksum['dokumen'] ?></p>
                                                </td>

                                            </tr>


                                        <?php else :
                                            echo '<tr><td>Tidak ada dokumen</td></tr>';
                                        endif; ?>
                                        <?php

                                        $detailClass = 'common\\models\\kriteria9\\lk\\prodi\\K9LkProdiKriteria' . $kriteria . 'Detail';
                                        $detail = call_user_func($detailClass . "::find")->where(['id_lk_prodi_kriteria' . $kriteria => $modelNarasi->id]);

                                        $detail1 = $detail->andWhere(['kode_dokumen' => $doksum['kode'], 'jenis_dokumen' => Constants::SUMBER])->all();
                                        foreach ($detail1 as $k => $v) : ?>

                                            <tr>
                                                <td></td>
                                                <td>
                                                    <div class="text-center">
                                                        <?php if ($v->bentuk_dokumen != 'text' && $v->bentuk_dokumen != 'link') : ?>
                                                            <div class="icon">
                                                                <?= FileIconHelper::getIconByExtension($v->bentuk_dokumen) ?>
                                                            </div>
                                                            <div class="kt-space-5"></div>
                                                            <?= Html::a($v['isi_dokumen'] . " <i class='fa fa-external-link-alt'></i>", ['lk/lihat-dok', 'kriteria' => $kriteria, 'dok' => $v['id'], 'lk' => $_GET['lk']], ['target' => '_blank', 'data-pjax' => "0"]) ?>

                                                        <?php else :
                                                            if ($v->bentuk_dokumen == 'link') {
                                                                echo '<a href=' . $v['isi_dokumen'] . ' target="_blank">' . $v["isi_dokumen"] . ' <i class=\'fa fa-external-link-alt\'></i></a>';
                                                            } else {
                                                                echo $v['isi_dokumen'];
                                                            }
                                                        endif; ?>
                                                    </div>
                                                </td>
                                                <td class="text-right">

                                                    <?php if ($v->bentuk_dokumen != 'text' && $v->bentuk_dokumen != 'link') {
                                                        echo Html::a('<i class="la la-download"></i> &nbsp;Unduh', ['lk/download-dok', 'id' => $v['id']], ['class' => 'btn btn-warning btn-pill btn-elevate btn-elevate-air']);
                                                    } ?>


                                                    <div class="kt-space-10"></div>

                                                </td>
                                            </tr>

                                        <?php
                                        endforeach;
                                        ?>

                                        </tbody>
                                        <?php endforeach; ?>
                                    </table>

                                    <!--                            Tabel dokumen pendukung-->
                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th colspan="3" class="text-center">Dokumen Pendukung</th>
                                        </tr>
                                        </thead>
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>Kode</th>
                                            <th colspan="2">Dokumen</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach ($item['dokumen_pendukung'] as $keyDokpen => $dokpen) {
                                            $dokpenAttr = '_' . str_replace('.', '_', $dokpen['kode']);
                                            if (!empty($dokpen['kode'])) {

                                                $kodePendukung = str_replace('.', '', trim($dokpen['kode']));
                                                ?>

                                                <tr>
                                                    <th scope="row"><?= $dokpen['kode'] ?></th>
                                                    <td>
                                                        <p style="font-size: 14px;font-weight: 400"><?= $dokpen['dokumen'] ?></p>
                                                    </td>

                                                </tr>


                                            <?php } else {
                                                echo '<tr><td>Tidak ada dokumen</td></tr>';
                                            } ?>


                                            <?php
                                            $detailClass = 'common\\models\\kriteria9\\lk\\prodi\\K9LkProdiKriteria' . $kriteria . 'Detail';
                                            $detail = call_user_func($detailClass . "::find")->where(['id_lk_prodi_kriteria' . $kriteria => $modelNarasi->id]);

                                            $detail1 = $detail->andWhere(['kode_dokumen' => $dokpen['kode'], 'jenis_dokumen' => Constants::PENDUKUNG])->all();

                                            foreach ($detail1 as $k => $v) :
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <div class="text-center">
                                                            <?php if ($v->bentuk_dokumen != 'text' && $v->bentuk_dokumen != 'link') { ?>
                                                                <div class="icon">
                                                                    <?= FileIconHelper::getIconByExtension($v->bentuk_dokumen) ?>
                                                                </div>
                                                                <div class="kt-space-5"></div>
                                                                <?= Html::a($v['isi_dokumen'] . " <i class='fa fa-external-link-alt'></i>", ['lk/lihat-dok', 'standar' => $kriteria, 'dok' => $v['id'], 'lk' => $_GET['lk']], ['target' => '_blank', 'data-pjax' => "0"]) ?>

                                                            <?php } else {
                                                                if ($v->bentuk_dokumen == 'link') {
                                                                    echo '<a href=' . $v['isi_dokumen'] . ' target="_blank">' . $v["isi_dokumen"] . ' <i class=\'fa fa-external-link-alt\'></i></a>';
                                                                } else {
                                                                    echo $v['isi_dokumen'];
                                                                }
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">

                                                        <?php if ($v->bentuk_dokumen != 'text' && $v->bentuk_dokumen != 'link') {
                                                            echo Html::a('<i class="la la-download"></i> &nbsp;Unduh', ['lk/download-dok', 'id' => $v->id], ['class' => 'btn btn-pill btn-elevate btn-elevate-air btn-warning']);
                                                        } ?>

                                                        <div class="kt-space-10"></div>


                                                    </td>


                                                </tr>
                                            <?php
                                            endforeach;
                                        } ?>

                                        </tbody>
                                    </table>

                                    <!--                                Tabel dokumen lainnya-->
                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th colspan="2" class="text-left">Dokumen Lainnya</th>

                                        </tr>
                                        </thead>
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>No.</th>
                                            <th colspan="2">Dokumen</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $detailClass = 'common\\models\\kriteria9\\lk\\prodi\\K9LkProdiKriteria' . $kriteria . "Detail";
                                        $detail = call_user_func($detailClass . "::find")->where(['id_lk_prodi_kriteria' . $kriteria => $modelNarasi->id]);

                                        $detail1 = $detail->andWhere(['jenis_dokumen' => Constants::LAINNYA])->all();
                                        if (!empty($detail1)) {
                                            foreach ($detail1 as $k => $v) {
                                                if ($v['tabel'] == $v['kode_dokumen'] && $v['jenis_dokumen'] == 'lainnya') { ?>
                                                    <tr>
                                                        <td><strong><?= $k + 1 ?></strong></td>
                                                        <td>
                                                            <div class="text-center">
                                                                <?php if ($v->bentuk_dokumen != 'text' && $v->bentuk_dokumen != 'link') { ?>
                                                                    <div class="icon">
                                                                        <?= FileIconHelper::getIconByExtension($v->bentuk_dokumen) ?>
                                                                    </div>
                                                                    <div class="kt-space-5"></div>
                                                                    <?= Html::a($v['isi_dokumen'] . " <i class='fa fa-external-link-alt'></i>", ['lk/lihat-dok', 'id' => $v['id']], ['target' => '_blank', 'data-pjax' => "0"]) ?>

                                                                <?php } else {
                                                                    if ($v->bentuk_dokumen == 'link') {
                                                                        echo '<a href=' . $v['isi_dokumen'] . ' target="_blank">' . $v["isi_dokumen"] . ' <i class=\'fa fa-external-link-alt\'></i></a>';
                                                                    } else {
                                                                        echo $v['isi_dokumen'];
                                                                    }
                                                                } ?>
                                                            </div>
                                                        </td>
                                                        <td class="pull-right">
                                                            <?php if ($v->bentuk_dokumen != 'text' && $v->bentuk_dokumen != 'link') {
                                                                echo Html::a('<i class="la la-download"></i> &nbsp;Unduh', ['lk/download-dok', 'id' => $v->id], ['class' => 'btn btn-pill btn-elevate btn-elevate-air btn-warning']);
                                                            } ?>

                                                            <!--                                                <div class="kt-space-10"></div>-->

                                                        </td>
                                                    </tr>
                                                <?php }
                                            }
                                        } else {
                                            echo '<tr><td>Tidak ada dokumen</td></tr>';
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>

                <?php endforeach; ?>
                <!--end::Accordion-->
            </div>
        </div>
    </div>

