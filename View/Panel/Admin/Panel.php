<?php \View\View\Shared\PanelLayouts::_Header(); ?>
<?php \View\View\Shared\PanelLayouts::_Menu(); ?>
<div id="main">
    <h1>افزودن محصول</h1>
    <hr>
    <div id="nav">
        <ul>
            <li><a href="index.php">نمایش فروشگاه</a></li>
            <li><a href="product.php">لیست محصولات</a></li>
            <li><a href="add.product.php">افزودن محصول</a></li>
            <li><a href="user.php">لیست کاربران</a></li>
            <li><a href="comments.php">نظرات</a></li>
            <li><a href="orders.php">سفارش ها</a></li>
            <li><a href="do_logout.php">خروج از بخش مدریت</a></li>
            <hr>
            <div class="admin_main">
                <div class="add_product">
                    <form action="/Panel"method="post">
                        <input type="text"name="template_name"placeholder="نام قالب"><br>
                        <input type="text"name="template_img"placeholder="تصویر قالب"><br>
                        <input type="text"name="template_price" placeholder="قیمت قالب"><br>
                        <input type="text"name="template_category" placeholder="دسته بندی قالب"><br>
                        <input type="text"name="template_designer" placeholder="طراح قالب"><br>
                        <input type="text"name="template_date" placeholder="زمان انتشار"><br>
                        <input type="text"name="template_link" placeholder="لینک قالب"><br>
                        <textarea name="template_description"placeholder="توضیحات قالب"></textarea><br>
                        <input type="submit"name="add_template"value="افزودن قالب">
                    </form>
                </div>
            </div>
        </ul>
    </div>
</div>
<?php \View\View\Shared\PanelLayouts::_Footer(); ?>
