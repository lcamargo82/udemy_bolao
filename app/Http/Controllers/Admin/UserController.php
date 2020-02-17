<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //configuracao do sistema de usuarios, deixando-o mais dinamico possivel

    //Deixando a view de listagem de usuarios mais dinamica, substituindo onde for usuario por routeName
    private $route = 'users';
    private $paginate = 3;
    private $search = ['name', 'email'];
    private $model;

    public function __construct(UserRepositoryInterface $model)
    {
        $this->model = $model;
        /*metodo para impedir o acesso deste controller sem estar logado no sistema
        melhor metodo para isso e levar este sistema, abaixo, para as rotas*/
        //$this->middleware('auth');
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
        $page = trans('tradutor.user_list');

        //Deixando a view de listagem de usuarios mais dinamica, substituindo onde for usuario por routeName
        $routeName = $this->route;

        $breadcrumb = [
            (object)['url' => route('home') , 'title' => 'Home'],
            (object)['url' => '' , 'title' => trans('tradutor.list', ['page' => $page])],
        ];

        //session()->flash('msg', 'Olá');
        //session()->flash('status', 'error');

        return view('admin.user.index', compact('users', 'search', 'page', 'routeName', 'columnList', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routeName = $this->route;
        $page = trans('tradutor.user_list');

        $breadcrumb = [
            (object)['url' => route('home') , 'title' => 'Home'],
            (object)['url' => route($routeName.'.index') , 'title' => trans('tradutor.list', ['page' => $page])],
            (object)['url' => '' , 'title' => 'Adicionar Usuário'],
        ];

        return view('admin.user.create', compact( 'page', 'routeName', 'breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();

        if ($this->model->create($data)) {
            session()->flash('msg', 'Usuário adicionado com sucesso');
            session()->flash('status', 'success');
            return redirect()->back();
        } else {
            session()->flash('msg', 'Não foi possível adicionar');
            session()->flash('status', 'error');
            return redirect()->back();
        }
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
