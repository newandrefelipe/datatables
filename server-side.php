<?php

$dados = [
    [
        'checked' => false,
        'id' => 1,
        'it_codigo' => 'ABC123',
        'RM' => 10
    ],
    [
        'checked' => false,
        'id' => 2,
        'it_codigo' => 'XYZ444',
        'RM' => 10
    ],
    [
        'checked' => false,
        'id' => 3,
        'it_codigo' => '987RAT',
        'RM' => 12
    ],
    [
        'checked' => false,
        'id' => 4,
        'it_codigo' => '3RT543',
        'RM' => 15
    ],
    [
        'checked' => false,
        'id' => 5,
        'it_codigo' => '123TRE',
        'RM' => 10
    ],
];

$rm_selecionado = isset($_REQUEST['rm']) ? $_REQUEST['rm'] : '';
$dados_filtrados = [];

// Filtra os registros
if ($rm_selecionado) {
    $dados_filtrados = array_map(function ($obj) use ($rm_selecionado) {
        if ($obj['RM'] == $rm_selecionado) {
            $obj['checked'] = true;
        }
        return $obj;
    }, $dados);
}

if ($dados_filtrados) {
    $dados = $dados_filtrados;
}

header('Content-Type: application/json');
echo json_encode($dados);
