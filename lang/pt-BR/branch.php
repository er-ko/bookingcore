<?php

return [
    'messages' => [
        'created'   => 'A filial foi criada com sucesso.',
        'updated'   => 'A filial foi atualizada com sucesso.',
        'deleted'   => 'A filial foi excluída com sucesso.',
        'failed'    => 'Não foi possível processar a solicitação de filial.',
        'not_found' => 'Filial não encontrada.',
        'has_units' => 'A filial não pode ser excluída porque ainda contém unidades.',
        'has_bookings' => 'A filial não pode ser excluída porque ainda contém reservas.',
		'limit_reached' => 'Você atingiu o número máximo permitido de filiais.',
    ],

    'validation' => [
        'name_required' => 'O nome da filial é obrigatório.',
        'name_max' => 'O nome da filial não pode ter mais de 255 caracteres.',

        'address_line_1_max' => 'A linha de endereço 1 não pode ter mais de 255 caracteres.',
        'address_line_2_max' => 'A linha de endereço 2 não pode ter mais de 255 caracteres.',

        'city_max' => 'A cidade não pode ter mais de 255 caracteres.',
        'postcode_max' => 'O CEP não pode ter mais de 32 caracteres.',

        'country_code_size' => 'O código do país deve ter exatamente 2 caracteres.',

        'timezone_required' => 'O fuso horário é obrigatório.',
        'timezone_max' => 'O fuso horário não pode ter mais de 64 caracteres.',

        'is_active_required' => 'O estado ativo é obrigatório.',
        'is_active_boolean' => 'O estado ativo deve ser verdadeiro ou falso.',
    ],

    'view' => [
        'title' => 'Filial',
        'branches' => 'Filiais',
        'create_branch' => 'Criar filial',
        'edit_branch' => 'Editar filial',
        'index_description' => 'Gerencie suas filiais, incluindo detalhes de endereço, fuso horário e estado ativo.',
        'create_description' => 'Crie uma nova filial com detalhes de endereço, fuso horário e estado de ativação.',
        'edit_description' => 'Atualize os detalhes da filial, o endereço, o fuso horário e o estado de ativação.',
        'back_to_branches' => 'Voltar às filiais',
        'create_first_branch' => 'Criar sua primeira filial',
        'no_branches_found' => 'Não foram encontradas filiais.',
        'no_branches_text' => 'Ainda não há filiais para exibir. Crie a primeira filial para começar a organizar sua estrutura de reservas.',

        'table' => [
            'branch' => 'Filial',
            'address' => 'Endereço',
            'city' => 'Cidade',
            'timezone' => 'Fuso horário',
            'no_address_text' => 'Nenhum endereço especificado',
            'status' => 'Estado',
            'updated' => 'Atualizado',
            'actions' => 'Ações',
            'active' => 'Ativo',
            'inactive' => 'Inativo',
        ],

        'overview' => [
            'title' => 'Resumo da filial',
            'branch_id_title' => 'ID da filial',
            'countries_available_title' => 'Países disponíveis',
            'city_and_postcode_title' => 'Cidade e CEP',
            'country_and_timezone_title' => 'País e fuso horário',
            'timezone_title' => 'Fuso horário',
            'timezone_text' => 'Com base no país selecionado',
            'limit_title' => 'Limite',
            'limit_text' => 'Você pode criar até 10 filiais.',
            'duration_text' => 'Defina a localização da filial e os padrões regionais.',
            'required_title' => 'Obrigatório',
            'optional_title' => 'Opcional',
            'status_title' => 'Estado atual',
            'active_title' => 'Ativo',
            'inactive_title' => 'Inativo',
            'note_title' => 'Nota',
            'note_text' => 'A atualização desta filial não afetará outras filiais no sistema.',
        ],

        'form' => [
            'branch_details' => 'Detalhes da filial',
            'complete_the_form' => 'Preencha o formulário',
            'update_the_form' => 'Atualize o formulário',
            'branch_name_title' => 'Nome da filial',
            'address_line_1_title' => 'Linha de endereço 1',
            'address_line_2_title' => 'Linha de endereço 2',
            'city_title' => 'Cidade',
            'postcode_title' => 'CEP',
            'country_title' => 'País',
            'select_country' => 'Selecionar país',
            'timezone_title' => 'Fuso horário',
            'select_timezone' => 'Selecionar fuso horário',
            'loading_timezones' => 'Carregando fusos horários...',
            'active_title' => 'Filial ativa',
            'active_text' => 'As filiais inativas podem permanecer salvas no sistema sem serem utilizadas ativamente.',
        ],

        'actions' => [
            'edit' => 'Editar',
            'delete' => 'Excluir',
            'cancel' => 'Cancelar',
            'create' => 'Criar filial',
            'creating' => 'Criando...',
            'save' => 'Salvar alterações',
            'saving' => 'Salvando...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Tem certeza de que deseja excluir esta filial?',
        ],

    ],
];
