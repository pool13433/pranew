<?php
$baseUrl = Yii::app()->baseUrl;
?>
<div class="ui grid stackable">
	
	<!-- adsence-->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- pranew-top -->
	<ins class="adsbygoogle"
		 style="display:inline-block;width:728px;height:90px"
		 data-ad-client="ca-pub-6602997930398820"
		 data-ad-slot="9921361990"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	
    <div class="twelve wide column ui content" id="areaLoadContent"></div>

    <div class="four wide column ui rail">
        <?php
        $this->renderPartial('/sidebar_right', array(
            'listSacredObjectLastInsert' => $listSacredObjectLastInsert,
            'listSacredType' => $listSacredType,
            'listMemberLastInsert' => $listMemberLastInsert,
            'listProvinceEast' => $listProvinceEast
        ))
        ?>
    </div>
</div>
