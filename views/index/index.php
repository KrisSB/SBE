<div id="hero-image">
    <a href="http://shadowbaneemulator.com/forum/viewtopic.php?f=7&t=24940"><img src="views/index/images/headercombined.png" /></a>
</div>
<div id="content">
    <div id="media">
        <div id="media-left" class="media-col">
            <div class="title">
                Media
            </div>
            <div class="media-content">

            </div>
        </div>
        <div id="media-center" class="media-col">
            <div class="title">
                Features
            </div>
            <div class="media-content">
                Complete open-world pvp robust skill-based combat fully customizable player cities lead a siege on your rival's city
            </div>
        </div>
        <div id="media-right" class="media-col">
            <div class="title">
                Social Media
            </div>
            <div class="media-content">
                <a href="<?php echo FACEBOOK ?>"><img src="<?php echo URL ?>public/images/socMedia/fb.png" /></a>
                <a href="<?php echo YOUTUBE ?>"><img src="<?php echo URL ?>public/images/socMedia/youtube.png" /></a>
                <a href="<?php echo TWITTER ?>"><img src="<?php echo URL ?>public/images/socMedia/twitter.png" /></a>
            </div>
        </div>
    </div>
    <div id="leftCol">
        <div class="title">
            Announcements
        </div>
        <div id="news">
            <?php
                require "articles.php";
            ?>
        </div>
        <div id="pagination">
            <?php
                require "pagination.php";
            ?>
        </div>
    </div>
</div>