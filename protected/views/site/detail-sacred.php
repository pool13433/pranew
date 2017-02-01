<?php
$baseUrl = Yii::app()->baseUrl;
?>
<div class="ui grid stackable">
    <div class="sixteen wide column">
        <div class="ui clearing segment attached top">
            <div class="ui right floated header toolbar">
                <div class="fb-like btn" data-href="<?= Yii::app()->request->url ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                <?php 
                $color = '';
                if($objectAction['act_favorite'] == '1'){
                    $color = 'red';
                }
                ?>
                <button class="ui basic image label button-favorite <?=$color?>" data-status="<?=$objectAction['act_favorite']?>">
                    <i class="heartbeat icon"></i>
                    โปรดปราน
                </button>
<!--                <span class="ui basic image label button-like">
                    <i class="thumbs outline up icon"></i>
                    Joe
                </span>-->
            </div>
            <h3 class="ui left floated header tiny">
                <div class="ui huge breadcrumb">
                    <a class="section" href="/site/index">หน้าแรก สุดยอดพระเครื่อง</a>
                    <i class="right angle icon divider"></i>
                    <div class="active section"> รายละเอียดพระเครื่อง</div>
                </div>
            </h3>
        </div>
        <div class="ui attached segment orange">
            <div class="ui grid">
                <div class="ten wide column">
                    <img id="img_zoom" class="ui image large image-main zoom" 
                         data-zoom-image="<?= $baseUrl . '/images/' . $sacredObject->obj_img ?>"
                         data-original="<?= $baseUrl . '/images/' . $sacredObject->obj_img ?>"
                         src="<?= $baseUrl . '/images/' . $sacredObject->obj_img ?>"/> 
                </div>
                <div class="six wide column">
                    <div class="ui small images albumImage" style="cursor: pointer;">
                        <img id="img_zoom" class="ui image image-other" 
                             data-original="<?= $baseUrl . '/images/' . $sacredObject->obj_img ?>"
                             src="<?= $baseUrl . '/images/' . $sacredObject->obj_img ?>"/> 
                             <?php foreach ($listSacredObjectImg as $index => $img) { ?>
                            <img class="ui image image-other"
                                 data-zoom-image="<?= $baseUrl . '/images/' . $img->img_name ?>"
                                 src="<?= $baseUrl . '/images/' . $img->img_name ?>"
                                 data-src="<?= $baseUrl . '/images/' . $img->img_name ?>"/> 
                             <?php } ?>
                    </div>
                </div>
            </div>
        </div>
		
		<!-- adsence -->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- pranew-middle -->
		<ins class="adsbygoogle"
			 style="display:inline-block;width:728px;height:90px"
			 data-ad-client="ca-pub-6602997930398820"
			 data-ad-slot="9781761197"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		
		
        <h2 class="ui top attached header">
            รายละเอียด / ติดต่อสอบถาม
        </h2>
        <div class="ui attached segment orange">
            <div class="ui stackable two column grid">
                <div class="column">            
                    <h5 class="ui top attached header">
                        <i class="list icon"></i> รายละเอียด
                    </h5>
                    <div class="ui attached segment">
                        <div class="ui list huge">
                            <div class="item">
                                <div class="header">ชื่อ</div>             
                                <?= $sacredObject->obj_name ?>
                            </div>
                            <div class="item">
                                <div class="header">ราคา</div>
                                <?= $sacredObject->obj_price ?> บาท
                            </div>
                            <div class="item">
                                <div class="header">สร้างเมื่อ</div>
                                <?= $sacredObject->obj_born ?>
                            </div>
                            <div class="item">
                                <div class="header">ประเภท</div>
                                <?= $sacredObject->type->type_name ?>
                            </div>
                            <div class="item">
                                <div class="header">ต้นกำเนิดอยู่ที่จังหวัด</div>
                                <?= $sacredObject->province->pro_name_th ?>
                            </div>
                            <div class="item">
                                <div class="header">สถานที่รับของ</div>
                                <?= $sacredObject->obj_location ?>
                            </div>
                            <div class="item">
                                <div class="header">อธิบายเพิ่มเติม</div>
                                <?= $sacredObject->obj_comment ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <h5 class="ui top attached header">
                        <i class="phone icon"></i> ติดต่อสอบถาม
                    </h5>
                    <div class="ui attached segment">
                        <div class="ui list huge">
                            <div class="item">
                                <div class="header">ชื่อเจ้าของ</div>             
                                <?= (empty($sacredObject->member) ? '<label class="label label-warnning">ไม่พบผู้ปล่อยเช่าในระบบ</label>' : $sacredObject->member->mem_fname . '   ' . $sacredObject->member->mem_lname) ?>
                            </div>
                            <div class="item">
                                <div class="header">โทรศัพท์</div>  
                                <?= $sacredObject->member->mem_phone ?>
                            </div>
                            <div class="item">
                                <div class="header">อีเมลล์</div>  
                                <?= $sacredObject->member->mem_email ?>
                            </div>
                        </div>
						
						<!-- adsence-->
						
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- pranew-middle-small -->
						<ins class="adsbygoogle"
							 style="display:inline-block;width:320px;height:100px"
							 data-ad-client="ca-pub-6602997930398820"
							 data-ad-slot="5211960798"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
						
                    </div>
                </div>
            </div>

        </div>

        <h2 class="ui top attached header">
            พระเครื่องที่เกี่ยวข้องของผู้ขายท่านนี้
        </h2>
        <div class="ui attached segment orange">
            <div class="ui special three cards">
                <?php foreach ($listSacredObjectRelate as $index => $object) { ?>
                    <div class="card orange">
                        <div class="content">                                    
                            <span class="header"><i class="heartbeat icon small"></i> <?= $object->obj_name; ?></span>
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
                    </div>
                <?php } ?>
            </div>
        </div>

        <h2 class="ui top attached header">
            แสดงความคิดเห็น
        </h2>
        <div class="ui attached segment orange">
            <div class="ui comments">
                <h3 class="ui dividing header">ข้อความคิดเห็น</h3>
                <form class="ui reply form">
                    <div class="field">
                        <textarea></textarea>
                    </div>
                    <div class="ui blue labeled submit icon button">
                        <i class="icon edit"></i> แสดงความคิดเห็น
                    </div>
                </form>
                <?php foreach ($listCommentQuestion as $index => $question) { ?>
                    <div class="comment">
                        <a class="avatar">
                            <img src="/images/avatar/small/matt.jpg">
                        </a>
                        <div class="content">
                            <a class="author"><?= $question['mem_fname'] ?></a>
                            <div class="metadata">
                                <span class="date"><?= $question['ques_updatedate'] ?></span>
                            </div>
                            <div class="text">
                                <?= $question['ques_message'] ?>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>

    </div>
</div>
<div id="fb-root"></div>
<script type="text/javascript">
    var imageElement = $(".zoom");
    var elevateZoomOptions = {
        zoomType: "lens",
        lensShape: "round",
        scrollZoom: true,
        lensSize: 200,
        gallery: 'albumImage',
        cursor: 'pointer',
        galleryActiveClass: 'active',
        imageCrossfade: true,
        //loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
    };

    $(function () {
        customElevateZoom();
        updatePageViewer();
        handleImages();
        handleToolbar();
    });


    function handleImages() {
        $('.images').on('click', '.image-other', function () {
            imageElement.attr('src', $(this).attr('src')).data('zoom-image', $(this).attr('src')).elevateZoom(elevateZoomOptions);
        });
        $('.special.cards .image').dimmer({
            on: 'hover'
        });
    }

    function submitPostComment(objectId) {
        var messagePost = $('#messagePost').val();
        if (messagePost != '') {
            $.post('<?= Yii::app()->createUrl('helper/PostComment') ?>', {
                id: objectId,
                message: messagePost
            }, function (response) {
                if (response.status) {
                    //window.location.reload(true);
                    cloneComment(response.comment);
                } else {
                    alert(response.message);
                    window.location.href = response.url;
                }
            }, 'json');
        } else {
            alert('กรุณากรอกข้อความแสดงความคิดเห็นก่อน');
        }
    }


    function removeElevateZoom() {
        $('.zoomContainer').remove();
        imageElement.removeData('elevateZoom');
        imageElement.removeData('zoomImage');
    }


    function customElevateZoom() {
        imageElement.elevateZoom(elevateZoomOptions);
    }

    function updatePageViewer() {
        $.get('<?= Yii::app()->createUrl('helper/UpdateSacredObjectView/' . $sacredObject->obj_id) ?>',
                {}, function (response) {
            console.log(' status ::==' + response.status);
        }, 'json');
    }


    function actionLikeComment(elementButton) {
        var element = elementButton;
        var id = $(elementButton).prop('id');
        var likeStatus = $(element).prop('name');
        var data = {
            commentId: id,
            objectId: <?= $sacredObject->obj_id ?>
        };
        if (likeStatus == '1') {
            $(element).attr('name', '0').removeClass('btn-primary');
            data.like = 0;
            $(element).attr('title', 'Like');
        } else {
            $(element).attr('name', '1').addClass('btn-primary');
            data.like = 1;
            $(element).attr('title', 'UnLike');
        }
        $.post('<?= Yii::app()->createUrl('helper/UpdateLikeComment') ?>', data, function (response) {
            if (response.status) {
                $(element).text(response.question.ques_like);
            } else {
                alert(response.message);
                window.location.href = response.url;
            }
        }, 'json');
    }
    function handleToolbar() {
        $('.toolbar').on('click', '.button-favorite', function () {
            var element = this;
            var value = $(this).attr('data-status');
            $.get('<?= Yii::app()->createUrl('helper/updateMemberObjectAction') ?>', {
                id: <?= $sacredObject->obj_id ?>,
                action: 'FAVORITE',
                value: value
            }, function (response) {
                if (response.status) {
                    if (response.action.act_favorite == '1') {
                        $(element).addClass('red');
                        $(element).attr('title', 'ไม่โปรดปราน');
                    } else {
                        $(element).removeClass('red');
                        $(element).attr('title', 'โปรดปราน');
                    }
                    $(element).attr('data-status', response.action.act_favorite);
                } else {
                    alert(response.message);
                    window.location.href = response.url;
                }
            }, 'json');
        }).on('click', '.button-like', function () {
            var element = this;
            var value = $(this).attr('name');
            $.get('<?= Yii::app()->createUrl('helper/updateMemberObjectAction') ?>', {
                id: <?= $sacredObject->obj_id ?>,
                action: 'LIKE',
                value: value,
            }, function (response) {
                if (response.status) {
                    if (response.action.act_like == '1') {
                        $(element).removeClass('btn-primary');
                        $(element).attr('title', 'ชื่นชอบ');
                    } else {
                        $(element).addClass('btn-primary');
                        $(element).attr('title', 'ไม่ชื่นชอบ');
                    }
                    $(element).attr('name', response.action.act_like);
                    $(element).find('strong').text(response.object.obj_like);
                } else {
                    alert(response.message);
                    window.location.href = response.url;
                }
            }, 'json');
        })
    }

    /*
     * ************************ Facebook Button share ************************ 
     */
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.5&appId=375551315815765";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    /*
     * ************************ Facebook Button share ************************ 
     */

</script>
