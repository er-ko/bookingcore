<?php

return [
    'messages' => [
        'created'   => 'O preço foi criado com sucesso.',
        'updated'   => 'O preço foi atualizado com sucesso.',
        'deleted'   => 'O preço foi eliminado com sucesso.',
        'failed'    => 'Não foi possível processar o pedido de preço.',
    ],

    'validation' => [
        'branch_required' => 'Selecione uma sucursal.',
        'branch_invalid' => 'A sucursal selecionada é inválida.',
        'branch_not_found' => 'A sucursal selecionada não foi encontrada.',

        'unit_required' => 'Selecione uma unidade.',
        'unit_invalid' => 'A unidade selecionada é inválida.',
        'unit_not_found' => 'A unidade selecionada não foi encontrada.',

        'activity_required' => 'Selecione uma atividade.',
        'activity_invalid' => 'A atividade selecionada é inválida.',
        'activity_not_found' => 'A atividade selecionada não foi encontrada.',

        'price_already_exists' => 'Já existe um preço para a unidade e a atividade selecionadas.',
        'price_not_found' => 'O preço selecionado não foi encontrado.',
        'price_required' => 'Introduza um preço.',
        'price_invalid' => 'O preço deve ser um número válido.',
        'price_min' => 'O preço deve ser igual ou superior a zero.',
    ],

    'view' => [
        'title' => 'Preços',
        'description' => 'Defina o preço predefinido de cada atividade numa unidade específica.',

        'form' => [
            'title' => 'Definições de preço',
            'branch_title' => 'Sucursal',
            'branch_placeholder' => 'Selecionar sucursal',
            'unit_title' => 'Unidade',
            'unit_placeholder' => 'Selecionar unidade',
            'activity_title' => 'Atividade',
            'activity_placeholder' => 'Selecionar atividade',
            'price_title' => 'Preço',
            'price_placeholder' => 'Introduzir preço',
            'currency_title' => 'Moeda',
            'currency_text' => 'Os preços são guardados na sua moeda predefinida.',
        ],

        'table' => [
            'title' => 'Preços guardados',
            'branch_title' => 'Sucursal',
            'unit_title' => 'Unidade',
            'activity_title' => 'Atividade',
            'price_title' => 'Preço',
            'actions_title' => 'Ações',
        ],

        'actions' => [
            'save' => 'Guardar preço',
            'saving' => 'A guardar...',
            'edit' => 'Editar',
            'update' => 'Atualizar',
            'updating' => 'A atualizar...',
            'delete' => 'Eliminar',
            'cancel' => 'Cancelar',
            'deleting' => 'A eliminar...',
        ],

        'states' => [
            'empty_title' => 'Ainda não existem preços',
            'empty_text' => 'Crie o primeiro preço para uma combinação de unidade e atividade.',
            'no_branches_title' => 'Nenhuma configuração de preços disponível',
            'no_branches_text' => 'Crie primeiro uma sucursal para começar a definir preços.',
            'no_units_text' => 'Não existem unidades disponíveis para a sucursal selecionada.',
            'no_activities_text' => 'Não existem atividades disponíveis.',
        ],

        'dialogs' => [
            'delete_confirm' => 'Tem a certeza de que pretende eliminar este preço?',
        ],
    ],
];
