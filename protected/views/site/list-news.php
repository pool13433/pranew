<div class="ui grid stackable">

    <div class="sixteen wide column">     
        <h3 class="ui  top attached header">
            ข่าวสารเกี่ยวกับพระเครื่อง
        </h3>
        <div class="ui attached segment orange">
            <div class="ui items">
                <?php foreach ($listSacredNews as $key => $news) { ?>
                    <div class="item">
                        <div class="image">
                            <img src="/images/wireframe/image.png">
                        </div>
                        <div class="content">
                            <a class="header"><?= $news->news_title ?></a>
                            <div class="meta">
                                <span><?= $news->news_updatedate ?></span>
                            </div>
                            <div class="description">
                                <span><?= $news->news_detail ?></span>
                            </div>
                            <div class="extra">
                                <a href="<?= Yii::app()->createUrl('site/newsdetail/' . $news->news_id) ?>" class="ui right floated button blue">
                                    อ่านต่อ...
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</div>
