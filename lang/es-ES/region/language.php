<?php

return [
    'messages' => [
        'updated' => 'El estado del idioma se ha actualizado correctamente.',
    ],

    'validation' => [
		'scope_required' => 'El alcance es obligatorio.',
		'scope_in' => 'El alcance de actualización no es válido.',

		'language_ids_array' => 'La selección de idiomas debe ser un arreglo válido.',
		'language_ids_integer' => 'Cada identificador de idioma debe ser un número entero.',
		'language_ids_exists' => 'Uno o más idiomas seleccionados no existen.',
		'language_ids_required' => 'Debe seleccionar al menos un idioma.',
		'language_ids_single' => 'Debe proporcionar exactamente un idioma para el alcance individual.',

		'is_active_required' => 'El indicador de estado es obligatorio.',
		'is_active_boolean' => 'El indicador de estado debe ser verdadero o falso.',
	],

    'view' => [
        'languages' => 'Idiomas',
        'description' => 'Gestione los idiomas disponibles en su espacio de trabajo. Solo los idiomas activos se ofrecerán en las selecciones relacionadas con idiomas.',

        'table' => [
            'name' => 'Nombre',
            'local_name' => 'Nombre local',
            'tag' => 'Etiqueta',
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
            'future_behavior_note' => 'Esta configuración de idiomas está preparada para futuras funciones multilingües. Por ahora, no afecta al comportamiento actual de su espacio de trabajo de reservas.',
        ],
    ],
];
