<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\kriteria9\akreditasi\K9Akreditasi */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Akreditasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">

        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="flaticon2-list-3"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        <?= Html::encode($this->title) ?>
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">


                            <?= Html::a('<i class=flaticon2-edit></i> Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-warning btn-elevate btn-elevate-air']) ?>
                            <?= Html::a('<i class=flaticon2-delete></i> Hapus', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-elevate btn-elevate-air',
                            'data' => [
                            'confirm' => 'Apakah anda ingin menghapus item ini?',
                            'method' => 'post',
                            ],
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="k9-akreditasi-view">


                    <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                                'id',
            'nama',
            'tahun',
            'jenis_akreditasi',
            'lembaga',
            'created_at:datetime',
            'updated_at:datetime',
                    ],
                    ]) ?>

                </div>
            </div>
        </div>
        <!--end::Portlet-->

    </div>
</div>



