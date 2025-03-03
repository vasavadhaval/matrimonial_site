<?php include 'header.php'; ?>

<style>
.ptb_1001 {
    padding: 100px 0 !important;
}
</style>
<section class="section promo-area bg-gray overflow-hidden ptb_1001 mt-5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-lg-6">
                <!-- Promo Text -->
                <div class="service-text pt-4 pt-lg-0">
                    <h2 class="promo-text mb-4">YOUR JOURNEY TO A HAPPY MARRIAGE</h2>
                    <p class="mb-4">
                        Experience the magic of finding your soulmate! Watch our promo video showcasing
                        beautiful pre-wedding shoots, wedding moments, and real success stories of happy couples.
                    </p>
                    <ul class="service-list">
                        <!-- Feature 1 -->
                        <li class="single-service media py-2 d-flex align-items-center">
                            <div class="feature-icon text-primary align-self-center pr-4">
                                <i class="fas fa-heart fa-2x"></i>
                            </div>
                            <div class="service-text media-body">
                                <p>Find your perfect match and start your journey.</p>
                            </div>
                        </li>
                        <!-- Feature 2 -->
                        <li class="single-service media py-2 d-flex align-items-center">
                            <div class="feature-icon text-primary align-self-center pr-4">
                                <i class="fas fa-camera-retro fa-2x"></i>
                            </div>
                            <div class="service-text media-body">
                                <p>Capture pre-wedding memories in stunning visuals.</p>
                            </div>
                        </li>
                        <!-- Feature 3 -->
                        <li class="single-service media py-2 d-flex align-items-center">
                            <div class="feature-icon text-primary align-self-center pr-4">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <div class="service-text media-body">
                                <p>Celebrate love with thousands of happy couples.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <!-- Video Section -->
                <div class="video-container text-center pt-4 pt-lg-0">

                    <video id="videoPlayer" class="video-js" controls preload="auto" width="100%" autoplay loop muted>
                        <source src="<?= htmlspecialchars($base_url . '/VID_20250228_WA0003_edited_mp4_V1.mp4') ?>"
                            type="video/mp4" />
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>.
                        </p>
                    </video>

                </div>
            </div>





        </div>
    </div>
</section>

<?php include 'footer.php'; ?>