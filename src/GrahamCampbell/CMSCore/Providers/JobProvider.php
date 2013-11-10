<?php namespace GrahamCampbell\CMSCore\Providers;

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

class JobProvider extends BaseProvider {

    /**
     * The name of the model to provide.
     *
     * @var string
     */
    protected $model = 'GrahamCampbell\CMSCore\Models\Job';

    /**
     * Get the queue to use.
     *
     * @param  string  $type
     * @return string
     */
    protected function queue($type) {
        if ($this->app['config']['queue.default'] == 'sync') {
            return $type;
        } else {
            return $this->app['config']['queue.connections.'.$this->app['config']['queue.default'].'.'.$type];
        }
    }

    /**
     * Get the task to use.
     *
     * @param  string  $type
     * @return string
     */
    protected function task($type, $location = 'GrahamCampbell\CMSCore\Handlers') {
        return $location.'\\'.ucfirst($type).'Handler';
    }

    /**
     * Get all jobs of the specified task.
     *
     * @param  string  $task
     * @param  array   $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTask($task, array $columns = array('*'), $location = 'GrahamCampbell\CMSCore\Handlers') {
        $model = $this->model;
        $task = $this->task($task, $location);
        return $model::where('task', '=', $task)->get($columns);
    }


    /**
     * Get all deleted jobs of the specified task.
     *
     * @param  string  $task
     * @param  array   $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getDeletedTask($task, array $columns = array('*'), $location = 'GrahamCampbell\CMSCore\Handlers') {
        $model = $this->model;
        $task = $this->task($task, $location);
        return $model::onlyTrashed()->where('task', '=', $task)->get($columns);
    }

    /**
     * Clear all jobs of the specified task.
     *
     * @param  string  $task
     * @return void
     */
    public function clearTask($task) {
        foreach($this->getTask($task, array('id')) as $job) {
            $job->delete();
        }
    }

    /**
     * Clear all deleted jobs of the specified task.
     *
     * @param  string  $task
     * @return void
     */
    public function clearDeletedTask($task) {
        foreach($this->getDeletedTask($task, array('id')) as $job) {
            $job->forceDelete();
        }
    }

    /**
     * Get all old jobs of the specified task.
     *
     * @param  string  $task
     * @param  int     $age
     * @param  array   $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getOldTask($task, $age = 68400, array $columns = array('*'), $location = 'GrahamCampbell\CMSCore\Handlers') {
        $model = $this->model;
        $task = $this->task($task, $location);
        return $model::where(function($query) use ($task, $age, $columns) { $query->where('task', '=', $task)->where('updated_at', '<=', time() - ($age)); })->get($columns);
    }

    /**
     * Get all old deleted jobs of the specified task.
     *
     * @param  string  $task
     * @param  int     $age
     * @param  array   $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getOldDeletedTask($task, $age = 478800, array $columns = array('*'), $location = 'GrahamCampbell\CMSCore\Handlers') {
        $model = $this->model;
        $task = $this->task($task, $location);
        return $model::onlyTrashed()->where(function($query) use ($task, $age, $columns) { $query->where('task', '=', $task)->where('deleted_at', '<=', time() - ($age)); })->get($columns);
    }

    /**
     * Clear all old jobs of the specified task.
     *
     * @param  string  $task
     * @param  int     $age
     * @return void
     */
    public function clearOldTask($task, $age = 68400) {
        foreach($this->getOldTask($task, $age, array('id')) as $job) {
            $job->delete();
        }
    }

    /**
     * Clear all old deleted jobs of the specified task.
     *
     * @param  string  $task
     * @param  int     $age
     * @return void
     */
    public function clearOldDeletedTask($task, $age = 478800) {
        foreach($this->getOldDeletedTask($task, $age, array('id')) as $job) {
            $job->forceDelete();
        }
    }

    /**
     * Get all jobs in the specified queue.
     *
     * @param  string  $queue
     * @param  array   $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getQueue($queue, array $columns = array('*')) {
        $model = $this->model;
        $queue = $this->queue($queue);
        return $model::where('queue', '=', $queue)->get($columns);
    }

    /**
     * Get all deleted jobs in the specified queue.
     *
     * @param  string  $queue
     * @param  array   $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getDeletedQueue($queue, array $columns = array('*')) {
        $model = $this->model;
        $queue = $this->queue($queue);
        return $model::onlyTrashed()->where('queue', '=', $queue)->get($columns);
    }

    /**
     * Clear all jobs in the specified queue.
     *
     * @param  string  $queue
     * @return void
     */
    public function clearQueue($queue) {
        foreach($this->getQueue($queue, array('id')) as $job) {
            $job->delete();
        }
    }

