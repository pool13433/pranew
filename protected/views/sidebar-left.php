<?php
$baseUrl = Yii::app()->baseUrl;
$finalUrl = Yii::app()->getBaseUrl(true).'/site/login';
//$finalUrl = str_replace("//", "//www.", Yii::app()->getBaseUrl(true)) . '/site/login';
//$finalUrl = str_replace('www.www.', 'www.', $finalUrl);
?>
<div class="ui left vertical inverted orange sidebar labeled icon menu sidebar-toggle-close" data-visible="close">
    <div class="item" id="hide-sidebar">
        <i class="remove icon"></i>
    </div>
    <a class="item" href="<?= Yii::app()->createUrl('site/index') ?>">
        <i class="home icon"></i>
        สุดยอดพระเครื่อง
    </a>
    <a class="item" href="<?= Yii::app()->createUrl('site/news') ?>">
        <i class="sitemap icon"></i>
        ข่าวสารเกี่ยวกับพระเครื่อง
    </a>
    <a class="item" href="<?= Yii::app()->createUrl('site/upload') ?>">
        <i class="chart icon"></i>
        อยากปล่อยเช่า
    </a>
    <a class="item">
        <i class="smile icon"></i>
        อื่น ๆ
    </a>
</div>

<div class="ui fixed inverted orange main menu" >
    <div class="ui container">
        <a class="launch icon item sidebar-toggle">
            <i class="content icon"></i>
        </a>
        <div class="item">
            สุดยอดพระเครื่อง
        </div>
        <div class="right menu">
            <a href="<?= $finalUrl ?>" class="item">
                <i class="sign in icon"></i>
                เข้าระบบ
            </a>         
            <a href="<?= Yii::app()->createUrl('site/rules') ?>" class="item">
                <i class="add user icon"></i> ลงทะเบียน
            </a>
        </div>
    </div>
</div>