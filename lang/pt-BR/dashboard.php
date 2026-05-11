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
		'cancelled' => 'A reserva foi cancelada com sucesso.',
		'status_updated' => 'O estado da reserva foi atualizado com sucesso.',
    ],

	'validation' => [
        'status_required' => 'O estado da reserva é obrigatório.',
        'status_invalid' => 'O formato do estado da reserva é inválido.',
        'status_not_allowed' => 'O estado de reserva selecionado não é permitido.',
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

        'actions' => [
            'confirm' => 'Confirmar',
            'complete' => 'Concluir',
            'cancel' => 'Cancelar',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Tem certeza de que deseja cancelar esta reserva?',
        ],

    ],
];
