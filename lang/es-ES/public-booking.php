<?php

return [
    'view' => [
        'title' => 'Reserve su cita',
        'description' => 'Elija la sucursal, el servicio, la fecha y la hora que mejor se adapten a usted.',

        'form' => [
            'branch_title' => 'Sucursal',
            'branch_placeholder' => 'Seleccione una sucursal',

            'unit_title' => 'Unidad',
            'unit_placeholder' => 'Seleccione una unidad',

            'activity_title' => 'Actividad',
            'activity_placeholder' => 'Seleccione una actividad',

            'date_title' => 'Fecha',
            'date_placeholder' => 'Seleccione una fecha',

            'slot_title' => 'Hora disponible',
            'slot_placeholder' => 'Seleccione una hora',

            'first_name_title' => 'Nombre',
            'first_name_placeholder' => 'Juan',

            'last_name_title' => 'Apellido',
            'last_name_placeholder' => 'Pérez',

            'email_title' => 'Correo electrónico',
            'email_placeholder' => 'juan@example.com',

            'phone_code_title' => 'Prefijo telefónico',
            'phone_code_placeholder' => '+1',

            'phone_title' => 'Teléfono',
            'phone_placeholder' => '555123456',

            'note_title' => 'Nota',
            'note_placeholder' => 'Información adicional para su reserva',
        ],

        'content' => [
            'form_title' => 'Complete su reserva',
            'ready' => 'listo',

            'appointment_title' => 'Detalles de la cita',
            'appointment_text' => 'Elija la sucursal, la unidad, el servicio, la fecha y el intervalo que mejor se adapten.',

            'customer_title' => 'Datos del cliente',
            'customer_text' => 'Añada los datos de contacto necesarios para confirmar e identificar la reserva.',

            'note_title' => 'Nota adicional',
            'note_text' => 'Comparta cualquier información útil antes del inicio de la reserva.',

            'review_title' => 'Revise los detalles de la reserva y confirme cuando todo sea correcto.',
            'review_text' => 'El resumen de la reserva se actualiza en tiempo real mientras completa el formulario.',
            'review_live_text' => ':selection/4 detalles de la reserva, :customer/4 datos de contacto',

            'summary_badge' => 'Resumen',
            'summary_progress' => 'Revisión de la reserva',

            'branch_label' => 'Sucursal',
            'unit_label' => 'Unidad',
            'activity_label' => 'Actividad',
            'date_time_label' => 'Fecha / hora',
            'customer_label' => 'Cliente',
            'email_label' => 'Correo electrónico',
            'phone_label' => 'Teléfono',
            'note_label' => 'Nota',

            'summary_empty_selection' => 'Aún no seleccionado',
            'summary_empty_customer' => 'Aún no completado',

            'branch_status_title' => 'Estado de la sucursal',
            'service_status_title' => 'Estado del servicio',
            'schedule_status_title' => 'Estado de la programación',
        ],

        'states' => [
            'no_branches_title' => 'No hay sucursales disponibles',
            'no_branches_text' => 'Actualmente no hay sucursales públicas disponibles para reservar.',

            'no_units_title' => 'No hay unidades disponibles',
            'no_units_text' => 'Actualmente no hay unidades disponibles para la sucursal seleccionada.',

            'no_activities_title' => 'No hay actividades disponibles',
            'no_activities_text' => 'Actualmente no hay actividades disponibles para la unidad seleccionada.',

            'no_slots_title' => 'No hay intervalos disponibles',
            'no_slots_text' => 'No hay intervalos de reserva disponibles para la fecha seleccionada.',

            'branch_default' => 'Elija la ubicación donde debe realizarse la reserva.',
            'service_default' => 'Seleccione el servicio después de elegir la unidad adecuada.',
            'schedule_loading' => 'Comprobando la disponibilidad en directo para el día seleccionado.',
            'schedule_default' => 'Seleccione una fecha para cargar los intervalos de reserva disponibles.',
        ],

        'actions' => [
            'submit' => 'Crear reserva',
            'submitting' => 'Creando reserva...',
        ],

        'messages' => [
            'created' => 'La reserva se ha creado correctamente.',
            'failed' => 'No se pudo crear la reserva.',
        ],

        'detail' => [
            'title' => 'Detalles de la reserva',
            'badge_created' => 'Reserva creada',
            'status_label' => 'Estado',
            'heading' => 'Su reserva está guardada',
            'description' => 'Guarde esta página para más tarde, descargue el archivo de calendario o imprima la confirmación.',
            'details_title' => 'Detalles de la reserva',
            'branch_label' => 'Sucursal',
            'unit_label' => 'Unidad',
            'activity_label' => 'Actividad',
            'date_time_label' => 'Fecha y hora',
            'to_label' => 'a',
            'customer_title' => 'Información del cliente',
            'customer_name_label' => 'Nombre y apellido',
            'customer_email_label' => 'Correo electrónico',
            'customer_phone_label' => 'Teléfono',
            'note_label' => 'Nota',
            'actions' => [
                'back' => 'Volver a la página de reservas',
                'print' => 'Imprimir página',
                'calendar' => 'Importar en su calendario',
            ],
            'fallback' => '—',
        ],
    ],
];
