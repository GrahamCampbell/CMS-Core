<?php namespace GrahamCampbell\CMSCore\Models\Relations\Common;

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

trait TraitBelongsToManyUsers {

    /**
     * Get the event relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function invites() {
        return $this->belongsToMany('GrahamCampbell\CMSCore\Models\User');
    }

    /**
     * Get the event collection.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getInvites() {
        $model = 'GrahamCampbell\CMSCore\Models\User';

        if (property_exists($model, 'order')) {
            return $this->invites()->orderBy($model::$order, $model::$sort)->get($model::$index);
        }        
        return $this->invites()->get($model::$index);
    }

    /**
     * Get the specified user.
     *
     * @return \GrahamCampbell\CMSCore\Models\User
     */
    public function findInvite($id, $columns = array('*')) {
        return $this->invite()->find($id, $columns);
    }

    /**
     * Link an user.
     *
     * @return void
     */
    public function addInvite($id) {
        return $this->invites()->attatch($id);
    }

    /**
     * Unlink an user.
     *
     * @return void
     */
    public function deleteInvite($id) {
        return $this->invites()->detach($id);
    }

    /**
     * Link some users.
     *
     * @return void
     */
    public function setInvites($ids) {
        return $this->invites()->sync($ids);
    }

    /**
     * Unlink all users.
     *
     * @return void
     */
    public function deleteInvites() {
        return $this->invites()->sync(array());
    }
}