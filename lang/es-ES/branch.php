<?php

return [
    'messages' => [
        'created'   => 'La sucursal se ha creado correctamente.',
        'updated'   => 'La sucursal se ha actualizado correctamente.',
        'deleted'   => 'La sucursal se ha eliminado correctamente.',
        'failed'    => 'No se pudo procesar la solicitud de sucursal.',
        'not_found' => 'No se encontró la sucursal.',
        'has_units' => 'La sucursal no se puede eliminar porque todavía contiene unidades.',
        'has_bookings' => 'La sucursal no se puede eliminar porque todavía contiene reservas.',
		'limit_reached' => 'Ha alcanzado el número máximo permitido de sucursales.',
    ],

    'validation' => [
        'name_required' => 'El nombre de la sucursal es obligatorio.',
        'name_max' => 'El nombre de la sucursal no puede superar los 255 caracteres.',

        'address_line_1_max' => 'La línea de dirección 1 no puede superar los 255 caracteres.',
        'address_line_2_max' => 'La línea de dirección 2 no puede superar los 255 caracteres.',

        'city_max' => 'La ciudad no puede superar los 255 caracteres.',
        'postcode_max' => 'El código postal no puede superar los 32 caracteres.',

        'country_code_size' => 'El código de país debe tener exactamente 2 caracteres.',

        'timezone_required' => 'La zona horaria es obligatoria.',
        'timezone_max' => 'La zona horaria no puede superar los 64 caracteres.',

        'is_active_required' => 'El estado activo es obligatorio.',
        'is_active_boolean' => 'El estado activo debe ser verdadero o falso.',
    ],

    'view' => [
        'title' => 'Sucursal',
        'branches' => 'Sucursales',
        'create_branch' => 'Crear sucursal',
        'edit_branch' => 'Editar sucursal',
        'index_description' => 'Gestione sus sucursales, incluidos los datos de dirección, la zona horaria y el estado activo.',
        'create_description' => 'Cree una nueva sucursal con datos de dirección, zona horaria y estado de activación.',
        'edit_description' => 'Actualice los datos de la sucursal, la dirección, la zona horaria y el estado de activación.',
        'back_to_branches' => 'Volver a sucursales',
        'create_first_branch' => 'Crear su primera sucursal',
        'no_branches_found' => 'No se encontraron sucursales.',
        'no_branches_text' => 'Aún no hay sucursales para mostrar. Cree la primera sucursal para empezar a organizar su estructura de reservas.',

        'table' => [
            'branch' => 'Sucursal',
            'address' => 'Dirección',
            'city' => 'Ciudad',
            'timezone' => 'Zona horaria',
            'no_address_text' => 'No se ha especificado ninguna dirección',
            'status' => 'Estado',
            'updated' => 'Actualizado',
            'actions' => 'Acciones',
            'active' => 'Activo',
            'inactive' => 'Inactivo',
        ],

        'overview' => [
            'title' => 'Resumen de la sucursal',
            'branch_id_title' => 'ID de sucursal',
            'countries_available_title' => 'Países disponibles',
            'city_and_postcode_title' => 'Ciudad y código postal',
            'country_and_timezone_title' => 'País y zona horaria',
            'timezone_title' => 'Zona horaria',
            'timezone_text' => 'Según el país seleccionado',
            'limit_title' => 'Límite',
            'limit_text' => 'Puede crear hasta 10 sucursales.',
            'duration_text' => 'Defina la ubicación de la sucursal y los valores regionales predeterminados.',
            'required_title' => 'Obligatorio',
            'optional_title' => 'Opcional',
            'status_title' => 'Estado actual',
            'active_title' => 'Activo',
            'inactive_title' => 'Inactivo',
            'note_title' => 'Nota',
            'note_text' => 'Actualizar esta sucursal no afectará a otras sucursales del sistema.',
        ],

        'form' => [
            'branch_details' => 'Detalles de la sucursal',
            'complete_the_form' => 'Complete el formulario',
            'update_the_form' => 'Actualice el formulario',
            'branch_name_title' => 'Nombre de la sucursal',
            'address_line_1_title' => 'Línea de dirección 1',
            'address_line_2_title' => 'Línea de dirección 2',
            'city_title' => 'Ciudad',
            'postcode_title' => 'Código postal',
            'country_title' => 'País',
            'select_country' => 'Seleccione un país',
            'timezone_title' => 'Zona horaria',
            'select_timezone' => 'Seleccione una zona horaria',
            'loading_timezones' => 'Cargando zonas horarias...',
            'active_title' => 'Sucursal activa',
            'active_text' => 'Las sucursales inactivas pueden permanecer almacenadas en el sistema sin utilizarse activamente.',
        ],

        'actions' => [
            'edit' => 'Editar',
            'delete' => 'Eliminar',
            'cancel' => 'Cancelar',
            'create' => 'Crear sucursal',
            'creating' => 'Creando...',
            'save' => 'Guardar cambios',
            'saving' => 'Guardando...',
        ],

        'alerts' => [
            'delete_confirmation' => '¿Está seguro de que desea eliminar esta sucursal?',
        ],

    ],
];
