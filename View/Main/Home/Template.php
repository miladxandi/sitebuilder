<?php include '../View/Shared/Main/_HeaderLayout.php' ?>
<?php \View\View\Shared\MainLayouts::_Menu(); ?>

<main>
    <section id="single_portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div id="template-slider" class="splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        <img src="/Content/Panel/01.jpg" />
                                    </li>
                                    <li class="splide__slide">
                                        <img src="/Content/Panel/02.jpg" />
                                    </li>
                                    <li class="splide__slide">
                                        <img src="/Content/Panel/03.jpg" />
                                    </li>
                                    <li class="splide__slide">
                                        <img src="/Content/Panel/04.jpg" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <ul id="thumbnails" class="thumbnails">
                            <li class="thumbnail">
                                <img src="/Content/Panel/01.jpg" />
                            </li>
                            <li class="thumbnail">
                                <img src="/Content/Panel/02.jpg" />
                            </li>
                            <li class="thumbnail">
                                <img src="/Content/Panel/03.jpg" />
                            </li>
                            <li class="thumbnail">
                                <img src="/Content/Panel/04.jpg" />
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="single_portfolio-content">
                            <h5>then name of the template</h5>
                            <p><i class="fa fa-user"></i>the usage: business/shopping/marketing/... </p>
                            <p><i class="fal fa-calendar-day"></i>created at: 2022/1/24</p>
                            <p><i class="fa fa-cogs"></i>downloads: 800088</p>
                            <p><i class="fa fa-cogs"></i>cost: $20</p>
                            <hr>
                            <p class="text">a summary about template and what it contains...
                                it can be more than lines
                            </p>
                        </div>
                        <div class="more-services">
                            <a href="#"><button>Demo</button></a>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>
<?php \View\View\Shared\MainLayouts::_Footer(); ?>
