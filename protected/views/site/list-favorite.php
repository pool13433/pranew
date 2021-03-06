<?php
$baseUrl = Yii::app()->baseUrl;
?>
<div class="ui grid stackable">

    <div class="sixteen wide column">     
        <h2 class="ui top attached header">
            พระที่ท่านชื่นชอบ
        </h2>
        <div class="ui attached segment orange">
            <div class="ui special three cards stackable" id="boxPraKreung">
                <?php foreach ($listSacredObjectFavorite as $index => $object) { ?>                
                    <div class="card orange">
                        <div class="content">                                    
                            <span class="header"><i class="heartbeat icon small"></i> <?= $object->obj_name ?></span>
                        </div>
                        <div class="blurring dimmable image ">
                            <div class="ui dimmer">
                                <div class="content">
                                    <div class="center">
                                        <a href="<?= Yii::app()->createUrl('site/detail/' . $object->obj_id) ?>" 
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
                        <div class="extra content">
                            <div class="ui two buttons">
                                <button  type="button" class="ui button red" title="ลบออกจากพระที่ชื่นชอบ"
                                         onclick="updateMemberObjectActionFavorite(<?= $object->obj_id ?>)">
                                    <i class="fa fa-heart-o"></i>  ลบออกจากรายการโปรด
                                </button>
                                <a href="<?= Yii::app()->createUrl('site/detail/' . $object->obj_id) ?>" title="อ่านข้อมูลเพิ่มเติม..."
                                   class="ui button green">
                                    <i class="fa fa-flag"></i> อ่านต่อ...
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Co ntent End --> 
<script type="text/javascript">
    $(document).ready(function () {

    });
    function updateMemberObjectActionFavorite(id) {
        var isConfirm = confirm('ยืนยันการลบข้อมูลพระที่ชื่นชอบออก');
        if (isConfirm) {
            $.get('<?= Yii::app()->createUrl('helper/RemoveMemberObjectActionFavorite') ?>', {
                id: id,
                action: 'FAVORITE',
                value: 0
            },
                    function (response) {
                        console.log(response);
                        if (response.status) {
                            window.location.reload(true);
                        } else {
                            alert(response.message);
                        }

                    }, 'json');
        }
    }
</script>