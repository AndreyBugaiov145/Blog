<div class="container flex">
    <main class="details">
        <article>
            <div class="img-publication">
                <img src="<?= "/users_img/" . $publicationData['img_src'] ?>" alt="">
                <div class="data-publication flex flex-center flex-justify-center">
                    <span class="day"><?= date("d", strtotime($publicationData['created_at'])) ?></span>
                    <span class="month"><?= date("M", strtotime($publicationData['created_at'])) ?></span>
                </div>
            </div>
            <div class="content-article">
                <div class="description flex">
                    <h3><?= $publicationData['header'] ?></h3>
                    <span class="master"><?=$publicationData['user_name']?></span>
                    <span><?= $publicationData['description'] ?></span>
                </div>
                <div class="social-tags-bar flex flex-center">
                    <div class="social-bar flex flex-center">
                        <span class="send-icon"></span>
                        <a href="#"><span class="facebook-icon icon"></span></a>
                        <a href="#"><span class="twitter-icon icon"></span></a>
                        <a href="#"><span class="google-icon icon"></span></a>
                        <a href="#"><span class="pinterest-icon icon"></span></a>
                    </div>
                    <div class="tags-bar">
                        <span class="tag icon">Tag:</span>
                        <? foreach ($tagsDataArray as $tag) :?>
                            <span ><a href="/catalog/tag/<?=$tag['tag_id']?>" style="color:inherit"><?=ucfirst($tag['tags_tag']);?></a>
                            <? if(next($tagsDataArray)){echo ",";}; ?>
                            </span>
                        <? endforeach;?>
                    </div>
                </div>
            </div>
        </article>
    </main>
    <aside>
        <div class="search-field">
            <input type="text" placeholder="Search. . .">
            <div class="search-btn "><span></span></div>
        </div>
        <div class="category-aside-bar">
            <span>CATEGORY</span>
            <ul class="ul">
                <li><a href="#">Rings (268)</a></li>
                <li><a href="#">Necklaces (96)</a></li>
                <li><a href="#">Earrings (873)</a></li>
                <li><a href="#">Bracelets (622)</a></li>
                <li><a href="#">Bangles (187)</a></li>
                <li><a href="#">Beads & Charms (93))</a></li>
                <li><a href="#">Jewellery Boxes (52)</a></li>
            </ul>
        </div>
        <div class="recent-posts">
            <span>RECENT POST</span>
            <a href="#">
                <div class="flex">
                    <div class="img-post flex-justify-center flex flex-center">
                        <img src="" alt="">
                    </div>
                    <div class="short-info-post flex flex-justify-center">
                        <span class="name-post">Your Blog Title goes Here</span>
                        <span class="data-post">15 May, 2015</span>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="flex">
                    <div class="img-post flex-justify-center flex flex-center">
                        <img src="" alt="">
                    </div>
                    <div class="short-info-post flex flex-justify-center">
                        <span class="name-post">Your Blog Title goes Here</span>
                        <span class="data-post">15 May, 2015</span>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="flex">
                    <div class="img-post flex-justify-center flex flex-center">
                        <img src="" alt="">
                    </div>
                    <div class="short-info-post flex flex-justify-center">
                        <span class="name-post">Your Blog Title goes Here</span>
                        <span class="data-post">15 May, 2015</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="seel-posts">
            <span>ON SELL</span>
            <a href="#">
                <div class="flex">
                    <div class="img-post flex-justify-center flex flex-center">
                        <img src="" alt="">
                    </div>
                    <div class="short-info-post flex flex-justify-center">
                        <span class="name-post">Diamond Engagement Ring</span>
                        <span class="price-post">$520</span>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="flex">
                    <div class="img-post flex-justify-center flex flex-center">
                        <img src="" alt="">
                    </div>
                    <div class="short-info-post flex flex-justify-center">
                        <span class="name-post">Diamond Engagement Ring</span>
                        <span class="price-post">$520</span>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="flex">
                    <div class="img-post flex-justify-center flex flex-center">
                        <img src="" alt="">
                    </div>
                    <div class="short-info-post flex flex-justify-center">
                        <span class="name-post">Diamond Engagement Ring</span>
                        <span class="price-post">$520</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="aside-logotip flex flex-center">
            <div class="flex flex-center flex-justify-center">
                <span class="classic">Classic</span>
                <span class="classic-latest-watch">MEN’S WATCH</span>
                <div class="block-shop-btn flex-justify-center flex flex-center">
                    <span>SHOP NOW</span>
                </div>
            </div>
        </div>
    </aside>
</div>

