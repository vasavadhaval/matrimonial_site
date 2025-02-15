<?php include 'header.php'; ?>

<style>
    .ptb_1001 {
    padding: 100px 0 !important;
}
/*------------------------------------------------------------------
    Story
-------------------------------------------------------------------*/

.story-box{
	padding: 70px 0px;
}

.align-left {
    text-align: left;
}
.align-right {
    text-align: right;
}
.main-timeline-box{
	position: relative;
	word-wrap: break-word;
}

.main-timeline-box .timeline-element {
    margin-bottom: 50px;
    position: relative;
    word-wrap: break-word;
    word-break: break-word;
    display: -webkit-flex;
    flex-direction: row;
    -webkit-flex-direction: row;
}
.main-timeline-box .reverse {
    flex-direction: row-reverse;
    -webkit-flex-direction: row-reverse;
}
.main-timeline-box .separline::before {
    top: 20px;
    bottom: 0;
    position: absolute;
    content: "";
    width: 2px;
    background-color: #f1f1f1;
    left: calc(50% - 1px);
    height: calc(100% + 4rem);
}

.main-timeline-box .iconBackground {
    position: absolute;
    left: 50%;
    width: 20px;
    height: 20px;
    line-height: 30px;
    text-align: center;
    border-radius: 50%;
    font-size: 30px;
    display: inline-block;
    background-color: #f1f1f1;
    top: 20px;
    margin-left: -10px;
}
.main-timeline-box .timeline-text-content {
    padding: 30px 35px;
	background: #f1f1f1;
}
.main-timeline-box .reverse .timeline-text-content{
	margin-right: 30px;
}
.main-timeline-box .reverse .time-line-date-content p {
    float: left;
	padding: 30px 35px;
	background: #f1f1f1;
}
.main-timeline-box .reverse .time-line-date-content {
	margin-right: 30px;
}

.display-font{
	font-size: 30px;
	color: #222222;
}
.main-timeline-box .timeline-text-content{
	margin-left: 30px;
}
.main-timeline-box .time-line-date-content p {
    float: right;
	padding: 30px 35px;
	background: #f1f1f1;
}
.main-timeline-box .time-line-date-content {
	margin-right: 30px;
}

.main-timeline-box .time-line-date-content .mbr-timeline-date{
	background:#f55171;
	color: #ffffff;
}
.main-timeline-box .reverse .time-line-date-content .mbr-timeline-date{
	background: #f55171;
	color: #ffffff;
}


</style>
<section class="section service-area bg-gray overflow-hidden ptb_1001 mt-5 story-box main-timeline-box" id="story">
<div class="container">
       <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-6">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2 class="text-capitalize">Our Story</h2>
                    <!-- <p class="d-none d-sm-block mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum
                        obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.</p> -->
                    <p class="d-block d-sm-none mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum
                        obcaecati.</p>
                </div>
            </div>
        </div>
			<div class="row timeline-element separline">
				<div class="timeline-date-panel col-xs-12 col-md-6  align-left">         
                    <div class="time-line-date-content">
                        <p class="mbr-timeline-date mbr-fonts-style display-font">
                            <img src="assets/img/stories/img date.jpeg" height="150" width="150">  
                        </p>
                    </div>
				</div>
				<span class="iconBackground"></span>
				<div class="col-xs-12 col-md-6 align-left">
					<div class="timeline-text-content">
						<h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-font">Cafe date </h4>
						<p class="mbr-timeline-text mbr-fonts-style display-7">
							Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim libero maiores quaerat?
						</p>
					 </div>
				</div>
			</div>
			<div class="row timeline-element reverse separline">
				<div class="timeline-date-panel col-xs-12 col-md-6  align-left">         
                    <div class="time-line-date-content">
                        <p class="mbr-timeline-date mbr-fonts-style display-font">
                            <img src="assets/img/stories/movie.jpeg" height="150" width="150">  
                             
                        </p>
                    </div>
				</div>
				<span class="iconBackground"></span>
				<div class="col-xs-12 col-md-6 align-right">
					<div class="timeline-text-content">
						<h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-font">Movie date</h4>
						<p class="mbr-timeline-text mbr-fonts-style display-7">
							Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos odio perspiciatis explicabo.
						</p>
					 </div>
				</div>
			</div>
			<div class="row timeline-element separline">
				<div class="timeline-date-panel col-xs-12 col-md-6  align-left">         
                    <div class="time-line-date-content">
                        <p class="mbr-timeline-date mbr-fonts-style display-font">
                            <img src="assets/img/stories/marriage.jpeg" height="150" width="150">  
                            
                        </p>
                    </div>
				</div>
				<span class="iconBackground"></span>
				<div class="col-xs-12 col-md-6 align-left">
					<div class="timeline-text-content">
						<h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-font">Proposal</h4>
						<p class="mbr-timeline-text mbr-fonts-style display-7">
							Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos quasi voluptatibus voluptates?
						</p>
					 </div>
				</div>
			</div>
			<div class="row timeline-element reverse separline">
				<div class="timeline-date-panel col-xs-12 col-md-6  align-left">         
                    <div class="time-line-date-content">
                        <p class="mbr-timeline-date mbr-fonts-style display-font">
                            <img src="assets/img/stories/eng2.jpeg" height="150" width="150">  
                             
                        </p>
                    </div>
				</div>
				<span class="iconBackground"></span>
				<div class="col-xs-12 col-md-6 align-right">
					<div class="timeline-text-content">
						<h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-font">Engagement</h4>
						<p class="mbr-timeline-text mbr-fonts-style display-7">
							Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati nulla eos est?
						</p>
					 </div>
				</div>
			</div>
			
		</div>
        </section>
     
<?php include 'footer.php'; ?>
