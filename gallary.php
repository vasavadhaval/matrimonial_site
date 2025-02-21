<?php include 'header.php'; ?>

<style>
.ptb_1001 {
    padding: 100px 0 !important;
}

.album .responsive-container-block {
    min-height: 75px;
    height: fit-content;
    width: 100%;
    padding: 10px;
    display: flex;
    flex-wrap: wrap;
    margin: 0 auto;
    justify-content: flex-start;
}

.album .responsive-container-block.bg {
    max-width: 1320px;
    justify-content: space-between;
}

.album .img {
    width: 100%;
    margin-bottom: 20px;
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}

.album .img:hover {
    transform: scale(1.05);
}

.album .responsive-container-block.img-cont {
    flex-direction: column;
    max-width: 33.3%;
    height: 100%;
}

@media (max-width: 768px) {
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
    }
}

@media (max-width: 500px) {
    .album .img {
        max-width: 94%;
        margin-bottom: 25px;
    }

    .album .responsive-container-block.img-cont {
        flex-direction: column;
        align-items: center;
        padding: 10px;
    }
}
</style>

<section class="section service-area bg-gray overflow-hidden ptb_1001 mt-5">
    <div class="container">
        <div class="album">
            <div class="responsive-container-block bg">
                <div class="responsive-container-block img-cont">
                    <img class="img" src="assets/img/gallary/pic15 rajput ww.jpeg"
                        onclick="showPopup('Rajput Wedding', 'This is a traditional Rajput wedding image.')">
                    <img class="img" src="assets/img/gallary/pic17 maratha www.jpeg"
                        onclick="showPopup('Maratha Culture', 'This image represents the Maratha culture and heritage.')">
                </div>
                <div class="responsive-container-block img-cont">
                    <img class="img img-big" src="assets/img/gallary/project-5.jpg"
                        onclick="showPopup('Project 5', 'This is an image from project 5.')">
                    <img class="img img-big img-last" src="assets/img/gallary/about-1.jpg"
                        onclick="showPopup('About Us', 'A beautiful image related to our about section.')">
                </div>
                <div class="responsive-container-block img-cont">
                    <img class="img" src="assets/img/gallary/south indian.jpeg"
                        onclick="showPopup('South Indian Tradition', 'An image showcasing South Indian traditional attire.')">
                    <img class="img" src="assets/img/gallary/project-7.jpg"
                        onclick="showPopup('Project 7', 'Another image from our project gallery.')">
                    <img class="img" src="assets/img/gallary/service-3.jpg"
                        onclick="showPopup('Our Services', 'This image highlights the services we offer.')">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap Modal -->
<div class="modal fade" id="imagePopup" tabindex="-1" aria-labelledby="imagePopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: linear-gradient(135deg, #f857a6 0%, #ff5858 100%);
                   color: white; 
                   border-radius: 12px; 
                   padding: 25px;
                   position: relative;
                   box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);">
            <!-- Close Button -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                style="position: absolute; top: 10px; right: 15px; background: transparent; border: none;">
                <i class="fas fa-times" style="color: white; font-size: 22px;"></i>
            </button>

            <div class="modal-body" style="padding: 20px; text-align: center; font-size: 16px;">
                <p id="popupDescription" style="
                          color: white;">
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome for the close icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


<script>
function showPopup(title, description) {
    document.getElementById('popupDescription').innerText = description;
    var myModal = new bootstrap.Modal(document.getElementById('imagePopup'));
    myModal.show();
}
document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("imagePopup");
    var modalInstance = new bootstrap.Modal(modal);

    document.querySelector(".close-btn").addEventListener("click", function() {
        modalInstance.hide();
    });
});

</script>

<?php include 'footer.php'; ?>