    /**
     * Clear all deleted jobs in the specified queue.
     *
     * @param  string  $queue
     * @return void
     */
    public function clearDeletedQueue($queue) {
        foreach($this->getDeletedQueue($queue, array('id')) as $job) {
            $job->forceDelete();
        }
    }

    /**
     * Get all old jobs in the specified queue.
     *
     * @param  string  $queue
     * @param  int     $age
     * @param  array   $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getOldQueue($queue, $age = 68400, array $columns = array('*')) {
        $model = $this->model;
        $queue = $this->queue($queue);
        return $model::where(function($query) use ($queue, $age, $columns) { $query->where('queue', '=', $queue)->where('updated_at', '<=', time() - ($age)); })->get($columns);
    }

    /**
     * Get all old deleted jobs in the specified queue.
     *
     * @param  string  $queue
     * @param  int     $age
     * @param  array   $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getOldDeletedQueue($queue, $age = 478800, array $columns = array('*')) {
        $model = $this->model;
        $queue = $this->queue($queue);
        return $model::onlyTrashed()->where(function($query) use ($queue, $age, $columns) { $query->where('queue', '=', $queue)->where('deleted_at', '<=', time() - ($age)); })->get($columns);
    }

    /**
     * Clear all jobs in the specified queue.
     *
     * @param  string  $queue
     * @param  int     $age
     * @return void
     */
    public function clearOldQueue($queue, $age = 68400) {
        foreach($this->getOldQueue($queue, $age, array('id')) as $job) {
            $job->delete();
        }
    }

    /**
     * Clear all deleted jobs in the specified queue.
     *
     * @param  string  $queue
     * @param  int     $age
     * @return void
     */
    public function clearOldDeletedQueue($queue, $age = 478800) {
        foreach($this->getOldDeletedQueue($queue, $age, array('id')) as $job) {
            $job->forceDelete();
        }
    }

    /**
     * Get all cron jobs.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCron(array $columns = array('*')) {
        return $this->getQueue('cron', $columns);
    }

    /**
     * Get all deleted cron jobs.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getDeletedCron(array $columns = array('*')) {
        return $this->getDeletedQueue('cron', $columns);
    }

    /**
     * Clear all cron jobs.
     *
     * @return void
     */
    public function clearCron() {
        return $this->clearQueue('cron');
    }

    /**
     * Clear all deleted cron jobs.
     *
     * @return void
     */
    public function clearDeletedCron() {
        return $this->clearDeletedQueue('cron');
    }

    /**
     * Get all old cron jobs.
     *
     * @param  int    $age
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getOldCron($age = 68400, array $columns = array('*')) {
        return $this->getOldQueue('cron', $age, $columns);
    }

    /**
     * Get all old deleted cron jobs.
     *
     * @param  int    $age
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getOldDeletedCron($age = 478800, array $columns = array('*')) {
        return $this->getOldDeletedQueue('cron', $age, $columns);
    }

    /**
     * Clear all old cron jobs.
     *
     * @param  int  $age
     * @return void
     */
    public function clearOldCron($age = 68400) {
        return $this->clearOldQueue('cron', $age);
    }

    /**
     * Clear all old deleted cron jobs.
     *
     * @param  int  $age
     * @return void
     */
    public function clearOldDeletedCron($age = 478800) {
        return $this->clearOldDeletedQueue('cron', $age);
    }

    /**
     * Get all mail jobs.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getMail(array $columns = array('*')) {
        return $this->getQueue('mail', $columns);
    }

    /**
     * Get all deleted mail jobs.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getDeletedMail(array $columns = array('*')) {
        return $this->getDeletedQueue('mail', $columns);
    }

    /**
     * Clear all mail jobs.
     *
     * @return void
     */
    public function clearMail() {
        return $this->clearQueue('mail');
    }

