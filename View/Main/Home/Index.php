<?php include '../View/Shared/Main/_HeaderLayout.php' ?>
<?php \View\View\Shared\MainLayouts::_Menu(); ?>


<div style="background-color: #61d4d6">
    <div class="ui grid vertically" style="padding-top: 80px">
        <div class="two column row">
            <div class="column">
                <h1 class="ui huge text-white text-center">
                    <div class="content"> Collect</div>
                    <div class="content "> Feedback &</div>
                    <div class="content"> Build Better</div>
                    <div class="content"> Products</div>
                    <br>
                    <div class="ui animated button  " tabindex="0" style="width: 25vh">
                        <div class="visible content">Sign up for free</div>
                        <div class="hidden content">
                            <a href="/signup"><i class="signup icon"></i></a>
                        </div>
                    </div>
                </h1>
            </div>
            <div class=" column ">
                <img src="/Content/Main/logo 11.lpg.jpg" style="margin-bottom: 60px" alt="">
            </div>
        </div>
    </div>
</div>
<div class="ui grid vertically" style="padding-top: 80px">
    <div class="two column row">
        <div class=" column ">
            <img src="/Content/Main/video-img.jpg" style="margin-bottom: 60px;margin-left: 20px" alt="">
        </div>
        <div class="column">
            <h1 class="ui huge  text-center">
                <div class="content"> Collect</div>
                <div class="content "> Feedback &</div>
                <div class="content"> Build Better</div>
                <div class="content"> Products</div>
                <br>
                <div class="ui animated button  " tabindex="0" style="width: 25vh">
                    <div class="visible content">Sign up for free</div>
                    <div class="hidden content">
                        <a href="/signup"><i class="signup icon"></i></a>
                    </div>
                </div>
            </h1>
        </div>
    </div>

    <div class="align-items-center" style="background-color: #61d4d6 ">
        <div class="ui link cards">
            <div class="card">
                <div class="image">
                    <img src="/Content/Main/video-img.jpg">
                </div>
                <div class="content">
                    <div class="header">Matt Giampietro</div>
                    <div class="meta">
                        <a>Friends</a>
                    </div>
                    <div class="description">
                        Matthew is an interior designer living in New York.
                    </div>
                </div>
                <div class="extra content">
      <span class="right floated">
        Joined in 2013
      </span><span>
        <i class="user icon"></i>
        75 Friends
      </span>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="/Content/Main/video-img.jpg">
                </div>
                <div class="content">
                    <div class="header">Molly</div>
                    <div class="meta">
                        <span class="date">Coworker</span>
                    </div>
                    <div class="description">
                        Molly is a personal assistant living in Paris.
                    </div>
                </div>
                <div class="extra content">
      <span class="right floated">
        Joined in 2011
      </span>
                    <span>
        <i class="user icon"></i>
        35 Friends
      </span>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="/Content/Main/video-img.jpg">
                </div>
                <div class="content">
                    <div class="header">Elyse</div>
                    <div class="meta">
                        <a>Coworker</a>
                    </div>
                    <div class="description">
                        Elyse is a copywriter working in New York.
                    </div>
                </div>
                <div class="extra content">
      <span class="right floated">
        Joined in 2014
      </span>
                    <span>
        <i class="user icon"></i>
        151 Friends
      </span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php \View\View\Shared\MainLayouts::_Footer(); ?>

