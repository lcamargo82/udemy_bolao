<?php

return [
    //A chave nao muda, ex: login (chave) => Login (traducao)
    'login' => 'Login',
    'register' => 'Register',
    'logout' => 'Logout',
    'user_list' => 'User',
    /*o uso do :page e para complementar a traducao, invertendo as propriedades,
    o :page esta recenbendo valor como parametro da blade ['page' => $page]
    e o $page esta recebendo valor da controller*/
    'list' => ':page List',
    'lang' => 'pt-br'

];

