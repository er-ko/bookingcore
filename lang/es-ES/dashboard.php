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
		'created' => 'La reserva se ha creado correctamente.',
		'failed' => 'No se pudo crear la reserva.',
		'cancelled' => 'La reserva se ha cancelado correctamente.',
		'status_updated' => 'El estado de la reserva se ha actualizado correctamente.',
        'not_found' => 'No se encontró la reserva seleccionada.',
    ],

	'validation' => [
		'branch_required' => 'La sucursal es obligatoria.',
        'branch_invalid' => 'El identificador de la sucursal no es válido.',
        'branch_not_found' => 'La sucursal seleccionada no existe.',

        'unit_required' => 'La unidad es obligatoria.',
        'unit_invalid' => 'El identificador de la unidad no es válido.',
        'unit_not_found' => 'La unidad seleccionada no existe.',

        'activity_required' => 'La actividad es obligatoria.',
        'activity_invalid' => 'El identificador de la actividad no es válido.',
        'activity_not_found' => 'La actividad seleccionada no existe.',
        'activity_not_available_for_unit' => 'La actividad seleccionada no está disponible para la unidad seleccionada.',

        'starts_at_required' => 'La hora de inicio es obligatoria.',
        'starts_at_invalid' => 'El formato de la hora de inicio no es válido.',

        'customer_required' => 'La información del cliente es obligatoria.',
        'customer_invalid' => 'El formato de los datos del cliente no es válido.',

        'customer_first_name_required' => 'El nombre del cliente es obligatorio.',
        'customer_first_name_invalid' => 'El nombre del cliente debe ser una cadena de texto.',
        'customer_first_name_too_long' => 'El nombre del cliente es demasiado largo.',

        'customer_last_name_required' => 'El apellido del cliente es obligatorio.',
        'customer_last_name_invalid' => 'El apellido del cliente debe ser una cadena de texto.',
        'customer_last_name_too_long' => 'El apellido del cliente es demasiado largo.',

        'customer_email_required' => 'El correo electrónico del cliente es obligatorio.',
        'customer_email_invalid' => 'El correo electrónico del cliente debe ser una dirección válida.',
        'customer_email_too_long' => 'El correo electrónico del cliente es demasiado largo.',

        'customer_phone_code_required' => 'El prefijo telefónico es obligatorio.',
        'customer_phone_code_invalid' => 'El prefijo telefónico debe ser una cadena de texto.',
        'customer_phone_code_too_long' => 'El prefijo telefónico es demasiado largo.',

        'customer_phone_required' => 'El número de teléfono es obligatorio.',
        'customer_phone_invalid' => 'El número de teléfono debe ser una cadena de texto.',
        'customer_phone_too_long' => 'El número de teléfono es demasiado largo.',

        'note_invalid' => 'La nota debe ser una cadena de texto.',

        'status_required' => 'El estado de la reserva es obligatorio.',
        'status_invalid' => 'El formato del estado de la reserva no es válido.',
        'status_not_allowed' => 'El estado de reserva seleccionado no está permitido.',

        'date_required' => 'La fecha es obligatoria.',
        'date_invalid' => 'El formato de la fecha no es válido.',
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

        'overview' => [
            'title' => 'Resumen de la reserva',

            'customer_title' => 'Datos del cliente',
            'customer_text' => 'Introduzca la información del cliente necesaria para crear la reserva.',

            'booking_flow_title' => 'Flujo de reserva',
            'booking_flow_text' => 'Seleccione una sucursal, luego una unidad, una actividad, una fecha y un intervalo disponible.',

            'availability_title' => 'Disponibilidad',
            'availability_text' => 'Los intervalos disponibles se cargan según la sucursal, la unidad, la actividad y la fecha seleccionadas.',

            'required_title' => 'Obligatorio',
            'required_items' => [
                'first_and_last_name' => 'Nombre y apellido',
                'phone_code_and_number' => 'Prefijo y número de teléfono',
                'branch' => 'Sucursal',
                'unit' => 'Unidad',
                'activity' => 'Actividad',
                'date' => 'Fecha',
                'slot' => 'Intervalo disponible',
            ],

            'optional_title' => 'Opcional',
            'optional_items' => [
                'email' => 'Correo electrónico',
                'note' => 'Nota',
            ],

            'note_title' => 'Nota',
            'note_text' => 'Solo se puede crear una reserva después de seleccionar un intervalo disponible válido.',
        ],

        'form' => [
            'booking_details' => 'Detalles de la reserva',
            'complete_the_reservation' => 'Complete la reserva',
            'customer_details' => 'Datos del cliente',
            'first_name_title' => 'Nombre',
            'last_name_title' => 'Apellido',
            'email_title' => 'Correo electrónico',
            'phone_code_title' => 'Código',
            'phone_title' => 'Teléfono',
            'branch_title' => 'Sucursal',
            'select_branch' => 'Seleccione una sucursal',
            'unit_title' => 'Unidad',
            'select_unit' => 'Seleccione una unidad',
            'loading_units' => 'Cargando unidades...',
            'activity_title' => 'Actividad',
            'select_activity' => 'Seleccione una actividad',
            'loading_activities' => 'Cargando actividades...',
            'date_title' => 'Fecha',
            'available_slots_title' => 'Intervalos disponibles',
            'available_slots_count' => 'intervalo(s) disponible(s)',
            'loading_slots' => 'Cargando intervalos...',
            'no_available_slots' => 'No se encontraron intervalos disponibles para la fecha seleccionada.',
            'select_slot' => 'Seleccione un intervalo',
            'note_title' => 'Nota',
        ],

        'actions' => [
            'confirm' => 'Confirmar',
            'complete' => 'Completar',
            'cancel' => 'Cancelar',
            'create' => 'Crear reserva',
            'creating' => 'Creando...',
        ],

        'alerts' => [
            'cancel_confirmation' => '¿Está seguro de que desea cancelar esta reserva?',
        ],

    ],
];
