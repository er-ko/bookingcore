<?php

return [
    'messages' => [
        'updated' => 'O estado do idioma foi atualizado com sucesso.',
    ],

    'validation' => [
		'scope_required' => 'O escopo é obrigatório.',
		'scope_in' => 'O escopo de atualização é inválido.',

		'language_ids_array' => 'A seleção de idiomas deve ser um array válido.',
		'language_ids_integer' => 'Cada identificador de idioma deve ser um número inteiro.',
		'language_ids_exists' => 'Um ou mais idiomas selecionados não existem.',
		'language_ids_required' => 'Deve ser selecionado pelo menos um idioma.',
		'language_ids_single' => 'Deve ser fornecido exatamente um idioma para o escopo individual.',

		'is_active_required' => 'O indicador de estado é obrigatório.',
		'is_active_boolean' => 'O indicador de estado deve ser verdadeiro ou falso.',
	],

    'view' => [
        'languages' => 'Idiomas',
        'description' => 'Gerencie os idiomas disponíveis no seu espaço de trabalho. Apenas os idiomas ativos serão exibidos nas seleções relacionadas a idiomas.',

        'table' => [
            'name' => 'Nome',
            'local_name' => 'Nome local',
            'tag' => 'Tag',
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
            'future_behavior_note' => 'Estas configurações de idioma estão preparadas para futuras funcionalidades multilíngues. Por enquanto, não afetam o comportamento atual do seu espaço de reservas.',
        ],
    ],
];
