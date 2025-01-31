<?php

use yii\bootstrap4\Html;

?>
<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <?= \yii\bootstrap4\Html::a(Html::img(Yii::getAlias('@web/media/logos/logo_sistem_uin.png'), ['alt' => 'logo', 'width' => 200, 'height' => 30]), ['site/index']) ?>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler">
            <span></span></button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                    class="flaticon-more"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->