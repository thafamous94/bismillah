<?php

use common\models\Constants;
use dmstr\ajaxbutton\AjaxButton;
use dosamigos\tinymce\TinyMce;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model common\models\Profil */
/* @var $strukturModel akreditasi\models\kriteria9\forms\StrukturOrganisasiUploadForm */
?>


<div class="profil-program-studi-form">

    <?php $form = ActiveForm::begin(['id' => 'profil-prodi-form']); ?>

    <?= $form->field($model, 'visi')->widget(TinyMce::class, [
        'options' => ['rows' => 6],

        'language' => 'id',
        'clientOptions' => [

            'plugins' => [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak placeholder',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc noneditable',
            ],
            'toolbar' => 'undo redo| styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ltr rtl | link'

        ]
    ]) ?>


    <?= $form->field($model, 'misi')->widget(TinyMce::class, [
        'options' => ['rows' => 6],

        'language' => 'id',
        'clientOptions' => [

            'plugins' => [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak placeholder',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc noneditable',
            ],
            'toolbar' => 'undo redo| styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ltr rtl | link'

        ]
    ]) ?>
    <?= $form->field($model, 'tujuan')->widget(TinyMce::class, [
        'options' => ['rows' => 6],

        'language' => 'id',
        'clientOptions' => [

            'plugins' => [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak placeholder',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc noneditable',
            ],
            'toolbar' => 'undo redo| styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ltr rtl | link'

        ]
    ]) ?>
    <?= $form->field($model, 'sasaran')->widget(TinyMce::class, [
        'options' => ['rows' => 6],

        'language' => 'id',
        'clientOptions' => [

            'plugins' => [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak placeholder',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc noneditable',
            ],
            'toolbar' => 'undo redo| styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ltr rtl | link'

        ]
    ]) ?>
    <?= $form->field($model, 'motto')->widget(TinyMce::class, [
        'options' => ['rows' => 6],

        'language' => 'id',
        'clientOptions' => [

            'plugins' => [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak placeholder',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc noneditable',
            ],
            'toolbar' => 'undo redo| styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ltr rtl | link'

        ]
    ]) ?>
    <?= $form->field($model, 'sambutan')->widget(TinyMce::class, [
        'options' => ['rows' => 6],

        'language' => 'id',
        'clientOptions' => [

            'plugins' => [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak placeholder',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc noneditable',
            ],
            'toolbar' => 'undo redo| styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ltr rtl | link'

        ]
    ]) ?>
    <?php if ($model->struktur_organisasi):?>
        <div id="current-struktur">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>Berkas Struktur Organisasi Saat ini</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?=Html::img(Yii::getAlias("@.uploadStruktur/{$model->type}/{$model->struktur_organisasi}"), ['width'=>'50%'])?></td>
                    <td>
                        <?= AjaxButton::widget([
                            'id' => 'hapus-struktur-button',
                            'url' => ['profil/hapus-struktur'],
                            'method' => 'POST',
                            'content' => Yii::t('app', 'Hapus'),
                            'options' => ['class'=>'btn btn-danger btn-elevate btn-elevate-air'],
                            'params' => ['nama'=>$model->struktur_organisasi],
                            'successExpression' => new JsExpression('function(resp,status,xhr){
                            if(resp){
                                const elem = document.getElementById("current-struktur");
                                elem.parentNode.removeChild(elem);
                            }

                            }')
                        ])?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    <?php endif; ?>
    <?= $form->field($strukturModel, 'struktur')->widget(FileInput::class, [

        'pluginOptions' => [
            'theme' => 'explorer-fas',
            'maxFileSize' => Constants::MAX_UPLOAD_SIZE(),
            'allowedFileExtensions' => Constants::IMAGE_EXTENSIONS,
            'showUpload' => false,
            'previewFileType' => 'any',
            'fileActionSettings' => [
                'showZoom' => true,
                'showRemove' => false,
                'showUpload' => false,
            ],
        ]
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('<i class=\'la la-save\'></i> Simpan', ['class' => 'btn btn-pill btn-elevate btn-elevate-air btn-brand block-ui']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$jsForm = <<<JS
 $('form').on('beforeSubmit', function()
    {
        var form = $(this);
        //console.log('before submit');

        var submit = form.find(':submit');
        KTApp.block('.modal',{
            overlayColor: '#000000',
            type: 'v2',
            state: 'primary',
            message: 'Sedang Memproses...'
        });
        submit.html('<i class="flaticon2-refresh"></i> Sedang Memproses');
        submit.prop('disabled', true);

    });

JS;

$this->registerJs($jsForm);
?>
