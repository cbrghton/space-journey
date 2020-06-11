<?php


namespace App\Repositories;

use Illuminate\Container\Container as App;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


abstract class CRUDRepository
{
    /**
     * @var App
     */
    protected $app;

    /**
     * @var Model|string
     */
    protected $model;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
        DB::enableQueryLog();
    }

    /**
     * Make the relation
     *
     * @return Model
     * @throws BindingResolutionException
     */
    public function makeModel(): Model
    {
        return $this->model = $this->app->make($this->modelClass());
    }

    /**
     * Specified model class
     *
     * @return string
     */
    abstract public function modelClass(): string;

    /**
     * Get all records, paged from 15 rows by default
     *
     * @param int $rows
     * @return Collection|static[]
     */
    public function all(int $rows = 15)
    {
        return $this->model->simplePaginate($rows);
    }

    /**
     * Get all records by attribute or attributes
     *
     * @param array $attributes
     * @return Collection|static[]
     */
    public function allBy(array $attributes)
    {
        return $this->model->where($attributes)->get();
    }

    /**
     * Create new register
     *
     * @param array $fields
     * @return Model
     */
    public function create(array $fields): Model
    {
        return $this->model->fill($fields);
    }

    /**
     * Update register by attributes
     *
     * @param array $attributes
     * @param array $fields
     * @return int
     */
    public function update(array $attributes, array $fields): int
    {
        return $this->model->where($attributes)->update($fields);
    }

    /**
     * Delete register by ids
     *
     * @param array $ids
     * @return int
     */
    public function delete(array $ids): int
    {
        return $this->model::destroy($ids);
    }
}
