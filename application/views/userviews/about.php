

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">About Us</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="<?php echo base_url('user') ?>">Home</a></li>
                    <li class="active">About Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /BREADCRUMB -->

<section class="our-team" style="background-image: url('<?php echo base_url('assets/userassets/') ?>img/uib.jpg'); background-size: cover; background-position: center; height: 100vh; display: flex; align-items: center; justify-content: center; color: black; text-align: center;">
    <div class="content">
        <h1 style="font-size: 3rem; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);">OUR TEAM</h1>
        <div id="teams">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="cards">
                            <div class="col-md-2 col-xs-4">
                                <img src="<?php echo base_url('assets/userassets/') ?>img/shabil.jpeg" alt="Shalsabila Nurlani" class="img-fluid mainmage">
                                <p class="name">Shalsabila Nurlani</p>
                                <p class="post">Front-End Engineer</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cards">
                            <div class="col-md-2 col-xs-4">
                                <img src="<?php echo base_url('assets/userassets/') ?>img/anas.jpeg" alt="Anatasya Silvi Pramudya" class="img-fluid mainmage">
                                <p class="name">Anatasya Silvi Pramudya</p>
                                <p class="post">Front-End Engineer</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cards">
                            <div class="col-md-2 col-xs-4">
                                <img src="<?php echo base_url('assets/userassets/') ?>img/farrin.jpeg" alt="Farrin Carolan" class="img-fluid mainmage">
                                <p class="name">Farrin Carolan</p>
                                <p class="post">Back-End Engineer</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cards">
                            <div class="col-md-2 col-xs-4">
                                <img src="<?php echo base_url('assets/userassets/') ?>img/hansen.jpeg" alt="Hansen" class="img-fluid mainmage">
                                <p class="name">Hansen</p>
                                <p class="post">Advisor</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cards">
                            <div class="col-md-2 col-xs-4">
                                <img src="<?php echo base_url('assets/userassets/') ?>img/vincent.jpeg" alt="Vincent" class="img-fluid mainmage">
                                <p class="name">Vincent</p>
                                <p class="post">Advisor</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer-area">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-md-4 col-xl-3">
                <div class="single-footer-widget footer_1">
                    <a href="index.html"></a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-4">
                <div class="single-footer-widget footer_2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.056680179816!2d104.00085421409236!3d1.119548462585573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98be09646b351%3A0x36a826082690c786!2sBatam%20International%20University!5e0!3m2!1sen!2sid!4v1601471095535!5m2!1sen!2sid" width="380" height="190" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright_part_text text-center">
                    <div class="row">
                        <div class="col-lg-12"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<style>
.mainmage {
    border-radius: 50%;
    margin: 10px auto;
    display: block;
    max-width: 100px;
    height: auto;
}
.name {
    font-weight: bold;
    font-size: 1.2rem;
    margin-top: 10px;
}
.post {
    color: #555;
    font-size: 1rem;
}
.cards {
    text-align: center;
    margin-bottom: 20px;
}
</style>
