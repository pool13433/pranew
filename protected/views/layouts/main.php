<?php
$baseUrl = Yii::app()->baseUrl;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="พระเครื่องใหม่ยอดนิยม">
        <meta name="language" content="th">
        <meta http-equiv="content-language" content="th" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="revisit-after" content="7 days"/>
        <meta name="Copyright" content="Copyright 2016 www.pranew.com" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="-1" />
        <meta name="robots" content="index,follow" />
        <meta content="IE=8" http-equiv="X-UA-Compatible" />
        <!-- Semantic UI CSS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/semantic/semantic.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/dropzone/dropzone.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/datatables/dataTables.semanticui.min.css" rel="stylesheet">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <style type="text/css">
            @font-face {
                font-family: 'TH-Dan-Vi-Vek';
                src: url('webfont.eot'); /* IE9 Compat Modes */
                src: url('<?php echo Yii::app()->request->baseUrl; ?>/fonts/TH-Dan-Vi-Vek/TH Dan Vi Vek ver 1.03.ttf') format('truetype');
            }            
            @font-face {
                font-family: 'Supermarket';
                src: url('webfont.eot'); /* IE9 Compat Modes */
                src: url('<?php echo Yii::app()->request->baseUrl; ?>/fonts/supermarket-1-1/supermarket.ttf') format('truetype');
            }       
            body * {
                font-family: 'Supermarket';
                font-size: 1.02em;
            }
        </style>

    </head>

    <body>
        <div class="ui grid">
            <div class="computer tablet only row">
                <?php $this->renderPartial('/navbar-top') ?>
            </div>
            <div class="mobile only row">
                <?php $this->renderPartial('/sidebar-left') ?>                
            </div>
        </div>

        <div class="pusher" style="margin-top: 60px;">
            <div class="ui container">                
                <?php echo $content; ?>
            </div>
        </div> 
        <?php //$this->renderPartial('/footer') ?>
        <?php
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile($baseUrl . '/js/jquery-1.8.3.min.js');
        $cs->registerScriptFile($baseUrl . '/js/jquery.cookie.js');
        $cs->registerScriptFile($baseUrl . '/semantic/semantic.min.js');
        $cs->registerScriptFile($baseUrl . '/js/elevatezoom/jquery.elevatezoom.js');
        $cs->registerScriptFile($baseUrl . '/js/dropzone/dropzone.min.js');
        $cs->registerScriptFile($baseUrl . '/js/datatables/jquery.dataTables.min.js');
        $cs->registerScriptFile($baseUrl . '/js/datatables/dataTables.semanticui.min.js');        
        $cs->registerScriptFile($baseUrl . '/js/prakreung-core.js');
        ?>
    </body>
</html>
