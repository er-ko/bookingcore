<?php

return [
    'messages' => [
        'updated' => 'As configurações de identidade foram atualizadas com sucesso.',
        'deletion_scheduled' => 'A exclusão da sua conta foi agendada para daqui a 7 dias.',
        'deletion_canceled' => 'A exclusão agendada da sua conta foi cancelada.',
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
        'slug_unique' => 'Este identificador público já está em uso.',

        'default_lang_required' => 'O idioma padrão é obrigatório.',
        'default_lang_max' => 'O idioma padrão não pode ter mais de 16 caracteres.',
        'default_lang_exists' => 'O idioma padrão selecionado é inválido.',

        'default_currency_required' => 'A moeda padrão é obrigatória.',
        'default_currency_size' => 'A moeda padrão deve ter exatamente 3 caracteres.',
        'default_currency_exists' => 'A moeda padrão selecionada é inválida.',

        'default_country_required' => 'O país padrão é obrigatório.',
        'default_country_size' => 'O país padrão deve ter exatamente 2 caracteres.',
        'default_country_exists' => 'O país padrão selecionado é inválido.',

        'is_public_required' => 'O estado de visibilidade é obrigatório.',
        'is_public_boolean' => 'O estado de visibilidade deve ser verdadeiro ou falso.',
    ],

    'view' => [
        'title' => 'Identidade',
        'description' => 'Gerencie a identidade pública da sua página de reservas, incluindo o nome da marca, o URL público e os padrões regionais.',

        'overview' => [
            'title' => 'Resumo',
            'brand_title' => 'Marca',
            'brand_text' => 'Defina o nome público que os visitantes verão na sua página de reservas.',
            'public_url_title' => 'URL público',
            'public_url_text' => 'Escolha o identificador da sua página pública de reservas. Sua página estará disponível em :slug',
            'defaults_title' => 'Padrões',
            'defaults_text' => 'Defina o idioma, a moeda e o país padrão usados no seu espaço de reservas.',
            'visibility_title' => 'Visibilidade',
            'visibility_text' => 'Estas configurações determinam como sua página de reservas é apresentada aos visitantes e como seu espaço de trabalho se comporta por padrão.',
        ],

        'form' => [
            'identity_settings' => 'Configurações de identidade',
            'base_configuration' => 'Configuração base',
            'brand_name_title' => 'Nome da marca',
            'brand_name_placeholder' => 'BookingCore Studio',
            'public_slug_title' => 'Identificador público',
            'public_slug_placeholder' => 'seu-identificador',
            'public_slug_prefix' => 'bookingcore.link/@',
            'default_language_title' => 'Idioma padrão',
            'select_language_title' => 'Selecionar idioma',
            'default_currency_title' => 'Moeda padrão',
            'select_currency_title' => 'Selecionar moeda',
            'default_country_title' => 'País padrão',
            'select_country_title' => 'Selecionar país',
            'booking_page_visibility_title' => 'Visibilidade da página de reservas',
            'public_booking_page_title' => 'Página pública de reservas',
            'public_booking_page_text' => 'Quando ativada, os visitantes podem acessar sua página de reservas pelo respectivo URL público. Quando desativada, a página permanece oculta aos visitantes.',
        ],

        'actions' => [
            'cancel' => 'Cancelar',
            'save' => 'Salvar identidade',
            'saving' => 'Salvando...',
            'schedule_account_deletion' => 'Agendar exclusão da conta',
            'cancel_deletion' => 'Cancelar exclusão',
        ],

        'deletion' => [
            'account_removal_title' => 'Exclusão da conta',
            'scheduled_deletion_title' => 'Exclusão agendada',
            'scheduled_deletion_text' => 'Sua página pública de reservas será ocultada imediatamente após o agendamento da exclusão. Todos os dados da conta serão excluídos permanentemente após 7 dias, salvo se você cancelar a solicitação.',
            'recovery_period_title' => 'Período de recuperação',
            'recovery_period_text' => 'Durante o período de carência de 7 dias, você ainda pode cancelar a solicitação de exclusão e manter sua conta.',
            'deletion_date_title' => 'Data de exclusão',
            'deletion_date_text' => 'Sua conta está agendada para exclusão permanente em :date.',
        ],
    ],
];
