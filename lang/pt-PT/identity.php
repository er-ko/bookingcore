<?php

return [
    'messages' => [
        'updated' => 'As definições de identidade foram atualizadas com sucesso.',
        'deletion_scheduled' => 'A eliminação da sua conta foi agendada para daqui a 7 dias.',
        'deletion_canceled' => 'A eliminação agendada da sua conta foi cancelada.',
    ],

    'validation' => [
        'mode_required' => 'O modo de reserva é obrigatório.',
        'mode_in' => 'O modo de reserva selecionado é inválido.',

        'brand_required' => 'O nome da marca é obrigatório.',
        'brand_max' => 'O nome da marca não pode ter mais de 160 caracteres.',

        'slug_required' => 'O identificador público é obrigatório.',
        'slug_min' => 'O identificador público deve ter pelo menos 3 caracteres.',
        'slug_max' => 'O identificador público não pode ter mais de 120 caracteres.',
        'slug_regex' => 'O identificador público pode conter apenas letras minúsculas, números e hífenes simples entre palavras.',
        'slug_unique' => 'Este identificador público já está em utilização.',

        'default_lang_required' => 'O idioma predefinido é obrigatório.',
        'default_lang_max' => 'O idioma predefinido não pode ter mais de 16 caracteres.',
        'default_lang_exists' => 'O idioma predefinido selecionado é inválido.',

        'default_currency_required' => 'A moeda predefinida é obrigatória.',
        'default_currency_size' => 'A moeda predefinida deve ter exatamente 3 caracteres.',
        'default_currency_exists' => 'A moeda predefinida selecionada é inválida.',

        'default_country_required' => 'O país predefinido é obrigatório.',
        'default_country_size' => 'O país predefinido deve ter exatamente 2 caracteres.',
        'default_country_exists' => 'O país predefinido selecionado é inválido.',

        'is_public_required' => 'O estado de visibilidade é obrigatório.',
        'is_public_boolean' => 'O estado de visibilidade deve ser verdadeiro ou falso.',
    ],

    'view' => [
        'title' => 'Identidade',
        'description' => 'Gira a identidade pública da sua página de reservas, incluindo o nome da marca, o URL público e as predefinições regionais.',

        'overview' => [
            'title' => 'Resumo',
            'brand_title' => 'Marca',
            'brand_text' => 'Defina o nome público que os visitantes verão na sua página de reservas.',
            'public_url_title' => 'URL público',
            'public_url_text' => 'Escolha o identificador da sua página pública de reservas. A sua página estará disponível em :slug',
            'defaults_title' => 'Predefinições',
            'defaults_text' => 'Defina o idioma, a moeda e o país predefinidos utilizados no seu espaço de reservas.',
            'visibility_title' => 'Visibilidade',
            'visibility_text' => 'Estas definições determinam a forma como a sua página de reservas é apresentada aos visitantes e como o seu espaço de trabalho se comporta por predefinição.',
        ],

        'form' => [
            'identity_settings' => 'Definições de identidade',
            'base_configuration' => 'Configuração base',
            'brand_name_title' => 'Nome da marca',
            'brand_name_placeholder' => 'BookingCore Studio',
            'public_slug_title' => 'Identificador público',
            'public_slug_placeholder' => 'o-seu-identificador',
            'public_slug_prefix' => 'bookingcore.link/@',
            'default_language_title' => 'Idioma predefinido',
            'select_language_title' => 'Selecionar idioma',
            'default_currency_title' => 'Moeda predefinida',
            'select_currency_title' => 'Selecionar moeda',
            'default_country_title' => 'País predefinido',
            'select_country_title' => 'Selecionar país',
            'booking_page_visibility_title' => 'Visibilidade da página de reservas',
            'public_booking_page_title' => 'Página pública de reservas',
            'public_booking_page_text' => 'Quando ativada, os visitantes podem aceder à sua página de reservas através do respetivo URL público. Quando desativada, a página permanece oculta aos visitantes.',
        ],

        'actions' => [
            'cancel' => 'Cancelar',
            'save' => 'Guardar identidade',
            'saving' => 'A guardar...',
            'schedule_account_deletion' => 'Agendar eliminação da conta',
            'cancel_deletion' => 'Cancelar eliminação',
        ],

        'deletion' => [
            'account_removal_title' => 'Eliminação da conta',
            'scheduled_deletion_title' => 'Eliminação agendada',
            'scheduled_deletion_text' => 'A sua página pública de reservas será ocultada imediatamente após o agendamento da eliminação. Todos os dados da conta serão eliminados permanentemente após 7 dias, salvo se cancelar o pedido.',
            'recovery_period_title' => 'Período de recuperação',
            'recovery_period_text' => 'Durante o período de carência de 7 dias, ainda pode cancelar o pedido de eliminação e manter a sua conta.',
            'deletion_date_title' => 'Data de eliminação',
            'deletion_date_text' => 'A sua conta está agendada para eliminação permanente em :date.',
        ],
    ],
];
