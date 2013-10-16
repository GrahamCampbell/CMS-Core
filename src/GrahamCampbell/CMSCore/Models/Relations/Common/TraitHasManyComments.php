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

trait TraitHasManyComments {

    /**
     * Get the comment relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function comments() {
        return $this->hasMany('GrahamCampbell\CMSCore\Models\Comment');
    }

    /**
     * Get the comment collection.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getComments() {
        $model = 'GrahamCampbell\CMSCore\Models\Comment';

        if (property_exists($model, 'order')) {
            return $this->comments()->orderBy($model::$order, $model::$sort)->get($model::$index);
        }

        return $this->comments()->get($model::$index);
    }

    /**
     * Get the specified comment.
     *
     * @return \GrahamCampbell\CMSCore\Models\Comment
     */
    public function findComment($id, $columns = array('*')) {
        return $this->comments()->find($id, $columns);
    }

    /**
     * Delete all comments.
     *
     * @return void
     */
    public function deleteComments() {
        foreach($this->getComments(array('id')) as $comment) {
            $comment->delete();
        }
    }
}