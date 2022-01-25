<?php include '../View/Shared/Forms/Header.php' ?>

<body style="background-color: white">
<header class="header">
    <nav>
        <div class="ui container">
            <div class="ui flex">
                <div class="ui secondary menu ">
                    <a href="/"><img src="/Content/Main/logo4.jpg" style="width: 300px" alt=""></a>
                    <a class="active item">Home</a>
                    <a class="item">Templates</a>
                    <a class="item">Contact</a>
                    <a class="item">About us</a>
                    <div class="right menu">
                        <div class="item">
                            <div class="ui icon input">
                                <input type="text" placeholder="Search ...">
                                <i class="search link icon"></i>
                            </div>
                        </div>
                        <a href="/signup" class="ui item">Sign up</a>
                        <a href="/login" class="ui item">Log in</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
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
                        </div>
                        <div class="more-services">
                            <button>Demo</button>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>
</body>
</html>