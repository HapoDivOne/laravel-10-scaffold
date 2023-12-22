<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll(array $with = [], array $orderBy = []);

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    public function createMany(array $arrayAttributes);

    /**
     * Update
     * @param $model
     * @param array $attributes
     * @return mixed
     */
    public function update($model, array $attributes);

    /**
     * Delete
     * @param $model
     * @return mixed
     */
    public function delete($model);

    /**
     * Get model.
     * @return string
     */
    public function getModel();

    /**
     * @return Model
     */
    public function originalModel();

    public function getFirstBy($key, $value, array $with = []);

    public function getFirstByMultiple(array $array, array $with = []);

    public function getManyBy($key, $value, array $with = []);

    public function getManyInArrayExceptId(int $exceptId, string $key, array $array, array $with = []);

    public function getManyInArray($key, $array, array $with = []);

    public function make(array $with = []);

    public function findOrFail($id);

    public function filterOptions($builder, array $params);

    public function insertBatch($instance, array $columns, array $values, int $batchSize = 500): void;

    public function updateBatch($instance, array $value, string $index): void;

    public function deleteWhereIn(string $key, array $values): bool;
}
