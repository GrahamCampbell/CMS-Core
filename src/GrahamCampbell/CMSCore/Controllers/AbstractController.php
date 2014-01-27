<?php

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
 */

namespace GrahamCampbell\CMSCore\Controllers;

use GrahamCampbell\Credentials\Classes\Credentials;
use GrahamCampbell\Credentials\Controllers\AbstractController as Controller;

/**
 * This is the abstract controller class.
 *
 * @package    CMS-Core
 * @author     Graham Campbell
 * @copyright  Copyright (C) 2013-2014  Graham Campbell
 * @license    https://github.com/GrahamCampbell/CMS-Core/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/CMS-Core
 */
abstract class AbstractController extends Controller
{
    /**
     * A list of methods protected by edit permissions.
     *
     * @var array
     */
    protected $edits = array();

    /**
     * A list of methods protected by blog permissions.
     *
     * @var array
     */
    protected $blogs = array();

    /**
     * Create a new instance.
     *
     * @param  \GrahamCampbell\Credentials\Classes\Credentials  $credentials
     * @return void
     */
    public function __construct(Credentials $credentials)
    {
        parent::__construct($credentials);

        $this->beforeFilter('credentials:edit', array('only' => $this->edits));
        $this->beforeFilter('credentials:blog', array('only' => $this->blogs));
    }
}
