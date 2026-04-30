<?php

return [
    'messages' => [
        'updated' => 'La configuración de identidad se ha actualizado correctamente.',
        'deletion_scheduled' => 'Su cuenta se ha programado para eliminación en 7 días.',
        'deletion_canceled' => 'La eliminación programada de su cuenta se ha cancelado.',
    ],

    'validation' => [
        'mode_required' => 'El modo de reserva es obligatorio.',
        'mode_in' => 'El modo de reserva seleccionado no es válido.',

        'brand_required' => 'El nombre de marca es obligatorio.',
        'brand_max' => 'El nombre de marca no puede superar los 160 caracteres.',

        'slug_required' => 'El identificador público es obligatorio.',
        'slug_min' => 'El identificador público debe tener al menos 3 caracteres.',
        'slug_max' => 'El identificador público no puede superar los 120 caracteres.',
        'slug_regex' => 'El identificador público solo puede contener letras minúsculas, números y guiones simples entre palabras.',
        'slug_unique' => 'Este identificador público ya está en uso.',

        'default_lang_required' => 'El idioma predeterminado es obligatorio.',
        'default_lang_max' => 'El idioma predeterminado no puede superar los 16 caracteres.',
        'default_lang_exists' => 'El idioma predeterminado seleccionado no es válido.',

        'default_currency_required' => 'La moneda predeterminada es obligatoria.',
        'default_currency_size' => 'La moneda predeterminada debe tener exactamente 3 caracteres.',
        'default_currency_exists' => 'La moneda predeterminada seleccionada no es válida.',

        'default_country_required' => 'El país predeterminado es obligatorio.',
        'default_country_size' => 'El país predeterminado debe tener exactamente 2 caracteres.',
        'default_country_exists' => 'El país predeterminado seleccionado no es válido.',

        'is_public_required' => 'El estado de visibilidad es obligatorio.',
        'is_public_boolean' => 'El estado de visibilidad debe ser verdadero o falso.',
    ],

    'view' => [
        'title' => 'Identidad',
        'description' => 'Gestione la identidad pública de su página de reservas, incluido el nombre de marca, la URL pública y los valores regionales predeterminados.',

        'overview' => [
            'title' => 'Resumen',
            'brand_title' => 'Marca',
            'brand_text' => 'Defina el nombre público que los visitantes verán en su página de reservas.',
            'public_url_title' => 'URL pública',
            'public_url_text' => 'Elija el identificador de su página pública de reservas. Su página estará disponible en :slug',
            'defaults_title' => 'Valores predeterminados',
            'defaults_text' => 'Defina el idioma, la moneda y el país predeterminados usados en su espacio de trabajo de reservas.',
            'visibility_title' => 'Visibilidad',
            'visibility_text' => 'Esta configuración define cómo se presenta su página de reservas a los visitantes y cómo se comporta su espacio de trabajo de forma predeterminada.',
        ],

        'form' => [
            'identity_settings' => 'Configuración de identidad',
            'base_configuration' => 'Configuración básica',
            'brand_name_title' => 'Nombre de marca',
            'brand_name_placeholder' => 'BookingCore Studio',
            'public_slug_title' => 'Identificador público',
            'public_slug_placeholder' => 'su-identificador',
            'public_slug_prefix' => 'bookingcore.link/@',
            'default_language_title' => 'Idioma predeterminado',
            'select_language_title' => 'Seleccione un idioma',
            'default_currency_title' => 'Moneda predeterminada',
            'select_currency_title' => 'Seleccione una moneda',
            'default_country_title' => 'País predeterminado',
            'select_country_title' => 'Seleccione un país',
            'booking_page_visibility_title' => 'Visibilidad de la página de reservas',
            'public_booking_page_title' => 'Página pública de reservas',
            'public_booking_page_text' => 'Cuando está activada, los visitantes pueden acceder a su página de reservas mediante su URL pública. Cuando está desactivada, la página permanece oculta para los visitantes.',
        ],

        'actions' => [
            'cancel' => 'Cancelar',
            'save' => 'Guardar identidad',
            'saving' => 'Guardando...',
            'schedule_account_deletion' => 'Programar eliminación de cuenta',
            'cancel_deletion' => 'Cancelar eliminación',
        ],

        'deletion' => [
            'account_removal_title' => 'Eliminación de cuenta',
            'scheduled_deletion_title' => 'Eliminación programada',
            'scheduled_deletion_text' => 'Su página pública de reservas se ocultará inmediatamente después de programar la eliminación. Todos los datos de la cuenta se eliminarán permanentemente después de 7 días, salvo que cancele la solicitud.',
            'recovery_period_title' => 'Período de recuperación',
            'recovery_period_text' => 'Durante el período de gracia de 7 días, aún puede cancelar la solicitud de eliminación y conservar su cuenta.',
            'deletion_date_title' => 'Fecha de eliminación',
            'deletion_date_text' => 'Su cuenta está programada para eliminación permanente el :date.',
        ],
    ],
];
