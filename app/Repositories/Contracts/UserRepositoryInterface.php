<?php

namespace App\Repositories\Contracts;

//Mapeando retorno para orientacao e manutencao
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function all(string $column = 'id', string $order = 'ASC'):Collection;

    //o retorno, :LengthAwarePaginator, e para orientacao e manutencao
    public function paginate(int $paginate = 10, string $column = 'id', string $order = 'ASC'):LengthAwarePaginator;
    public function findWhereLike(array $columns, string $search, string $column = 'id', string $order = 'ASC'):Collection;
}
