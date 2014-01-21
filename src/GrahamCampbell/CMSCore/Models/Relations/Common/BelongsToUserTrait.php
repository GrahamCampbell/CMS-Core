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

namespace GrahamCampbell\CMSCore\Models\Relations\Common;

/**
 * This is the belongs to user trait.
 *
 * @package    CMS-Core
 * @author     Graham Campbell
 * @copyright  Copyright (C) 2013-2014  Graham Campbell
 * @license    https://github.com/GrahamCampbell/CMS-Core/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/CMS-Core
 */
trait BelongsToUserTrait
{
    /**
     * Get the user relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('GrahamCampbell\CMSCore\Models\User');
    }

    /**
     * Get the user model.
     *
     * @param  array  $columns
     * @return \GrahamCampbell\CMSCore\Models\User
     */
    public function getUser($columns = array('*'))
    {
        return $this->user()->first($columns);
    }

    /**
     * Get the user id.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Get the user email.
     *
     * @return string
     */
    public function getUserEmail()
    {
        $user = $this->getUser(array('email'));
        return $user->email;
    }

    /**
     * Get the user name.
     *
     * @return string
     */
    public function getUserName()
    {
        $user = $this->getUser(array('first_name', 'last_name'));
        return $user->getName();
    }
}