<?php

return [
    'messages' => [
        'created'   => 'La actividad se ha creado correctamente.',
        'updated'   => 'La actividad se ha actualizado correctamente.',
        'deleted'   => 'La actividad se ha eliminado correctamente.',
        'failed'    => 'No se pudo procesar la solicitud de actividad.',
        'not_found' => 'No se encontró la actividad.',
        'limit_reached' => 'Ha alcanzado el número máximo permitido de actividades.',
    ],

    'validation' => [
        'name_required' => 'El nombre de la actividad es obligatorio.',
        'name_max' => 'El nombre de la actividad no puede superar los 255 caracteres.',

        'duration_required' => 'La duración es obligatoria.',
        'duration_integer' => 'La duración debe ser un número entero de minutos.',
        'duration_min' => 'La duración debe ser de al menos 1 minuto.',
        'duration_max' => 'La duración no puede superar los 1200 minutos.',

        'buffer_before_integer' => 'El margen anterior debe ser un número entero de minutos.',
        'buffer_before_min' => 'El margen anterior debe ser de al menos 0 minutos.',
        'buffer_before_max' => 'El margen anterior no puede superar los 60 minutos.',

        'buffer_after_integer' => 'El margen posterior debe ser un número entero de minutos.',
        'buffer_after_min' => 'El margen posterior debe ser de al menos 0 minutos.',
        'buffer_after_max' => 'El margen posterior no puede superar los 60 minutos.',

        'is_active_required' => 'El estado activo es obligatorio.',
        'is_active_boolean' => 'El estado activo debe ser verdadero o falso.',
    ],

    'view' => [
        'title' => 'Actividad',
        'activities' => 'Actividades',
        'create_activity' => 'Crear actividad',
        'edit_activity' => 'Editar actividad',
        'index_description' => 'Gestione las actividades que se pueden reservar en sus unidades.',
        'create_description' => 'Defina una nueva actividad, incluida la duración, los tiempos de margen y el estado activo.',
        'edit_description' => 'Actualice los detalles de una actividad existente, incluida la duración, los tiempos de margen y el estado activo.',
        'back_to_activities' => 'Volver a actividades',
        'create_first_activity' => 'Crear su primera actividad',
        'no_activities_found' => 'No se encontraron actividades.',
        'no_activities_text' => 'Aún no hay actividades para mostrar. Cree la primera actividad para empezar a organizar su estructura de reservas.',

        'table' => [
            'name' => 'Nombre',
            'status' => 'Estado',
            'updated' => 'Actualizado',
            'actions' => 'Acciones',
            'duration' => 'Duración',
            'min' => 'min',
            'active' => 'Activo',
            'inactive' => 'Inactivo',
        ],

        'overview' => [
            'title' => 'Resumen de la actividad',
            'activity_id_title' => 'ID de actividad',
            'duration_title' => 'Duración',
            'duration_text' => 'Defina cuánto debe durar la actividad en minutos.',
            'buffer_time_title' => 'Tiempo de margen',
            'buffer_time_text' => 'Añada tiempo opcional antes y después de la actividad para evitar solapamientos ajustados entre reservas.',
            'required_title' => 'Obligatorio',
            'optional_title' => 'Opcional',
            'status_title' => 'Estado',
            'status_text' => 'Las actividades inactivas permanecen almacenadas en el sistema, pero no se pueden usar para nuevas reservas.',
            'active_title' => 'Activo',
            'inactive_title' => 'Inactivo',
            'note_title' => 'Nota',
            'note_text' => 'Actualizar esta actividad no afectará a otras actividades del sistema.',
        ],

        'form' => [
            'activity_details' => 'Detalles de la actividad',
            'complete_the_form' => 'Complete el formulario',
            'update_the_form' => 'Actualice el formulario',
            'name_title' => 'Nombre',
            'duration_title' => 'Duración (minutos)',
            'buffer_before_title' => 'Tiempo de margen anterior (minutos)',
            'buffer_after_title' => 'Tiempo de margen posterior (minutos)',
            'active_title' => 'Actividad activa',
            'active_text' => 'Las actividades inactivas permanecen almacenadas en el sistema, pero no se pueden usar para nuevas reservas.',
        ],

        'actions' => [
            'edit' => 'Editar',
            'delete' => 'Eliminar',
            'cancel' => 'Cancelar',
            'create' => 'Crear actividad',
            'creating' => 'Creando...',
            'save' => 'Guardar cambios',
            'saving' => 'Guardando...',
        ],

        'alerts' => [
            'delete_confirmation' => '¿Está seguro de que desea eliminar esta actividad?',
        ],

    ],
];
