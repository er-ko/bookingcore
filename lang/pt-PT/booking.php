<?php

return [
	'errors' => [
		'activity_inactive' => 'A atividade selecionada não existe ou está inativa.',
		'unit_invalid' => 'A unidade selecionada não existe, está inativa ou não pertence à sucursal indicada.',
		'activity_not_available_for_unit' => 'A atividade selecionada não está disponível para a unidade selecionada.',
		'unit_already_booked' => 'A unidade selecionada já está reservada para o intervalo de tempo indicado.',
		'booking_conflict' => 'A reserva entra em conflito com uma reserva existente.',
		'slot_overlap' => 'O horário de reserva selecionado sobrepõe-se a uma reserva existente.',
		'outside_working_hours' => 'O horário de reserva selecionado está fora do horário de funcionamento.',
		'during_time_off' => 'O horário de reserva selecionado encontra-se dentro de um período de indisponibilidade bloqueado.',
		'already_cancelled' => 'A reserva já está cancelada.',
		'cancelled_cannot_be_updated' => 'As reservas canceladas não podem ser atualizadas.',
		'same_status' => 'A reserva já está marcada como :status.',
		'use_cancel_action' => 'Utilize a ação de cancelar reserva para cancelar uma reserva.',
		'invalid_activity_minutes' => 'A duração da atividade deve ser superior a zero minutos.',
		'negative_buffer_minutes' => 'Os minutos de margem não podem ser negativos.',
		'invalid_slot_block' => 'O bloco total do horário deve ser superior a zero.',
		'invalid_total_slot_block' => 'O bloco total do horário deve ser superior a zero.',
		'invalid_time_range' => 'O início do intervalo de tempo deve ser anterior ao fim.',
		'invalid_day_of_week' => 'Dia da semana inválido: :value',
		'invalid_booking_status' => 'Estado de reserva inválido: :value',
	],

	'validation' => [
		'branch_required' => 'A sucursal é obrigatória.',
        'branch_invalid' => 'O identificador da sucursal é inválido.',
        'branch_not_found' => 'A sucursal selecionada não existe.',

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
        'customer_first_name_invalid' => 'O primeiro nome do cliente deve ser uma cadeia de caracteres.',
        'customer_first_name_too_long' => 'O primeiro nome do cliente é demasiado longo.',

        'customer_last_name_required' => 'O apelido do cliente é obrigatório.',
        'customer_last_name_invalid' => 'O apelido do cliente deve ser uma cadeia de caracteres.',
        'customer_last_name_too_long' => 'O apelido do cliente é demasiado longo.',

        'customer_email_required' => 'O e-mail do cliente é obrigatório.',
        'customer_email_invalid' => 'O e-mail do cliente deve ser um endereço válido.',
        'customer_email_too_long' => 'O e-mail do cliente é demasiado longo.',

        'customer_phone_code_required' => 'O indicativo telefónico é obrigatório.',
        'customer_phone_code_invalid' => 'O indicativo telefónico deve ser uma cadeia de caracteres.',
        'customer_phone_code_too_long' => 'O indicativo telefónico é demasiado longo.',

        'customer_phone_required' => 'O número de telefone é obrigatório.',
        'customer_phone_invalid' => 'O número de telefone deve ser uma cadeia de caracteres.',
        'customer_phone_too_long' => 'O número de telefone é demasiado longo.',

        'note_invalid' => 'A nota deve ser uma cadeia de caracteres.',

        'status_required' => 'O estado da reserva é obrigatório.',
        'status_invalid' => 'O formato do estado da reserva é inválido.',
        'status_not_allowed' => 'O estado de reserva selecionado não é permitido.',

        'date_required' => 'A data é obrigatória.',
        'date_invalid' => 'O formato da data é inválido.',
	],
];