    /**
     * Clear all deleted mail jobs.
     *
     * @return void
     */
    public function clearDeletedMail() {
        return $this->clearDeletedQueue('mail');
    }

    /**
     * Get all old mail jobs.
     *
     * @param  int    $age
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getOldMail($age = 68400, array $columns = array('*')) {
        return $this->getOldQueue('mail', $age, $columns);
    }

    /**
     * Get all old deleted mail jobs.
     *
     * @param  int    $age
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getOldDeletedMail($age = 478800, array $columns = array('*')) {
        return $this->getOldDeletedQueue('mail', $age, $columns);
    }

    /**
     * Clear all old mail jobs.
     *
     * @param  int  $age
     * @return void
     */
    public function clearOldMail($age = 68400) {
        return $this->clearOldQueue('mail', $age);
    }

    /**
     * Clear all old deleted mail jobs.
     *
     * @param  int  $age
     * @return void
     */
    public function clearOldDeletedMail($age = 478800) {
        return $this->clearOldDeletedQueue('mail', $age);
    }

    /**
     * Get all other jobs.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getJobs(array $columns = array('*')) {
        return $this->getQueue('queue', $columns);
    }

    /**
     * Get all other deleted jobs.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getDeletedJobs(array $columns = array('*')) {
        return $this->getDeletedQueue('queue', $columns);
    }

    /**
     * Clear all other jobs.
     *
     * @return void
     */
    public function clearJobs() {
        return $this->clearQueue('queue');
    }

    /**
     * Clear all other deleted jobs.
     *
     * @return void
     */
    public function clearDeletedJobs() {
        return $this->clearDeletedQueue('queue');
    }

    /**
     * Get all other old jobs.
     *
     * @param  int    $age
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getOldJobs($age = 68400, array $columns = array('*')) {
        return $this->getOldQueue('queue', $age, $columns);
    }

    /**
     * Get all other old deleted jobs.
     *
     * @param  int    $age
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getOldDeletedJobs($age = 478800, array $columns = array('*')) {
        return $this->getOldDeletedQueue('queue', $age, $columns);
    }

    /**
     * Clear all other old jobs.
     *
     * @param  int  $age
     * @return void
     */
    public function clearOldJobs($age = 68400) {
        return $this->clearOldQueue('queue', $age);
    }

    /**
     * Clear all other old deleted jobs.
     *
     * @param  int  $age
     * @return void
     */
    public function clearOldDeletedJobs($age = 478800) {
        return $this->clearOldDeletedQueue('queue', $age);
    }

    /**
     * Get all jobs.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(array $columns = array('*')) {
        $model = $this->model;
        return $model::get($columns);
    }

    /**
     * Get all deleted jobs.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllDeleted(array $columns = array('*')) {
        $model = $this->model;
        return $model::onlyTrashed()->get($columns);
    }

    /**
     * Clear all jobs.
     *
     * @return void
     */
    public function clearAll() {
        foreach($this->getAll(array('id')) as $job) {
            $job->delete();
        }
    }

    /**
     * Clear all deleted jobs.
     *
     * @return void
     */
    public function clearAllDeleted() {
        foreach($this->getAllDeleted(array('id')) as $job) {
            $job->forceDelete();
        }
    }

    /**
     * Get all old jobs.
     *
     * @param  int    $age
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllOld($age = 68400, array $columns = array('*')) {
        $model = $this->model;
        return $model::where('updated_at', '<=', time() - ($age))->get($columns);
    }

    /**
     * Get all old deleted jobs.
     *
     * @param  int    $age
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllOldDeleted($age = 478800, array $columns = array('*')) {
        $model = $this->model;
        return $model::onlyTrashed()->where('deleted_at', '<=', time() - ($age))->get($columns);
    }

    /**
     * Clear all old jobs.
     *
     * @param  int  $age
     * @return void
     */
    public function clearAllOld($age = 68400) {
        foreach($this->getAllOld($age, array('id')) as $job) {
            $job->delete();
        }
    }

    /**
     * Clear all old deleted jobs.
     *
     * @param  int  $age
     * @return void
     */
    public function clearAllOldDeleted($age = 478800) {
        foreach($this->getAllOldDeleted($age, array('id')) as $job) {
            $job->forceDelete();
        }
    }
}
