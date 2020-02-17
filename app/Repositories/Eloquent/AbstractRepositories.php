<?php

namespace App\Repositories\Eloquent;

//Mapeando retorno para orientacao e manutencao
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class AbstractRepositories
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    protected function resolveModel()
    {
        return app($this->model);
    }

    public function all(string $column = 'id', string $order = 'ASC'):Collection
    {
        return $this->model->orderBy($column, $order)->get();
    }

    public function paginate(int $paginate = 10, string $column = 'id', string $order = 'ASC'):LengthAwarePaginator
    {
        //o retorno, :LengthAwarePaginator, e para orientacao e manutencao
        return $this->model->orderBy($column, $order)->paginate($paginate);
    }

    public function findWhereLike(array $columns, string $search, string $column = 'id', string $order = 'ASC'):Collection
    {
        $query = $this->model;

        foreach ($columns as $key => $value) {
            $query = $query->orWhere($value, 'like', '%' .$search. '%');
        }

        return $query->orderBy($column, $order)->get();
    }

    public function create(array $data):Bool
    {
        return (bool) $this->model->create($data);
    }
}
