<?php

return [
	'errors' => [
		'activity_inactive' => 'La actividad seleccionada no existe o está inactiva.',
		'unit_invalid' => 'La unidad seleccionada no existe, está inactiva o no pertenece a la sucursal indicada.',
		'activity_not_assigned' => 'La actividad seleccionada no está asignada a la unidad seleccionada.',
        'activity_not_available_for_unit' => 'La actividad seleccionada no está disponible para la unidad seleccionada.',
		'unit_already_booked' => 'La unidad seleccionada ya está reservada para el intervalo de tiempo indicado.',
		'booking_conflict' => 'La reserva entra en conflicto con una reserva existente.',
		'slot_overlap' => 'El intervalo de reserva seleccionado se solapa con una reserva existente.',
		'outside_working_hours' => 'El intervalo de reserva seleccionado está fuera del horario laboral.',
		'during_time_off' => 'El intervalo de reserva seleccionado se encuentra dentro de un período de indisponibilidad bloqueado.',
		'already_cancelled' => 'La reserva ya está cancelada.',
		'cancelled_cannot_be_updated' => 'Las reservas canceladas no se pueden actualizar.',
		'same_status' => 'La reserva ya está marcada como :status.',
		'use_cancel_action' => 'Utilice la acción de cancelar reserva para cancelar una reserva.',
		'invalid_activity_minutes' => 'Los minutos de la actividad deben ser superiores a cero.',
		'negative_buffer_minutes' => 'Los minutos de margen no pueden ser negativos.',
		'invalid_slot_block' => 'El bloque total del intervalo debe ser superior a cero.',
		'invalid_total_slot_block' => 'El bloque total del intervalo debe ser superior a cero.',
		'invalid_time_range' => 'El inicio del intervalo de tiempo debe ser anterior al final.',
		'invalid_day_of_week' => 'Día de la semana no válido: :value',
		'invalid_booking_status' => 'Estado de reserva no válido: :value',
	],

    'messages' => [
		'cancelled' => 'La reserva se ha cancelado correctamente.',
		'status_updated' => 'El estado de la reserva se ha actualizado correctamente.',
    ],

	'validation' => [
        'status_required' => 'El estado de la reserva es obligatorio.',
        'status_invalid' => 'El formato del estado de la reserva no es válido.',
        'status_not_allowed' => 'El estado de reserva seleccionado no está permitido.',
	],

	'view' => [
        'title' => 'Panel',
        'create_booking' => 'Crear reserva',
        'edit_booking' => 'Editar reserva',
        'index_description' => 'Resumen de las reservas creadas, incluidos su estado actual y las entidades relacionadas.',
        'create_description' => 'Cree una nueva reserva con los datos del cliente, la selección del servicio y un intervalo disponible.',
        'edit_description' => 'Actualice los detalles de la reserva, la información del cliente y el estado de la reserva.',
        'back_to_dashboard' => 'Volver al panel',
        'create_first_booking' => 'Crear su primera reserva',
        'no_bookings_found' => 'No se encontraron reservas.',
        'no_bookings_text' => 'Aún no hay reservas para mostrar. Cree la primera reserva para empezar a trabajar con el sistema.',

        'table' => [
            'customer' => 'Cliente',
            'branch' => 'Sucursal',
            'unit' => 'Unidad',
            'activity' => 'Actividad',
            'starts_at' => 'Empieza a las',
            'ends_at' => 'Termina a las',
            'status' => 'Estado',
            'actions' => 'Acciones',
            'active' => 'Activo',
            'inactive' => 'Inactivo',
        ],

        'actions' => [
            'confirm' => 'Confirmar',
            'complete' => 'Completar',
            'cancel' => 'Cancelar',
        ],

        'alerts' => [
            'cancel_confirmation' => '¿Está seguro de que desea cancelar esta reserva?',
        ],

    ],
];
