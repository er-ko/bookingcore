<?php

return [
    'messages' => [
        'updated' => 'El estado de la moneda se ha actualizado correctamente.',
    ],

    'validation' => [
		'scope_required' => 'El alcance es obligatorio.',
		'scope_in' => 'El alcance de actualización no es válido.',

		'currency_ids_array' => 'La selección de monedas debe ser un arreglo válido.',
		'currency_ids_integer' => 'Cada identificador de moneda debe ser un número entero.',
		'currency_ids_exists' => 'Una o más monedas seleccionadas no existen.',
		'currency_ids_required' => 'Debe seleccionar al menos una moneda.',
		'currency_ids_single' => 'Debe proporcionar exactamente una moneda para el alcance individual.',

		'is_active_required' => 'El indicador de estado es obligatorio.',
		'is_active_boolean' => 'El indicador de estado debe ser verdadero o falso.',
	],

    'view' => [
        'currencies' => 'Monedas',
        'description' => 'Gestione las monedas disponibles en su espacio de trabajo. Solo las monedas activas se ofrecerán en las selecciones relacionadas con monedas.',

        'table' => [
            'name' => 'Nombre',
            'decimal' => 'Decimales',
            'symbol' => 'Símbolo',
            'status' => 'Estado',
            'action' => 'Acción',
            'active' => 'Activo',
            'inactive' => 'Inactivo',
            'activate' => 'Activar',
            'deactivate' => 'Desactivar',
        ],

        'actions' => [
            'selected' => 'seleccionado(s)',
            'activate_selected' => 'Activar seleccionadas',
            'deactivate_selected' => 'Desactivar seleccionadas',
            'set_all_active' => 'Activar todas',
            'set_all_inactive' => 'Desactivar todas',
        ],

        'alerts' => [
            'future_behavior_note' => 'Esta configuración de monedas está preparada para futuras funciones de precios y región. Por ahora, no afecta al comportamiento actual de su espacio de trabajo de reservas.',
        ],
    ],
];
