<?php

return [
    'messages' => [
        'updated' => 'O estado do país foi atualizado com sucesso.',
    ],

    'validation' => [
        'scope_required' => 'O escopo é obrigatório.',
        'scope_in' => 'O escopo de atualização é inválido.',

        'country_ids_array' => 'A seleção de países deve ser um array válido.',
        'country_ids_integer' => 'Cada identificador de país deve ser um número inteiro.',
        'country_ids_exists' => 'Um ou mais países selecionados não existem.',
        'country_ids_required' => 'Deve ser selecionado pelo menos um país.',
        'country_ids_single' => 'Deve ser fornecido exatamente um país para o escopo individual.',

        'is_active_required' => 'O indicador de estado é obrigatório.',
        'is_active_boolean' => 'O indicador de estado deve ser verdadeiro ou falso.',
    ],

    'view' => [
        'countries' => 'Países',
        'description' => 'Gerencie os países disponíveis no seu espaço de reservas.',

        'table' => [
            'official_name' => 'Nome oficial',
            'language' => 'Idioma',
            'currency' => 'Moeda',
            'phone_code' => 'Código telefônico',
            'status' => 'Estado',
            'action' => 'Ação',
            'active' => 'Ativo',
            'inactive' => 'Inativo',
            'activate' => 'Ativar',
            'deactivate' => 'Desativar',
        ],

        'actions' => [
            'selected' => 'selecionado(s)',
            'activate_selected' => 'Ativar selecionados',
            'deactivate_selected' => 'Desativar selecionados',
            'set_all_active' => 'Ativar todos',
            'set_all_inactive' => 'Desativar todos',
        ],
        
        'alerts' => [
            'future_behavior_note' => 'Estas configurações de país estão preparadas para futuras funcionalidades regionais. Por enquanto, não afetam o comportamento atual do seu espaço de reservas.',
        ],
    ],
];
