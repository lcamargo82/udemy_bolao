<?php

return [
    //A chave nao muda, ex: login (chave) => Entrar (traducao)
    'login' => 'Entrar',
    'register' => 'Cadastrar',
    'logout' => 'Sair',
    'user_list' => 'Usuários',
    /*o uso do :page e para complementar a traducao, invertendo as propriedades,
    o :page esta recenbendo valor como parametro da blade ['page' => $page]
    e o $page esta recebendo valor da controller*/
    'list' => 'Lista de :page',
    'lang' => 'en'

];
