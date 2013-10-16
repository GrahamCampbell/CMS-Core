<?php namespace GrahamCampbell\CMSCore\Providers\Common;

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

trait TraitSlugProvider {

    /**
     * Find an existing model by slug.
     *
     * @param  string  $slug
     * @param  array   $input
     * @return mixed
     */
    public function find($slug, array $columns = array('*')) {
        $model = $this->model;

        $model = $model::where('slug', '=', $slug)->first($columns);

        // TODO

        // $model->registerRelations($this->relations);

        return $model;
    }
}