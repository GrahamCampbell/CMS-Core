<?php namespace GrahamCampbell\CMSCore\Tests\Models;

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

use GrahamCampbell\CMSCore\Tests\Models\Relations\Interfaces\IBelongsToUserTestCase;
use GrahamCampbell\CMSCore\Tests\Models\Relations\Common\TraitBelongsToUserTestCase;

class CommentTest extends ModelTestCase implements IBelongsToUserTestCase
{
    use TraitBelongsToUserTestCase;

    protected $model = 'GrahamCampbell\CMSCore\Models\Comment';

    protected function extraModelTests()
    {
        $this->assertInstanceOf('GrahamCampbell\Core\Models\BaseModel', $this->object);
    }

    public function testGetBody()
    {
        $this->assertEquals($this->instance->getBody(), $this->instance->body);
    }

    public function testGetPostId()
    {
        $this->assertEquals($this->instance->getPostId(), $this->instance->post_id);
    }

    public function testRelationWithPost()
    {
        $this->assertEquals($this->instance->post->first(), $this->instance->getPost());
        $this->assertEquals($this->instance->post_id, $this->instance->getPost()->id);
    }

    public function testRelationWithPostId()
    {
        $this->assertEquals($this->instance->getPostId(), $this->instance->getPost()->id);
    }
}
