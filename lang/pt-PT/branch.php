<?php

return [
    'messages' => [
        'created'   => 'A sucursal foi criada com sucesso.',
        'updated'   => 'A sucursal foi atualizada com sucesso.',
        'deleted'   => 'A sucursal foi eliminada com sucesso.',
        'failed'    => 'Não foi possível processar o pedido de sucursal.',
        'not_found' => 'Sucursal não encontrada.',
        'has_units' => 'A sucursal não pode ser eliminada porque ainda contém unidades.',
        'has_bookings' => 'A sucursal não pode ser eliminada porque ainda contém reservas.',
		'limit_reached' => 'Atingiu o número máximo permitido de sucursais.',
    ],

    'validation' => [
        'name_required' => 'O nome da sucursal é obrigatório.',
        'name_max' => 'O nome da sucursal não pode ter mais de 255 caracteres.',

        'address_line_1_max' => 'A linha de morada 1 não pode ter mais de 255 caracteres.',
        'address_line_2_max' => 'A linha de morada 2 não pode ter mais de 255 caracteres.',

        'city_max' => 'A cidade não pode ter mais de 255 caracteres.',
        'postcode_max' => 'O código postal não pode ter mais de 32 caracteres.',

        'country_code_size' => 'O código do país deve ter exatamente 2 caracteres.',

        'timezone_required' => 'O fuso horário é obrigatório.',
        'timezone_max' => 'O fuso horário não pode ter mais de 64 caracteres.',

        'is_active_required' => 'O estado ativo é obrigatório.',
        'is_active_boolean' => 'O estado ativo deve ser verdadeiro ou falso.',
    ],

    'view' => [
        'title' => 'Sucursal',
        'branches' => 'Sucursais',
        'create_branch' => 'Criar sucursal',
        'edit_branch' => 'Editar sucursal',
        'index_description' => 'Gira as suas sucursais, incluindo detalhes de morada, fuso horário e estado ativo.',
        'create_description' => 'Crie uma nova sucursal com detalhes de morada, fuso horário e estado de ativação.',
        'edit_description' => 'Atualize os detalhes da sucursal, a morada, o fuso horário e o estado de ativação.',
        'back_to_branches' => 'Voltar às sucursais',
        'create_first_branch' => 'Criar a sua primeira sucursal',
        'no_branches_found' => 'Não foram encontradas sucursais.',
        'no_branches_text' => 'Ainda não existem sucursais para apresentar. Crie a primeira sucursal para começar a organizar a sua estrutura de reservas.',

        'table' => [
            'branch' => 'Sucursal',
            'address' => 'Morada',
            'city' => 'Cidade',
            'timezone' => 'Fuso horário',
            'no_address_text' => 'Nenhuma morada especificada',
            'status' => 'Estado',
            'updated' => 'Atualizado',
            'actions' => 'Ações',
            'active' => 'Ativo',
            'inactive' => 'Inativo',
        ],

        'overview' => [
            'title' => 'Resumo da sucursal',
            'branch_id_title' => 'ID da sucursal',
            'countries_available_title' => 'Países disponíveis',
            'city_and_postcode_title' => 'Cidade e código postal',
            'country_and_timezone_title' => 'País e fuso horário',
            'timezone_title' => 'Fuso horário',
            'timezone_text' => 'Com base no país selecionado',
            'limit_title' => 'Limite',
            'limit_text' => 'Pode criar até 10 sucursais.',
            'duration_text' => 'Defina a localização da sucursal e as predefinições regionais.',
            'required_title' => 'Obrigatório',
            'optional_title' => 'Opcional',
            'status_title' => 'Estado atual',
            'active_title' => 'Ativo',
            'inactive_title' => 'Inativo',
            'note_title' => 'Nota',
            'note_text' => 'A atualização desta sucursal não afetará outras sucursais no sistema.',
        ],

        'form' => [
            'branch_details' => 'Detalhes da sucursal',
            'complete_the_form' => 'Preencha o formulário',
            'update_the_form' => 'Atualize o formulário',
            'branch_name_title' => 'Nome da sucursal',
            'address_line_1_title' => 'Linha de morada 1',
            'address_line_2_title' => 'Linha de morada 2',
            'city_title' => 'Cidade',
            'postcode_title' => 'Código postal',
            'country_title' => 'País',
            'select_country' => 'Selecionar país',
            'timezone_title' => 'Fuso horário',
            'select_timezone' => 'Selecionar fuso horário',
            'loading_timezones' => 'A carregar fusos horários...',
            'active_title' => 'Sucursal ativa',
            'active_text' => 'As sucursais inativas podem permanecer guardadas no sistema sem serem utilizadas ativamente.',
        ],

        'actions' => [
            'edit' => 'Editar',
            'delete' => 'Eliminar',
            'cancel' => 'Cancelar',
            'create' => 'Criar sucursal',
            'creating' => 'A criar...',
            'save' => 'Guardar alterações',
            'saving' => 'A guardar...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Tem a certeza de que pretende eliminar esta sucursal?',
        ],

    ],
];
