<?php namespace GrahamCampbell\CMSCore\Models;

/**
 * This file is part of CMS Core by Graham Campbell.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * @package    CMS-Core
 * @author     Graham Campbell
 * @license    GNU AFFERO GENERAL PUBLIC LICENSE
 * @copyright  Copyright (C) 2013  Graham Campbell
 * @link       https://github.com/GrahamCampbell/CMS-Core
 */

use GrahamCampbell\Core\Models\BaseModel;
use GrahamCampbell\Core\Models\Interfaces\ITitleModel;
use GrahamCampbell\Core\Models\Common\TraitTitleModel;
use GrahamCampbell\Core\Models\Interfaces\ISlugModel;
use GrahamCampbell\Core\Models\Common\TraitSlugModel;
use GrahamCampbell\Core\Models\Interfaces\IBodyModel;
use GrahamCampbell\Core\Models\Common\TraitBodyModel;
use GrahamCampbell\CMSCore\Models\Relations\Interfaces\IBelongsToUser;
use GrahamCampbell\CMSCore\Models\Relations\Common\TraitBelongsToUser;

class Page extends BaseModel implements ITitleModel, ISlugModel, IBodyModel, IBelongsToUser {

    use TraitTitleModel, TraitSlugModel, TraitBodyModel, TraitBelongsToUser;

    /**
     * The table the pages are stored in.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The model name.
     *
     * @var string
     */
    public static $name = 'page';

    /**
     * The columns to select when displaying an index.
     *
     * @var array
     */
    public static $index = array('id', 'slug', 'title');

    /**
     * The max pages per page when displaying a paginated index.
     *
     * @var int
     */
    public static $paginate = 10;

    /**
     * The columns to order by when displaying an index.
     *
     * @var string
     */
    public static $order = 'slug';

    /**
     * The direction to order by when displaying an index.
     *
     * @var string
     */
    public static $sort = 'asc';

    /**
     * The page validation rules.
     *
     * @var array
     */
    public static $rules = array(
        'title'      => 'required',
        'slug'       => 'required',
        'body'       => 'required',
        'show_title' => 'required',
        'show_nav'   => 'required',
        'user_id'    => 'required'
    );

    /**
     * The page factory.
     *
     * @var array
     */
    public static $factory = array(
        'id'         => 1,
        'title'      => 'Page Title',
        'slug'       => 'page-title',
        'body'       => 'This is the page body!',
        'css'        => 'ccs',
        'js'         => 'js',
        'show_title' => true,
        'show_nav'   => true,
        'icon'       => 'home',
        'user_id'    => 1
    );

    /**
     * Get css.
     *
     * @return string
     */
    public function getCSS() {
        return $this->css;
    }

    /**
     * Get js.
     *
     * @return string
     */
    public function getJS() {
        return $this->js;
    }

    /**
     * Get show_title.
     *
     * @return int
     */
    public function getShowTitle() {
        return $this->show_title;
    }

    /**
     * Get show_nav.
     *
     * @return int
     */
    public function getShowNav() {
        return $this->show_nav;
    }

    /**
     * Get icon.
     *
     * @return string
     */
    public function getIcon() {
        return $this->icon;
    }
}
