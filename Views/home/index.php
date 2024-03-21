
    <div class="container-home">

        <div class="home-videos">


            <?php 
            
            foreach($videos as $video):
            ?>

            <div class="home-video">

                <a href="/watch?v=<?= $video->id_key ?>"><img class="img-video" src="<?= $video->UrlPic ?>" width="100%" height="100%"></a>

                <div class="home-about-video">

                    <img class="home-page-img-chanel" src="profile_pic.jpg" alt="">

                    <div class="details-video">

                        <p class="title-home-video"><?= $video->title ?></p>

                        <p class="home-chanel-name">mohammed samy</p>

                        <div class="home-view-date">

                            <p class="home-view">1 مليون مشاهدة</p>
    
                            <p class="home-date">منذ يومين</p>

                        </div>
                        

                    </div>

                </div>

            </div>

            <?php endforeach; ?>

        </div>

    </div>