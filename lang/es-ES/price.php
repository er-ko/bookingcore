<?php

return [
    'messages' => [
        'created'   => 'El precio se ha creado correctamente.',
        'updated'   => 'El precio se ha actualizado correctamente.',
        'deleted'   => 'El precio se ha eliminado correctamente.',
        'failed'    => 'No se pudo procesar la solicitud de precio.',
    ],

    'validation' => [
        'branch_required' => 'Seleccione una sucursal.',
        'branch_invalid' => 'La sucursal seleccionada no es válida.',
        'branch_not_found' => 'No se encontró la sucursal seleccionada.',

        'unit_required' => 'Seleccione una unidad.',
        'unit_invalid' => 'La unidad seleccionada no es válida.',
        'unit_not_found' => 'No se encontró la unidad seleccionada.',

        'activity_required' => 'Seleccione una actividad.',
        'activity_invalid' => 'La actividad seleccionada no es válida.',
        'activity_not_found' => 'No se encontró la actividad seleccionada.',

        'price_already_exists' => 'Ya existe un precio para la unidad y la actividad seleccionadas.',
        'price_not_found' => 'No se encontró el precio seleccionado.',
        'price_required' => 'Introduzca un precio.',
        'price_invalid' => 'El precio debe ser un número válido.',
        'price_min' => 'El precio debe ser cero o superior.',
    ],

    'view' => [
        'title' => 'Precios',
        'description' => 'Defina el precio predeterminado de cada actividad dentro de una unidad específica.',

        'form' => [
            'title' => 'Configuración de precios',
            'branch_title' => 'Sucursal',
            'branch_placeholder' => 'Seleccione una sucursal',
            'unit_title' => 'Unidad',
            'unit_placeholder' => 'Seleccione una unidad',
            'activity_title' => 'Actividad',
            'activity_placeholder' => 'Seleccione una actividad',
            'price_title' => 'Precio',
            'price_placeholder' => 'Introduzca el precio',
            'currency_title' => 'Moneda',
            'currency_text' => 'Los precios se almacenan en su moneda predeterminada.',
        ],

        'table' => [
            'title' => 'Precios guardados',
            'branch_title' => 'Sucursal',
            'unit_title' => 'Unidad',
            'activity_title' => 'Actividad',
            'price_title' => 'Precio',
            'actions_title' => 'Acciones',
        ],

        'actions' => [
            'save' => 'Guardar precio',
            'saving' => 'Guardando...',
            'edit' => 'Editar',
            'update' => 'Actualizar',
            'updating' => 'Actualizando...',
            'delete' => 'Eliminar',
            'cancel' => 'Cancelar',
            'deleting' => 'Eliminando...',
        ],

        'states' => [
            'empty_title' => 'Aún no hay precios',
            'empty_text' => 'Cree el primer precio para una combinación de unidad y actividad.',
            'no_branches_title' => 'No hay configuración de precios disponible',
            'no_branches_text' => 'Cree primero una sucursal para empezar a definir precios.',
            'no_units_text' => 'No hay unidades disponibles para la sucursal seleccionada.',
            'no_activities_text' => 'No hay actividades disponibles.',
        ],

        'dialogs' => [
            'delete_confirm' => '¿Está seguro de que desea eliminar este precio?',
        ],
    ],
];
