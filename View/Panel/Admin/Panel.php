<?php \View\View\Shared\PanelLayouts::_Header(); ?>
<?php \View\View\Shared\PanelLayouts::_Menu(); ?>
<div id="main">
    <h1>افزودن محصول</h1>
    <hr>
    <div id="nav">
        <ul>
            <li><a href="index">نمایش فروشگاه</a></li>
            <li><a href="product">لیست محصولات</a></li>
            <li><a href="add.product">افزودن محصول</a></li>
            <li><a href="user">لیست کاربران</a></li>
            <li><a href="comments">نظرات</a></li>
            <li><a href="orders">سفارش ها</a></li>
            <li><a href="do_logout">خروج از بخش مدریت</a></li>
            <hr>
            <div class="admin_main">
                <div class="add_product">
                    <form action="/Panel" method="post" class="signup-from">
                        <div class="ui left icon input">
                            <input type="text" name="template_name" placeholder="نام قالب"><br>
                        </div>
                        <div class="ui left icon input">
                            <input type="text" name="template_img" placeholder="تصویر قالب"><br>
                        </div>
                        <div class="ui left icon input">
                            <input type="text" name="template_price" placeholder="قیمت قالب"><br>
                        </div>
                        <div class="ui left icon input">
                            <input type="text" name="template_category" placeholder="دسته بندی قالب"><br>
                        </div>
                        <div class="ui left icon input">
                            <input type="text" name="template_designer" placeholder="طراح قالب"><br>
                        </div>
                        <div class="ui left icon input">
                            <input type="text" name="template_date" placeholder="زمان انتشار"><br>
                        </div>
                        <div class="ui left icon input">
                            <input type="text" name="template_link" placeholder="لینک قالب"><br>
                        </div>
                        <div class="ui left icon input">
                            <textarea name="template_description" placeholder="توضیحات قالب"></textarea><br>
                        </div>
                        <div class="ui left icon input">
                            <button type="submit" name="add_template"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                                    style="background-color: #69D4D7">
                                بساز
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </ul>
    </div>
</div>
<?php \View\View\Shared\PanelLayouts::_Footer(); ?>
