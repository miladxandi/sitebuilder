<?php \View\View\Shared\PanelLayouts::_Header(); ?>
    <title>SIMPLIST - PANEL</title>
    </head>

<?php \View\View\Shared\PanelLayouts::_Menu(); ?>
    <div style="margin-top:200px;margin-bottom:200px;margin-left:100px;margin-right:100px;">
        </br>
        <div class="col-sm SubText PurpText">
            <table class="table table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Url</th>
                    <th scope="col">Target</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$Urls=$Viewbag['UrlInfo'];
				$Id = 1;
				foreach ($Urls as $Url): ?>
                    <tr>
                        <th scope="col"><?php echo $Id ?></th>
                        <th scope="col"><?php echo $Url['url']; ?></th>
                        <th scope="col">
                            <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/links/' . $Url['url']; ?>"
                               target="_blank"><?php echo $Url['target']; ?></a>
                        </th>
                        <th scope="col"><a href="/Panel/Url/Update/?url=<?php echo $Url['Id']; ?>">Update</a>
                            <br>
                            <a href="/Panel/Url/Delete/?url=<?php echo $Url['Id']; ?>">Delete</a></th>
                    </tr>
					<?php $Id++; ?>
				<?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php \View\View\Shared\PanelLayouts::_Footer(); ?>