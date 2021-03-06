CMS Core
========


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/GrahamCampbell/CMS-Core/trend.png)](https://bitdeli.com/free "Bitdeli Badge")
[![Build Status](https://travis-ci.org/GrahamCampbell/CMS-Core.png)](https://travis-ci.org/GrahamCampbell/CMS-Core)
[![Coverage Status](https://coveralls.io/repos/GrahamCampbell/CMS-Core/badge.png)](https://coveralls.io/r/GrahamCampbell/CMS-Core)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/GrahamCampbell/CMS-Core/badges/quality-score.png?s=abade2f7af64ae1b36516618be72c26f9fd560bc)](https://scrutinizer-ci.com/g/GrahamCampbell/CMS-Core)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/4704d948-2c7e-46c6-8d28-2c93594a600e/mini.png)](https://insight.sensiolabs.com/projects/4704d948-2c7e-46c6-8d28-2c93594a600e)
[![Software License](https://poser.pugx.org/graham-campbell/cms-core/license.png)](https://github.com/GrahamCampbell/CMS-Core/blob/master/LICENSE.md)
[![Latest Version](https://poser.pugx.org/graham-campbell/cms-core/v/stable.png)](https://packagist.org/packages/graham-campbell/cms-core)


## WARNING

#### This package has been re-merged with [Bootstrap CMS](https://github.com/GrahamCampbell/Bootstrap-CMS), and is no longer maintained.


## What Is CMS Core?

CMS Core provides some core functionality for applications like [Bootstrap CMS](https://github.com/GrahamCampbell/Bootstrap-CMS).

* CMS Core was created by, and is maintained by [Graham Campbell](https://github.com/GrahamCampbell).
* CMS Core relies on many of my packages including [Laravel Core](https://github.com/GrahamCampbell/Laravel-Core) and [Laravel Queuing](https://github.com/GrahamCampbell/Laravel-Queuing).
* CMS Core uses [Travis CI](https://travis-ci.org/GrahamCampbell/CMS-Core) with [Coveralls](https://coveralls.io/r/GrahamCampbell/CMS-Core) to check everything is working.
* CMS Core uses [Scrutinizer CI](https://scrutinizer-ci.com/g/GrahamCampbell/CMS-Core) and [SensioLabsInsight](https://insight.sensiolabs.com/projects/4704d948-2c7e-46c6-8d28-2c93594a600e) to run additional checks.
* CMS Core uses [Composer](https://getcomposer.org) to load and manage dependencies.
* CMS Core provides a [change log](https://github.com/GrahamCampbell/CMS-Core/blob/master/CHANGELOG.md), [releases](https://github.com/GrahamCampbell/CMS-Core/releases), and [api docs](http://grahamcampbell.github.io/CMS-Core).
* CMS Core is licensed under the GNU AGPLv3, available [here](https://github.com/GrahamCampbell/CMS-Core/blob/master/LICENSE.md).


## System Requirements

* PHP 5.4.7+ or PHP 5.5+ is required.
* You will need [Laravel 4.1](http://laravel.com) because this package is designed for it.
* You will need [Composer](https://getcomposer.org) installed to load the dependencies of CMS Core.


## Installation

Please check the system requirements before installing CMS Core.

To get the latest version of CMS Core, simply require `"graham-campbell/cms-core": "0.2.*@alpha"` in your `composer.json` file. You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

You will need to register many service providers before you attempt to load the CMS Core service provider. Open up `app/config/app.php` and add the following to the `providers` key.

* `'Lightgear\Asset\AssetServiceProvider'`
* `'Cartalyst\Sentry\SentryServiceProvider'`
* `'GrahamCampbell\Core\CoreServiceProvider'`
* `'GrahamCampbell\Viewer\ViewerServiceProvider'`
* `'GrahamCampbell\Queuing\QueuingServiceProvider'`
* `'GrahamCampbell\HTMLMin\HTMLMinServiceProvider'`
* `'GrahamCampbell\Markdown\MarkdownServiceProvider'`
* `'GrahamCampbell\Security\SecurityServiceProvider'`
* `'GrahamCampbell\Binput\BinputServiceProvider'`
* `'GrahamCampbell\Passwd\PasswdServiceProvider'`
* `'GrahamCampbell\Throttle\ThrottleServiceProvider'`
* `'GrahamCampbell\Credentials\CredentialsServiceProvider'`
* `'GrahamCampbell\Navigation\NavigationServiceProvider'`

Once CMS Core is installed, you need to register the service provider. Open up `app/config/app.php` and add the following to the `providers` key.

* `'GrahamCampbell\CMSCore\CMSCoreServiceProvider'`


## Configuration

CMS Core supports optional configuration.

To get started, first publish the package config file:

    php artisan config:publish graham-campbell/cms-core

There are a few config options:

**Comment Model**

This option (`'comment'`) defines the comment model to be used. The default value for this setting is `'GrahamCampbell\CMSCore\Models\Comment'`.

**Event Model**

This option (`'event'`) defines the event model to be used. The default value for this setting is `'GrahamCampbell\CMSCore\Models\Event'`.

**Page Model**

This option (`'page'`) defines the page model to be used. The default value for this setting is `'GrahamCampbell\CMSCore\Models\Page'`.

**Post Model**

This option (`'post'`) defines the post model to be used. The default value for this setting is `'GrahamCampbell\CMSCore\Models\Post'`.


## Usage

There is currently no usage documentation besides the [API Documentation](http://grahamcampbell.github.io/CMS-Core) for CMS Core.

You may see an example of implementation in [Bootstrap CMS](https://github.com/GrahamCampbell/Bootstrap-CMS). [CMS CloudFlare](https://github.com/GrahamCampbell/CMS-CloudFlare), [CMS Contact](https://github.com/GrahamCampbell/CMS-Contact), and [CMS LogViewer](https://github.com/GrahamCampbell/CMS-LogViewer) are all examples of plugins for the CMS.


## Updating Your Fork

Before submitting a pull request, you should ensure that your fork is up to date.

You may fork CMS Core:

    git remote add upstream git://github.com/GrahamCampbell/CMS-Core.git

The first command is only necessary the first time. If you have issues merging, you will need to get a merge tool such as [P4Merge](http://perforce.com/product/components/perforce_visual_merge_and_diff_tools).

You can then update the branch:

    git pull --rebase upstream master
    git push --force origin <branch_name>

Once it is set up, run `git mergetool`. Once all conflicts are fixed, run `git rebase --continue`, and `git push --force origin <branch_name>`.


## Pull Requests

Please review these guidelines before submitting any pull requests.

* When submitting bug fixes, check if a maintenance branch exists for an older series, then pull against that older branch if the bug is present in it.
* Before sending a pull request for a new feature, you should first create an issue with [Proposal] in the title.
* Please follow the [PSR-2 Coding Style](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) and [PHP-FIG Naming Conventions](https://github.com/php-fig/fig-standards/blob/master/bylaws/002-psr-naming-conventions.md).


## License

GNU AFFERO GENERAL PUBLIC LICENSE

CMS Core Provides Some Core Functionality For Applications Like Bootstrap CMS
Copyright (C) 2013-2014  Graham Campbell

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Affero General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
