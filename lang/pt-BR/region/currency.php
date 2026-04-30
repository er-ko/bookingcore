<?php

return [
    'messages' => [
        'updated' => 'O estado da moeda foi atualizado com sucesso.',
    ],

    'validation' => [
		'scope_required' => 'O escopo é obrigatório.',
		'scope_in' => 'O escopo de atualização é inválido.',

		'currency_ids_array' => 'A seleção de moedas deve ser um array válido.',
		'currency_ids_integer' => 'Cada identificador de moeda deve ser um número inteiro.',
		'currency_ids_exists' => 'Uma ou mais moedas selecionadas não existem.',
		'currency_ids_required' => 'Deve ser selecionada pelo menos uma moeda.',
		'currency_ids_single' => 'Deve ser fornecida exatamente uma moeda para o escopo individual.',

		'is_active_required' => 'O indicador de estado é obrigatório.',
		'is_active_boolean' => 'O indicador de estado deve ser verdadeiro ou falso.',
	],

    'view' => [
        'currencies' => 'Moedas',
        'description' => 'Gerencie as moedas disponíveis no seu espaço de trabalho. Apenas as moedas ativas serão exibidas nas seleções relacionadas a moedas.',

        'table' => [
            'name' => 'Nome',
            'decimal' => 'Decimais',
            'symbol' => 'Símbolo',
            'status' => 'Estado',
            'action' => 'Ação',
            'active' => 'Ativo',
            'inactive' => 'Inativo',
            'activate' => 'Ativar',
            'deactivate' => 'Desativar',
        ],

        'actions' => [
            'selected' => 'selecionado(s)',
            'activate_selected' => 'Ativar selecionadas',
            'deactivate_selected' => 'Desativar selecionadas',
            'set_all_active' => 'Ativar todas',
            'set_all_inactive' => 'Desativar todas',
        ],

        'alerts' => [
            'future_behavior_note' => 'Estas configurações de moeda estão preparadas para futuras funcionalidades de preços e região. Por enquanto, não afetam o comportamento atual do seu espaço de reservas.',
        ],
    ],
];
