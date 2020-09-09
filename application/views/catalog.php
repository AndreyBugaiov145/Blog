<main class="grid">
    <? foreach ( $publicationData as $publication) :?>
    <article>
        <div class="img-publication">
            <img src=<?= "/users_img/".$publication['img_src']?> alt="">
            <div class="data-publication">
                <span class="day"><?= date("d", strtotime($publication['created_at']))?></span>
                <span class="month"><?= date("M", strtotime($publication['created_at']))?></span>
            </div>
        </div>
        <div class="content-article">
            <div class="description">
                <h3><?=$publication['header']?></h3>
                <span><?=$publication['short_description']?></span>
            </div>
            <div class="info-to-publication flex flex-center">
                <div class="see-more">
                    <a href="/catalog/<?=$publication['id']?>">more</a>
                </div>
                <div class="coments flex flex-center">
                    <span class="count-category-info category-coments">15 Comments</span>
                </div>
                <div class="like flex flex-center ">
                    <span class="count-category-info category-coments-likes">51 Likes</span>
                </div>
            </div>
        </div>
    </article>
    <? endforeach;?>
</main>
<div class="pagination flex-center flex">
    <span class="left-arrow icon flex-center flex"></span>
    <span class="flex flex-center">1</span>
    <span class="flex-center flex">2</span>
    <span class="flex-center flex">3</span>
    <span class="right-arrow icon flex-center flex"></span>
</div>