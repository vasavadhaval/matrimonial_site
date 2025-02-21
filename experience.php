<?php include 'header.php'; ?>

<style>
    
/*** Team ***/
.team-img::after {
    position: absolute;
    content: "";
    width: 0;
    height: 0;
    bottom: 0px;
    left: 50%;
    transform: translateX(-50%);
    border: 30px solid;
    border-color: transparent transparent #FFFFFF transparent;      
}

@media (min-width: 576px) {
    .flex-sm-row .team-img::after,
    .flex-lg-row-reverse .team-img::after {
        top: 50%;
        right: 0;
        bottom: auto;
        left: auto;
        transform: translateY(-50%);
        border-color: transparent #FFFFFF transparent transparent;
    }
}

@media (min-width: 576px) and (max-width: 991.98px) {
    .flex-sm-row-reverse .team-img::after {
        top: 50%;
        right: auto;
        bottom: auto;
        left: 0;
        transform: translateY(-50%);
        border-color: transparent transparent transparent #FFFFFF;
    }
}

@media (min-width: 992px) {
    .flex-lg-row-reverse .team-img::after,
    .flex-sm-row-reverse .team-img::after {
        top: 50%;
        right: auto;
        bottom: auto;
        left: 0;
        transform: translateY(-50%);
        border-color: transparent transparent transparent #FFFFFF;
    }

    .flex-sm-row-reverse.flex-lg-row .team-img::after {
        top: 50%;
        right: 0;
        bottom: auto;
        left: auto;
        transform: translateY(-50%);
        border-color: transparent #FFFFFF transparent transparent;
    }
}
</style>
<section class="section service-area bg-gray overflow-hidden ptb_100 mt-5">
<div class="container">
<div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-6">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2 class="text-capitalize">lots of happy ending</h2>
                    <!-- <p class="d-none d-sm-block mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum
                        obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.</p>
                    <p class="d-block d-sm-none mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum
                        obcaecati.</p> -->
                </div>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-0 flex-sm-row">
                    <div class="col-sm-6">
                        <div class="team-img position-relative">
                            <img class="img-fluid" src="assets/img/experience/hero-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="h-100 p-5 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h4>western wedding</h4>
                                <span></span>
                            </div>
                            <p>A Western wedding typically refers to the traditional wedding ceremonies and celebrations that are commonly held in countries like the United States, Canada, the UK, Australia, and much of Europe.</p>
                            <div class="d-flex">
                                 </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="row g-0 flex-sm-row-reverse flex-lg-row">
                    <div class="col-sm-6">
                        <div class="team-img position-relative">
                            <img class="img-fluid" src="assets/img/experience/m12.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="h-100 p-5 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h4>Rajput wedding</h4>
                            </div>
                            <p>A Rajput wedding is a traditional wedding celebration that typically follows customs and rituals of the Rajput community in India. Rajputs are a proud and noble warrior class, mostly found in Rajasthan</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-0 flex-lg-row-reverse">
                    <div class="col-sm-6">
                        <div class="team-img position-relative">
                            <img class="img-fluid" src="assets/img/experience/pic17 maratha www.jpeg" width="375" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="h-100 p-5 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h4>Maratha Wedding</h4>
                              
                            </div>
                            <p>A Maratha wedding is a traditional celebration that follows the customs and rituals of the Maratha community, which is primarily found in Maharashtra, India.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="row g-0 flex-sm-row-reverse">
                    <div class="col-sm-6">
                        <div class="team-img position-relative">
                            <img class="img-fluid" src="assets/img/experience/south indian.jpeg" width="375" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="h-100 p-5 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h4>South Indian Wedding</h4>
                                
                            </div>
                            <p>A South Indian wedding is a grand and culturally rich celebration that varies across the different states of South India, including Tamil Nadu, Kerala, Karnataka, Andhra Pradesh, and Telangana.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </section>
     
<?php include 'footer.php'; ?>
