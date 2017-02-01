<div class="areaSacredFilter ui sticky">
    <h5 class="ui top attached header">
        ค้นหาพระยอดนิยมทั่วภาคตะวันออก
    </h5>
    <div class="ui attached segment orange">
        <div class="ui icon input fluid">
            <input placeholder="Search..." type="text" id="freeSearch" placeholder="กรอกข้อมูลเพื่อค้นหา" name="freeSearch">
            <i class="circular search link icon" id="btnSubmit"></i>
        </div>
    </div>



    <h5 class="ui top attached header">
        จังหวัด
    </h5>
    <div class="ui attached segment orange">
        <div class="ui styled fluid box-province">
            <?php
            foreach ($listProvinceEast as $key => $province) {
                ?>
                <div class="field">
                    <div class="ui checkbox">
                        <input name="province<?= $province->pro_id ?>" value="<?= $province->pro_id ?>" type="checkbox">
                        <label><?= $province->pro_name_th ?></label>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <h5 class="ui top attached header">
        ประเภทวัตถุมงคล
    </h5>
    <div class="ui attached segment orange box-sacredType">
        <div class="ui form">
            <div class="grouped fields">
                <?php foreach ($listSacredType as $index => $type) { ?>
                    <div class="field">
                        <div class="ui checkbox">
                            <input name="type<?= $type['type_id'] ?>" value="<?= $type['type_id'] ?>" type="checkbox">
                            <label><?= $type['type_name'] ?></label>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


    <h5 class="ui top attached header">
        พระเครื่องมาใหม่
    </h5>
    <div class="ui attached segment orange">
        <div class="ui middle aligned divided list">
            <?php foreach ($listSacredObjectLastInsert as $index => $objectLast) { ?>
                <a class="item" href="<?= Yii::app()->createUrl('site/detail/' . $objectLast->obj_id) ?>" target="_blank">                
                    <i class="eye icon"></i>
                    <div class="content">
                        <div class="header"><?= $objectLast->obj_name ?></div>
                        <?= $objectLast->obj_updatedate ?>
                    </div>
                </a>
            <?php } ?>

        </div>
    </div>

    <h5 class="ui top attached header">
        สมาชิกมาใหม่
    </h5>
    <div class="ui attached segment orange box-users">
        <div class="ui middle aligned divided list">
            <?php foreach ($listMemberLastInsert as $index => $objectLast) { ?>
                <a class="item" data-userid="<?= $objectLast->mem_id ?>" href="javascript:void(0)">                
                    <i class="eye icon"></i>
                    <div class="content">
                        <div class="header"><?= empty($objectLast->mem_fname) ? $objectLast->mem_username : $objectLast->mem_fname ?></div>
                        <?= $objectLast->mem_updatedate ?>
                    </div>
                </a>
            <?php } ?>

        </div>
    </div>

    <h5 class="ui top attached header">
        ติดตาม Facebbok Fanpage
    </h5>
    <div class="ui attached segment orange">
        <div class="fb-page" data-href="https://www.facebook.com/pranewy0dniy0m/" data-tabs="timeline" data-width="300" data-height="600" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"></div>
    </div>
    <div id="fb-root"></div>
	
	<!-- adsence -->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- pranew-menu-right -->
	<ins class="adsbygoogle"
		 style="display:inline-block;width:300px;height:600px"
		 data-ad-client="ca-pub-6602997930398820"
		 data-ad-slot="3874828396"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        refreshSpecialLazyLoadCard();
        handleRightSidebarFilter();
        loadContentLazySacreds();
        $('.accordion').accordion({});
    });
    function refreshSpecialLazyLoadCard() {
        $('.cards .card .image img').visibility({
            type: 'image',
            transition: 'pulse',
            reverse: true,
            interval: 200,
            duration: 1000,
        });
        $('.special.cards .image').dimmer({
            on: 'hover'
        });
    }
    function handleRightSidebarFilter() {
        var param = {};
        $('.areaSacredFilter').on('click', '.box-sacredType input[type="checkbox"]', function () {
            var typesStatus = $(this).attr('checked');
            var typesValue = $(this).val();
            param = {checked: 'unchecked', value: typesValue, group: 'TYPE'};
            if (typesStatus) {
                param.checked = 'checked';
            }
            $.post('<?= Yii::app()->createUrl('Helper/CollectionCriteria') ?>', param, function (data) {
                renderRightSidebarFilterCriteria(data);
            }, 'json');
        }).on('click', '.box-province input[type="checkbox"]', function () {
            var typesStatus = $(this).attr('checked');
            var typesValue = $(this).val();
            param = {checked: 'unchecked', value: typesValue, group: 'REGION'};
            if (typesStatus) {
                param.checked = 'checked';
            }
            $.post('<?= Yii::app()->createUrl('Helper/CollectionCriteria') ?>', param, function (data) {
                renderRightSidebarFilterCriteria(data);
            }, 'json');
        }).on('click', '.box-users a', function () {
            $('.box-users a.item').removeClass('button');
            var elementItem = this;
            var userId = $(this).attr('data-userid');
            $.post('<?= Yii::app()->createUrl('Helper/CollectionCriteria') ?>', {
                user: userId
            }, function (data) {
                $(elementItem).addClass('ui').addClass('orange').addClass('button')
                renderRightSidebarFilterCriteria(data);
            }, 'json');
        }).on('click', '#btnSubmit', function () {
            $('.box-users a.item').removeClass('button');
            $.post('<?= Yii::app()->createUrl('Helper/CollectionCriteria') ?>', {
                freeSearch: $('#freeSearch').val()
            }, function (data) {
                renderRightSidebarFilterCriteria(data);
            }, 'json');
        });
    }
    function renderRightSidebarFilterCriteria(resSessionCriteria) {
        // {"form":{
        // "price_begin":"","price_end":"","born_begin":"","born_end":"","freedom":""
        // },
        // "types":[],
        // "region":{"62":62}}
        console.log(resSessionCriteria);
        var arrTypes = resSessionCriteria.types;
        var arrRegion = resSessionCriteria.region;
        $('.box-sacredType input[type="checkbox"]').removeAttr('checked');
        $('.box-province input[type="checkbox"]').removeAttr('checked');
        $.each(arrTypes, function (index, type) {
            $('input[name="type' + index + '"]').attr('checked', 'checked');
        });
        $.each(arrRegion, function (index, province) {
            $('input[name="province' + index + '"]').attr('checked', 'checked');
        });
        loadContentLazySacreds();
    }
    function loadContentLazySacreds() {
        $.ajax({
            url: '<?= Yii::app()->createUrl('Site/RenderHtmlSacred') ?>',
            data: {},
            type: 'post',
            dataType: 'html',
            beforeSend: function (xhr) {
                $('.domLoading').addClass('active');
            },
            success: function (dataHtml) {
                $('#areaLoadContent').html(dataHtml);
                refreshSpecialLazyLoadCard();
            }
        }).done(function () {
            $('.domLoading').removeClass('active');
        });
    }
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.5&appId=375551315815765";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

</script>