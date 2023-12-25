<?php

namespace App\Repositories;

use App\Enums\UserEnums;
use App\Models\Contract;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Batch;

abstract class EloquentRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * EloquentRepository constructor.
     * @throws BindingResolutionException
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Get model.
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model.
     * @throws BindingResolutionException
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get all.
     *
     * @return Collection|static[]
     */
    public function getAll(array $with = [], array $orderBy = [])
    {
        $base = $this->model;

        if (!empty($with)) {
            $base->with($with);
        }
        if (!empty($orderBy['column'])) {
            $base->orderBy($orderBy['column'], $orderBy['direction'] ?? 'asc');
        }

        return $base->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $this->model = $result;
        }
        return $result;
    }

    /**
     * Get one
     * @param $id
     * @return mixed or false
     */
    public function findOrFail($id)
    {
        $result = $this->model->findOrFail($id);
        if ($result) {
            $this->model = $result;
        }
        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Create many
     * @param array $attributes
     * @return mixed
     */
    public function createMany(array $arrayAttributes)
    {
        return $this->model->insert($arrayAttributes);
    }

    /**
     * Save (to use on Eloquent Model)
     * @param array $attributes
     * @return mixed
     */
    public function save(array $attributes = [])
    {
        $this->model->fill($attributes);
        if ($this->model->save()) {
            return $this->model;
        }
        return false;
    }

    /**
     * Update
     * @param $model
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($model, array $attributes)
    {
        $result = $this->cast($model);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    /**
     * Delete
     *
     * @param $model
     * @return bool
     * @throws \Exception
     */
    public function delete($model)
    {
        $result = $this->cast($model);
        if ($result) {
            $result->delete();
            return true;
        }
        return false;
    }

    /**
     * Make a new instance of the entity to query on.
     *
     * @param array $with
     * @return Builder|Model
     */
    public function make(array $with = [])
    {
        return $this->model->with($with);
    }

    /**
     * Return all results that have a required relationship.
     *
     * @param string $relation
     * @param array $with
     * @return Builder[]|Collection
     */
    public function has($relation, array $with = [])
    {
        $entity = $this->make($with);
        return $entity->has($relation)->get();
    }

    /**
     * Find a single entity by key value.
     *
     * @param string $key
     * @param string $value
     * @param array $with
     * @return Builder|Model|object|null
     */
    public function getFirstBy($key, $value, array $with = [])
    {
        return $this->make($with)->where($key, $value)->first();
    }

    /**
     * Find a single entity  multiple key value.
     *
     * @param array $array
     * @param array $with
     * @return Builder|Model|object|null
     */
    public function getFirstByMultiple(array $array, array $with = [])
    {
        return $this->make($with)->where($array)->first();
    }

    /**
     * Find many entities by key value.
     *
     * @param string $key
     * @param string $value
     * @param array $with
     * @return Builder[]|Collection
     */
    public function getManyBy($key, $value, array $with = [])
    {
        return $this->make($with)->where($key, $value)->get();
    }

    /**
     * Find many entities by key in array values.
     *
     * @param string $key
     * @param string $value
     * @param array $with
     * @return Builder[]|Collection
     */
    public function getManyInArray($key, $array, array $with = [])
    {
        return $this->make($with)->whereIn($key, $array)->get();
    }

    /**
     * Find many entities by key in array values.
     *
     * @param int $id
     * @param string $key
     * @param string $value
     * @param array $with
     * @return Collection
     */
    public function getManyInArrayExceptId(int $exceptId, string $key, array $array, array $with = [])
    {
        return $this->getManyInArray($key, $array, $with)->except($exceptId);
    }

    /**
     * @return Model
     */
    public function originalModel()
    {
        return new $this->model;
    }

    public function filterOptions($builder, array $params)
    {
        foreach ($this->model->filterable as $field) {
            $param = $params[$field] ?? '';
            if ($param !== '') {
                $builder = $builder->where($field, $param);
            }
        }
        return $builder;
    }

    /**
     * Cast the parameter to Model
     * @param  mixed $model the parameter
     * @return Model
     */
    protected function cast($model)
    {
        if ($model instanceof Model) {
            return $model;
        } elseif ($this->model->id === $model) {
            return $this->model;
        } else {
            return $this->find($model);
        }
    }

    public function insertBatch($instance, array $columns, array $values, int $batchSize = 500): void
    {
        Batch::insert($instance, $columns, $values, $batchSize);
    }

    public function updateBatch($instance, array $value, string $index): void
    {
        Batch::update($instance, $value, $index);
    }

    public function deleteWhereIn(string $key, array $values): bool
    {
        return $this->make()->whereIn($key, $values)->delete();
    }
}
