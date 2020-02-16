<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    //configuracao do sistema de usuarios, deixando-o mais dinamico possivel

    //Deixando a view de listagem de usuarios mais dinamica, substituindo onde for usuario por routeName
    private $route = 'users';
    /*primeira opcao para deixar o metodo de traducao dinamico,
    mas pode ocorrer do helper trans() ser alterado, sendo a
    outra opcao, o metodo construtor*/
    // primeira opcao -> private $page = 'tradutor.user_list';
    private $page;
    private $paginate = 2;
    private $search = ['name', 'email'];
    private $model;

    public function __construct(UserRepositoryInterface $model)
    {
        $this->page = trans('tradutor.user_list');
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //exemplo de aplicacao, mas nao viavel devido ter que colocar em todos metodos
        //$lang = session('lang', 'pt-BR');
        //App::setLocale($lang);

        //Definindo colunas para montar a tabela na index.blade, deixando mais dinamico
        $columnList = ['id' => '#', 'name' => 'Nome', 'email' => 'E-mail'];
        $search = "";

        if (isset($request->search)) {
            $search = $request->search;
            $users = $this->model->findWhereLike($this->search, $search, 'id', 'DESC');
        } else {
            $users = $this->model->paginate($this->paginate, 'id', 'DESC');
        }

        //helper de traducao para controllers...
        $page = $this->page;

        //Deixando a view de listagem de usuarios mais dinamica, substituindo onde for usuario por routeName
        $routeName = $this->route;

        $breadcrumb = [
            (object)['url' => route('home') , 'title' => 'Home'],
            (object)['url' => '' , 'title' => trans('tradutor.list', ['page' => $page])],
        ];

        $request->session()->flash('msg', 'Olá');
        $request->session()->flash('status', 'error');

        return view('admin.user.index', compact('users', 'search', 'page', 'routeName', 'columnList', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
