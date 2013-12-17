<?php namespace GrahamCampbell\CMSCore\Models\Relations\Interfaces;

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

interface IBelongsToUser
{
    /**
     * Get the user relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user();

    /**
     * Get the user model.
     *
     * @param  array  $columns
     * @return \GrahamCampbell\CMSCore\Models\User
     */
    public function getUser($columns = array('*'));

    /**
     * Get the user id.
     *
     * @return int
     */
    public function getUserId();

    /**
     * Get the user email.
     *
     * @return string
     */
    public function getUserEmail();

    /**
     * Get the user name.
     *
     * @return string
     */
    public function getUserName();
}
