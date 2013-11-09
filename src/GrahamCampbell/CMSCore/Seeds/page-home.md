<div class="hidden-xs">
    <div class="jumbotron">
        <div class="hidden-sm">
            <h1><?php echo Config::get("cms.name"); ?></h1>
        </div>
        <div class="visible-sm">
            <h1><?php echo Config::get("cms.name"); ?></h1>
        </div>
        <p class="lead">Powered by Laravel 4 with Sentry 2</p>
        <?php if (Config::get('cms.regallowed')) { ?>
            <a class="btn btn-lg btn-success" href="<?php echo URL::route("account.register"); ?>">Sign Up Today</a>
        <?php } else { ?>
            <a class="btn btn-lg btn-success" href="<?php echo URL::route("pages.show", array("pages" => "about")); ?>">More Information</a>
        <?php } ?>
    </div>
</div>

<div class="visible-xs">
    <div class="jumbotron">
        <h1><?php echo Config::get("cms.name"); ?></h1>
        <p class="lead">Powered by Laravel 4 with Sentry</p>
        <?php if (Config::get('cms.regallowed')) { ?>
            <a class="btn btn-lg btn-success" href="<?php echo URL::route("account.register"); ?>">Sign Up Today</a>
        <?php } else { ?>
            <a class="btn btn-lg btn-success" href="<?php echo URL::route("pages.show", array("pages" => "about")); ?>">More Information</a>
        <?php } ?>
    </div>
</div>

<hr>

<div class="row">

    <div class="col-md-4 col-xs-12">
        <h2>Welcome</h2>
        <p>Bootstrap CMS is a PHP CMS powered by <a href="http://laravel.com">Laravel 4.0</a> with <a href="http://docs.cartalyst.com/sentry-2">Sentry 2.0</a>. Bootstrap CMS was created by, and is maintained by <a href="https://github.com/GrahamCampbell">Graham Campbell</a>.</p>
        <p>
            <a class="btn" href="<?php echo URL::route("pages.show", array("pages" => "about")); ?>">View details &raquo;</a>
        </p>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <h2>Forking</h2>
        <p>Feel free to fork this project and use it anywhere, in compliance with the <a href="https://github.com/GrahamCampbell/Bootstrap-CMS/blob/master/LICENSE.md">license</a>. Before submitting a pull request, please ensure your fork is up to date.</p>
        <p>
            <a class="btn" href="<?php echo URL::route("pages.show", array("pages" => "about")); ?>">View details &raquo;</a>
        </p>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <h2>More</h2>
        <p>The back-end leverages queuing and caching to keep it fast and smooth, while the front-end would also not be possible without <a href="http://getbootstrap.com">Bootstrap</a> and <a href="http://jquery.com">jQuery</a>.</p>
        <p>
            <a class="btn" href="<?php echo URL::route("pages.show", array("pages" => "about")); ?>">View details &raquo;</a>
        </p>
    </div>

</div>
