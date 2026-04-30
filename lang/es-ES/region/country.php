<?php

return [
    'messages' => [
        'updated' => 'El estado del país se ha actualizado correctamente.',
    ],

    'validation' => [
        'scope_required' => 'El alcance es obligatorio.',
        'scope_in' => 'El alcance de actualización no es válido.',

        'country_ids_array' => 'La selección de países debe ser un arreglo válido.',
        'country_ids_integer' => 'Cada identificador de país debe ser un número entero.',
        'country_ids_exists' => 'Uno o más países seleccionados no existen.',
        'country_ids_required' => 'Debe seleccionar al menos un país.',
        'country_ids_single' => 'Debe proporcionar exactamente un país para el alcance individual.',

        'is_active_required' => 'El indicador de estado es obligatorio.',
        'is_active_boolean' => 'El indicador de estado debe ser verdadero o falso.',
    ],

    'view' => [
        'countries' => 'Países',
        'description' => 'Gestione los países disponibles en su espacio de trabajo de reservas.',

        'table' => [
            'official_name' => 'Nombre oficial',
            'language' => 'Idioma',
            'currency' => 'Moneda',
            'phone_code' => 'Prefijo telefónico',
            'status' => 'Estado',
            'action' => 'Acción',
            'active' => 'Activo',
            'inactive' => 'Inactivo',
            'activate' => 'Activar',
            'deactivate' => 'Desactivar',
        ],

        'actions' => [
            'selected' => 'seleccionado(s)',
            'activate_selected' => 'Activar seleccionados',
            'deactivate_selected' => 'Desactivar seleccionados',
            'set_all_active' => 'Activar todos',
            'set_all_inactive' => 'Desactivar todos',
        ],
        
        'alerts' => [
            'future_behavior_note' => 'Esta configuración de países está preparada para futuras funciones regionales. Por ahora, no afecta al comportamiento actual de su espacio de trabajo de reservas.',
        ],
    ],
];
