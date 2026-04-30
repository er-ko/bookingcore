<?php

return [
    'messages' => [
        'created'   => 'O preço foi criado com sucesso.',
        'updated'   => 'O preço foi atualizado com sucesso.',
        'deleted'   => 'O preço foi excluído com sucesso.',
        'failed'    => 'Não foi possível processar a solicitação de preço.',
    ],

    'validation' => [
        'branch_required' => 'Selecione uma filial.',
        'branch_invalid' => 'A filial selecionada é inválida.',
        'branch_not_found' => 'A filial selecionada não foi encontrada.',

        'unit_required' => 'Selecione uma unidade.',
        'unit_invalid' => 'A unidade selecionada é inválida.',
        'unit_not_found' => 'A unidade selecionada não foi encontrada.',

        'activity_required' => 'Selecione uma atividade.',
        'activity_invalid' => 'A atividade selecionada é inválida.',
        'activity_not_found' => 'A atividade selecionada não foi encontrada.',

        'price_already_exists' => 'Já existe um preço para a unidade e a atividade selecionadas.',
        'price_not_found' => 'O preço selecionado não foi encontrado.',
        'price_required' => 'Insira um preço.',
        'price_invalid' => 'O preço deve ser um número válido.',
        'price_min' => 'O preço deve ser igual ou maior que zero.',
    ],

    'view' => [
        'title' => 'Preços',
        'description' => 'Defina o preço padrão de cada atividade em uma unidade específica.',

        'form' => [
            'title' => 'Configurações de preço',
            'branch_title' => 'Filial',
            'branch_placeholder' => 'Selecionar filial',
            'unit_title' => 'Unidade',
            'unit_placeholder' => 'Selecionar unidade',
            'activity_title' => 'Atividade',
            'activity_placeholder' => 'Selecionar atividade',
            'price_title' => 'Preço',
            'price_placeholder' => 'Inserir preço',
            'currency_title' => 'Moeda',
            'currency_text' => 'Os preços são salvos na sua moeda padrão.',
        ],

        'table' => [
            'title' => 'Preços salvos',
            'branch_title' => 'Filial',
            'unit_title' => 'Unidade',
            'activity_title' => 'Atividade',
            'price_title' => 'Preço',
            'actions_title' => 'Ações',
        ],

        'actions' => [
            'save' => 'Salvar preço',
            'saving' => 'Salvando...',
            'edit' => 'Editar',
            'update' => 'Atualizar',
            'updating' => 'Atualizando...',
            'delete' => 'Excluir',
            'cancel' => 'Cancelar',
            'deleting' => 'Excluindo...',
        ],

        'states' => [
            'empty_title' => 'Ainda não há preços',
            'empty_text' => 'Crie o primeiro preço para uma combinação de unidade e atividade.',
            'no_branches_title' => 'Nenhuma configuração de preços disponível',
            'no_branches_text' => 'Crie primeiro uma filial para começar a definir preços.',
            'no_units_text' => 'Não há unidades disponíveis para a filial selecionada.',
            'no_activities_text' => 'Não há atividades disponíveis.',
        ],

        'dialogs' => [
            'delete_confirm' => 'Tem certeza de que deseja excluir este preço?',
        ],
    ],
];
