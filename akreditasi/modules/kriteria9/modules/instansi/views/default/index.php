<?php

use common\models\FakultasAkademi;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $modelFakultas FakultasAkademi */

$this->title = 'Institusi';
$this->params['breadcrumbs'][] = ['label'=>'Beranda','url'=>['/site/index']];
$this->params['breadcrumbs'][] = ['label'=>'9 Kriteria','url'=>['/kriteria9/default/index']];
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="kt-portlet">
    <div class="kt-space-30"></div>
    <h1 class="text-center">IAIN Padangsidimpuan</h1>

    <div class="text-center" style="margin-top: 30px">
        <img src="<?= Yii::getAlias('@web/upload/struktur.png') ?>">
    </div>
    <div class="text-center" style="margin-top: 10px">
        <img src="<?= Yii::getAlias('@web/upload/struktur2.png') ?>">
    </div>
    <div class="text-center" style="margin-top: 20px">
        <img src="<?= Yii::getAlias('@web/upload/struktur3.png') ?>">
    </div>

</div>

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Profil Institusi
            </h3>
        </div>
    </div>

    <div class="kt-portlet__body">
        <div class="kt-section kt-section--first" style="margin-bottom: 0;">

            <div class="clearfix"></div>
            <h4>Fakultas Akademi</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Dekan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach ($modelFakultas as $value): ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $value['kode'] ?></td>
                                    <td><?= $value['nama'] ?></td>
                                    <td><?= $value['dekan'] ?></td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
