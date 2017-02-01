<?php
$baseUrl = Yii::app()->baseUrl;
?>
<h3 class="ui  top attached header">
<!--    [ แสดง <?= $display_length ?> ชิ้น ต่อ 1 หน้า จากข้อมูลทั้งหมด <?= $total_length ?> ชิ้น ]-->
    [ แสดง  <?= $total_length ?> ชิ้น ]
</h3>
<div class="ui attached segment orange">
    <div class="ui active inverted dimmer domLoading">
        <div class="ui large text loader">Loading</div>
    </div>
    <?php if (count($listSacredObject) == 0) { ?>
        <div class="ui warning message">
            <i class="close icon"></i>
            <div class="header">
                ไม่พบข้อมูล
            </div>
            ผลการค้นหาไม่พบข้อมูลจากเงื่อนไขการค้นหา
        </div>
    <?php } else { ?>
        <div class="ui special three cards stackable" id="boxPraKreung">
            <?php foreach ($listSacredObject as $index => $object) { ?>
                <div class="card orange">
                    <div class="content">                                    
                        <span class="header"><i class="heartbeat icon small"></i> <?= $object->obj_name; ?></span>
                    </div>
                    <div class="blurring dimmable image ">
                        <div class="ui dimmer">
                            <div class="content">
                                <div class="center">
                                    <a href="<?= Yii::app()->createUrl('site/detail/' . $object->obj_id) ?>" target="_blank"
                                       class="ui button inverted orange" style="font-size: 1.1em;font-weight: bold">
                                        <i class="fa fa-share-square-o"></i> รายละเอียด...
                                    </a>
                                </div>
                            </div>
                        </div>
                        <img class="transition visible" style="max-height:300px;"
                             src="<?= $baseUrl . '/images' . $object->obj_img ?>"  
                             data-src="<?= $baseUrl . '/images' . $object->obj_img ?>">
                    </div>
                    <div class="content">
                        <a class="header">ราคา <?= $object->obj_price ?> บาท </a>
                        <div class="meta">
                            <span class="date"><?= date("d/m/Y H:m", strtotime($object->obj_updatedate)) ?></span>
                        </div>
                        <div class="description">
                            ต้นกำเนิดอยู่ที่จังหวัด <?= $object->province->pro_name_th ?>
                        </div>
                        <div class="description">
                            ประเภท <?= $object->type->type_name ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="ui large centered inline text loader">
                Adding more content...
            </div>
        </div>
    <?php } ?>

</div>
<!--<div class="ui attached segment orange">
    <div class="ui pagination menu">
        <a class="active item">
            1
        </a>
        <div class="disabled item">
            ...
        </div>
        <a class="item">
            10
        </a>
        <a class="item">
            11
        </a>
        <a class="item">
            12
        </a>
    </div>
</div>-->
