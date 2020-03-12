<?php

return [
    'regras' =>[
        1 => ['nome' => 'view-post', 'desc' => 'Visualizar posts'],
        2 => ['nome' => 'edit-post', 'desc' => 'Editar posts'],
        3 => ['nome' => 'delete-post', 'desc' => 'Deletar posts'],

        4 => ['nome' => 'view-category', 'desc' => 'Visualizar categorias'],
        5 => ['nome' => 'edit-category', 'desc' => 'Editar categorias'],
        6 => ['nome' => 'delete-category', 'desc' => 'Deletar categorias'],

        7 => ['nome' => 'view-user', 'desc' => 'Visualizar usuários'],
        8 => ['nome' => 'edit-user', 'desc' => 'Editar usuários'],
        9 => ['nome' => 'delete-user', 'desc' => 'Deletar usuários'],

        10 => ['nome' => 'view-groups', 'desc' => 'Visualizar grupos de acesso'],
        11 => ['nome' => 'edit-groups', 'desc' => 'Editar grupos de acesso'],
        12 => ['nome' => 'delete-groups', 'desc' => 'Deletar grupos de acesso'],

        12 => ['nome' => 'view-home', 'desc' => 'Visualizar home'],
    ],
    'groups' => [
        1 => ['nome' => 'Administrador', 'desc' => 'Acesso total ao sistema'],
        2 => ['nome' => 'Revisor', 'desc' => 'Cadastrar e edicar posts e categorias'],
        3 => ['nome' => 'Editar', 'desc' => 'Cadastrar e editar posts'],
    ]
];