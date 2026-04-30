<?php

return [
	'errors' => [
		'activity_inactive' => 'A atividade selecionada não existe ou está inativa.',
		'unit_invalid' => 'A unidade selecionada não existe, está inativa ou não pertence à filial indicada.',
		'activity_not_assigned' => 'A atividade selecionada não está atribuída à unidade selecionada.',
        'activity_not_available_for_unit' => 'A atividade selecionada não está disponível para a unidade selecionada.',
		'unit_already_booked' => 'A unidade selecionada já está reservada para o intervalo de tempo indicado.',
		'booking_conflict' => 'A reserva entra em conflito com uma reserva existente.',
		'slot_overlap' => 'O horário de reserva selecionado se sobrepõe a uma reserva existente.',
		'outside_working_hours' => 'O horário de reserva selecionado está fora do horário de funcionamento.',
		'during_time_off' => 'O horário de reserva selecionado está dentro de um período de indisponibilidade bloqueado.',
		'already_cancelled' => 'A reserva já está cancelada.',
		'cancelled_cannot_be_updated' => 'As reservas canceladas não podem ser atualizadas.',
		'same_status' => 'A reserva já está marcada como :status.',
		'use_cancel_action' => 'Use a ação de cancelar reserva para cancelar uma reserva.',
		'invalid_activity_minutes' => 'A duração da atividade deve ser maior que zero minutos.',
		'negative_buffer_minutes' => 'Os minutos de margem não podem ser negativos.',
		'invalid_slot_block' => 'O bloco total do horário deve ser maior que zero.',
		'invalid_total_slot_block' => 'O bloco total do horário deve ser maior que zero.',
		'invalid_time_range' => 'O início do intervalo de tempo deve ser anterior ao fim.',
		'invalid_day_of_week' => 'Dia da semana inválido: :value',
		'invalid_booking_status' => 'Estado de reserva inválido: :value',
	],

    'messages' => [
		'created' => 'A reserva foi criada com sucesso.',
		'failed' => 'Não foi possível criar a reserva.',
		'cancelled' => 'A reserva foi cancelada com sucesso.',
		'status_updated' => 'O estado da reserva foi atualizado com sucesso.',
        'not_found' => 'A reserva selecionada não foi encontrada.',
    ],

	'validation' => [
		'branch_required' => 'A filial é obrigatória.',
        'branch_invalid' => 'O identificador da filial é inválido.',
        'branch_not_found' => 'A filial selecionada não existe.',

        'unit_required' => 'A unidade é obrigatória.',
        'unit_invalid' => 'O identificador da unidade é inválido.',
        'unit_not_found' => 'A unidade selecionada não existe.',

        'activity_required' => 'A atividade é obrigatória.',
        'activity_invalid' => 'O identificador da atividade é inválido.',
        'activity_not_found' => 'A atividade selecionada não existe.',
        'activity_not_available_for_unit' => 'A atividade selecionada não está disponível para a unidade selecionada.',

        'starts_at_required' => 'A hora de início é obrigatória.',
        'starts_at_invalid' => 'O formato da hora de início é inválido.',

        'customer_required' => 'As informações do cliente são obrigatórias.',
        'customer_invalid' => 'O formato dos dados do cliente é inválido.',

        'customer_first_name_required' => 'O primeiro nome do cliente é obrigatório.',
        'customer_first_name_invalid' => 'O primeiro nome do cliente deve ser um texto válido.',
        'customer_first_name_too_long' => 'O primeiro nome do cliente é muito longo.',

        'customer_last_name_required' => 'O sobrenome do cliente é obrigatório.',
        'customer_last_name_invalid' => 'O sobrenome do cliente deve ser um texto válido.',
        'customer_last_name_too_long' => 'O sobrenome do cliente é muito longo.',

        'customer_email_required' => 'O e-mail do cliente é obrigatório.',
        'customer_email_invalid' => 'O e-mail do cliente deve ser um endereço válido.',
        'customer_email_too_long' => 'O e-mail do cliente é muito longo.',

        'customer_phone_code_required' => 'O código telefônico é obrigatório.',
        'customer_phone_code_invalid' => 'O código telefônico deve ser um texto válido.',
        'customer_phone_code_too_long' => 'O código telefônico é muito longo.',

        'customer_phone_required' => 'O número de telefone é obrigatório.',
        'customer_phone_invalid' => 'O número de telefone deve ser um texto válido.',
        'customer_phone_too_long' => 'O número de telefone é muito longo.',

        'note_invalid' => 'A nota deve ser um texto válido.',

        'status_required' => 'O estado da reserva é obrigatório.',
        'status_invalid' => 'O formato do estado da reserva é inválido.',
        'status_not_allowed' => 'O estado de reserva selecionado não é permitido.',

        'date_required' => 'A data é obrigatória.',
        'date_invalid' => 'O formato da data é inválido.',
	],

	'view' => [
        'title' => 'Painel',
        'create_booking' => 'Criar reserva',
        'edit_booking' => 'Editar reserva',
        'index_description' => 'Resumo das reservas criadas, incluindo o estado atual e as entidades relacionadas.',
        'create_description' => 'Crie uma nova reserva com os detalhes do cliente, a seleção do serviço e um horário disponível.',
        'edit_description' => 'Atualize os detalhes da reserva, as informações do cliente e o estado da reserva.',
        'back_to_dashboard' => 'Voltar ao painel',
        'create_first_booking' => 'Criar sua primeira reserva',
        'no_bookings_found' => 'Não foram encontradas reservas.',
        'no_bookings_text' => 'Ainda não há reservas para exibir. Crie a primeira reserva para começar a trabalhar com o sistema.',

        'table' => [
            'customer' => 'Cliente',
            'branch' => 'Filial',
            'unit' => 'Unidade',
            'activity' => 'Atividade',
            'starts_at' => 'Começa às',
            'ends_at' => 'Termina às',
            'status' => 'Estado',
            'actions' => 'Ações',
            'active' => 'Ativo',
            'inactive' => 'Inativo',
        ],

        'overview' => [
            'title' => 'Resumo da reserva',

            'customer_title' => 'Detalhes do cliente',
            'customer_text' => 'Insira as informações do cliente necessárias para criar a reserva.',

            'booking_flow_title' => 'Fluxo de reserva',
            'booking_flow_text' => 'Selecione uma filial, depois uma unidade, uma atividade, uma data e um horário disponível.',

            'availability_title' => 'Disponibilidade',
            'availability_text' => 'Os horários disponíveis são carregados com base na filial, unidade, atividade e data selecionadas.',

            'required_title' => 'Obrigatório',
            'required_items' => [
                'first_and_last_name' => 'Primeiro nome e sobrenome',
                'phone_code_and_number' => 'Código e número de telefone',
                'branch' => 'Filial',
                'unit' => 'Unidade',
                'activity' => 'Atividade',
                'date' => 'Data',
                'slot' => 'Horário disponível',
            ],

            'optional_title' => 'Opcional',
            'optional_items' => [
                'email' => 'E-mail',
                'note' => 'Nota',
            ],

            'note_title' => 'Nota',
            'note_text' => 'Uma reserva só pode ser criada depois de ser selecionado um horário disponível válido.',
        ],

        'form' => [
            'booking_details' => 'Detalhes da reserva',
            'complete_the_reservation' => 'Complete a reserva',
            'customer_details' => 'Detalhes do cliente',
            'first_name_title' => 'Primeiro nome',
            'last_name_title' => 'Sobrenome',
            'email_title' => 'E-mail',
            'phone_code_title' => 'Código',
            'phone_title' => 'Telefone',
            'branch_title' => 'Filial',
            'select_branch' => 'Selecionar filial',
            'unit_title' => 'Unidade',
            'select_unit' => 'Selecionar unidade',
            'loading_units' => 'Carregando unidades...',
            'activity_title' => 'Atividade',
            'select_activity' => 'Selecionar atividade',
            'loading_activities' => 'Carregando atividades...',
            'date_title' => 'Data',
            'available_slots_title' => 'Horários disponíveis',
            'available_slots_count' => 'horário(s) disponível(is)',
            'loading_slots' => 'Carregando horários...',
            'no_available_slots' => 'Não foram encontrados horários disponíveis para a data selecionada.',
            'select_slot' => 'Selecionar horário',
            'note_title' => 'Nota',
        ],

        'actions' => [
            'confirm' => 'Confirmar',
            'complete' => 'Concluir',
            'cancel' => 'Cancelar',
            'create' => 'Criar reserva',
            'creating' => 'Criando...',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Tem certeza de que deseja cancelar esta reserva?',
        ],

    ],
];
