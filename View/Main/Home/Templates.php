<?php include '../View/Shared/Main/_HeaderLayout.php' ?>
<?php \View\View\Shared\MainLayouts::_Menu(); ?>


<?php use Carbon\Carbon; ?>

<?php $templates = $Viewbag["Templates"]?>

<main>
    <div class="container">
        <section id="portfolio">
            <div class="row">
                <?php foreach ($templates as $template): ?>
                    <div class="col-lg-4 col-md-6 col-12 portfolio-item">
                        <figure>
                            <a class="portfolio-item__img" href="/<?php echo $template["Id"]; ?>">
                                <img src="/Content/Main/Template/<?php echo $template["img"]; ?>"/>
                            </a>
                            <figcaption>
                                <div class="portfolio-item__caption">
                                <span>
                                    <?php echo $template["author"]; ?>
                                    and
                                    <?php $humanDifferTime = new Carbon();
                                    $humanDifferTime::create($template["time"]);
                                    $humanDifferTime = $humanDifferTime->isoFormat('dddd D');
                                    echo $humanDifferTime; ?>
                                </span>
                                    <h4>
                                        <a href="/<?php echo $template["Id"]; ?>">
                                            <?php echo $template["content"]; ?>
                                        </a>
                                    </h4>
                                </div>
                                <div class="portfolio-item__link">
                                    <a href="/<?php echo $template["Id"]; ?>"><i class="fal fa-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="more-services">
                <button>more items</button>
            </div>
        </section>
    </div>
</main>
<?php \View\View\Shared\MainLayouts::_Footer(); ?>

