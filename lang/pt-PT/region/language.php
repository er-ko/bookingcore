<?php

return [
    'messages' => [
        'updated' => 'O estado do idioma foi atualizado com sucesso.',
    ],

    'validation' => [
		'scope_required' => 'O âmbito é obrigatório.',
		'scope_in' => 'O âmbito de atualização é inválido.',

		'language_ids_array' => 'A seleção de idiomas deve ser uma matriz válida.',
		'language_ids_integer' => 'Cada identificador de idioma deve ser um número inteiro.',
		'language_ids_exists' => 'Um ou mais idiomas selecionados não existem.',
		'language_ids_required' => 'Deve ser selecionado pelo menos um idioma.',
		'language_ids_single' => 'Deve ser fornecido exatamente um idioma para o âmbito individual.',

		'is_active_required' => 'O indicador de estado é obrigatório.',
		'is_active_boolean' => 'O indicador de estado deve ser verdadeiro ou falso.',
	],

    'view' => [
        'languages' => 'Idiomas',
        'description' => 'Gira os idiomas disponíveis no seu espaço de trabalho. Apenas os idiomas ativos serão apresentados nas seleções relacionadas com idiomas.',

        'table' => [
            'name' => 'Nome',
            'local_name' => 'Nome local',
            'tag' => 'Etiqueta',
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
            'future_behavior_note' => 'Estas definições de idioma estão preparadas para futuras funcionalidades multilingues. Por agora, não afetam o comportamento atual do seu espaço de reservas.',
        ],
    ],
];
