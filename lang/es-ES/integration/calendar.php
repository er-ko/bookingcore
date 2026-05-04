<?php

return [
    'messages' => [
        'failed' => 'No se pudo procesar la solicitud de integración de calendario.',
        'calendar_selected' => 'El calendario se ha seleccionado correctamente.',
        'invalid_calendar_id' => 'El ID del calendario seleccionado no es válido.',
        'integration_user_mismatch' => 'La integración seleccionada no pertenece al usuario autenticado.',
        'integration_not_calendar' => 'La integración seleccionada no es una integración de calendario.',
        'integration_inactive' => 'La integración seleccionada está inactiva.',
        'missing_refresh_token' => 'La integración de calendario no contiene un token de actualización.',
        'missing_access_token' => 'La integración de calendario no contiene un token de acceso.',
        'not_google_integration' => 'La integración seleccionada no es una integración de Google Calendar.',
        'google_refresh_failed' => 'No se pudo actualizar el token de acceso de Google Calendar.',
        'google_refresh_missing_access_token' => 'No se pudo actualizar el token de acceso de Google Calendar porque la respuesta no incluyó un token de acceso.',
        'connection_error' => 'BookingCore no pudo verificar su conexión de calendario. Vuelva a conectar su cuenta de Google Calendar e inténtelo de nuevo.',
    ],

    'validation' => [
        'calendar_id_required' => 'El identificador del calendario es obligatorio.',
        'calendar_id_string' => 'El identificador del calendario debe ser una cadena de texto.',
        'calendar_id_max' => 'El identificador del calendario no puede superar los 255 caracteres.',
    ],

    'view' => [
        'title' => 'Integraciones de calendario',
        'description' => 'Conecte su cuenta de calendario externa y elija dónde debe crear BookingCore los eventos de reserva.',

        'overview' => [
            'connected_account_title' => 'Cuenta conectada',
            'provider_title' => 'Proveedor',
            'name_title' => 'Nombre',
            'email_title' => 'Correo electrónico',
            'timezone_title' => 'Zona horaria',
            'status_title' => 'Estado',
            'active_title' => 'Activo',
            'available_calendars_title' => 'Calendarios disponibles',
            'timezone_prefix' => 'Zona horaria:',
        ],

        'actions' => [
            'connect_google' => 'Conectar Google Calendar',
            'reconnect_google' => 'Volver a conectar Google Calendar',
            'select_calendar' => 'Seleccionar calendario',
            'selected' => 'Seleccionado',
        ],

        'states' => [
            'connection_expired_title' => 'La conexión con Google Calendar ha caducado',
            'connection_expired_text' => 'Su conexión con Google Calendar ya no es válida. Vuelva a conectar su cuenta para seguir sincronizando calendarios y eventos de reserva.',
            'no_calendar_connected_title' => 'No hay ningún calendario conectado',
            'no_calendar_connected_text' => 'Aún no ha conectado ningún calendario. Conecte Google Calendar para empezar a sincronizar eventos de reserva.',
            'no_calendars_found_title' => 'No se encontraron calendarios',
            'no_calendars_found_text' => 'La cuenta conectada no expone actualmente ningún calendario.',
            'primary_badge' => 'Principal',
            'read_only_badge' => 'Solo lectura',
            'selected_badge' => 'Seleccionado',
            'calendar_count_suffix' => 'calendario(s)',
        ],
    ],
];
