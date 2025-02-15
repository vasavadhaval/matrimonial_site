<?php include 'header.php'; ?>

<style>
    .ptb_1001 {
    padding: 100px 0 !important;
}
/* CSS   */
.album .responsive-container-block {
        min-height: 75px;
        height: fit-content;
        width: 100%;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        display: flex;
        flex-wrap: wrap;
        margin-top: 0px;
        margin-right: auto;
        margin-bottom: 0px;
        margin-left: auto;
        justify-content: flex-start;
    }
    
    .album .responsive-container-block.bg {
        max-width: 1320px;
        margin: 0 0 0 0;
        justify-content: space-between;
    }
    
    .album .img {
        width: 100%;
        margin: 0 0 20px 0;
    }
    
    .album #i9rb {
        color: black;
    }
    
    .album #ir6i {
        color: black;
    }
    
    .album #ikz3b {
        color: black;
    }
    
    .album .responsive-container-block.img-cont {
        flex-direction: column;
        max-width: 33.3%;
        min-height: auto;
        margin: 0 0 0 0;
        height: 100%;
    }
    
    .album #ipix {
        color: black;
    }
    
    .album #ipzoh {
        color: black;
    }
    
    .album #ig5q8 {
        color: black;
    }
    
    .album #imtzl {
        color: black;
    }
    
    .album #i53es {
        color: black;
    }
    
    .album .img.img-big {
        height: 50%;
        margin: 0 0 16px 0;
    }
    
    @media (max-width: 1024px) {
        .album .img {
            margin: 0 0 18px 0;
        }
    }
    
    @media (max-width: 768px) {
        .album .img {
            max-width: 32.5%;
            margin: 0 0 0 0;
        }
        .album .responsive-container-block.bg {
            flex-direction: column;
        }
        .album .responsive-container-block.img-cont {
            max-width: 100%;
            flex-direction: row;
            justify-content: space-between;
        }
        .album .img.img-big {
            max-width: 49%;
            margin: 0 0 0 0;
        }
    }
    
    @media (max-width: 500px) {
        .album .img {
            max-width: 94%;
            margin: 0 0 25px 0;
        }
        .album .responsive-container-block.img-cont {
            flex-direction: column;
            align-items: center;
            padding: 10px 10px 10px 10px;
        }
        .album .img.img-big {
            max-width: 94%;
            margin: 0 0 25px 0;
        }
        .album .img.img-last {
            margin: 0 0 5px 0;
        }
    }
</style>
<section class="section service-area bg-gray overflow-hidden ptb_1001 mt-5">
            <div class="container">
                <div class="album">
                    <div class="responsive-container-block bg">
                        <div class="responsive-container-block img-cont">
                            <img class="img" src="assets/img/gallary/pic15 rajput ww.jpeg">
                            <img class="img" src="assets/img/gallary/pic17 maratha www.jpeg">
                            <!-- <img class="img img-last" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/PP5.6.svg"> -->
                        </div>
                        <div class="responsive-container-block img-cont">
                            <img class="img img-big" src="assets/img/gallary/project-5.jpg">
                            <img class="img img-big img-last" src="assets/img/gallary/about-1.jpg">
                        </div>
                        <div class="responsive-container-block img-cont">
                            <img class="img" src="assets/img/gallary/south indian.jpeg">
                            <img class="img" src="assets/img/gallary/project-7.jpg">
                            <img class="img" src="assets/img/gallary/service-3.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </section>
     
<?php include 'footer.php'; ?>
