<?php

return [
    'view' => [
        'title' => 'Reserve a sua marcação',
        'description' => 'Escolha a sucursal, o serviço, a data e a hora que melhor lhe convêm.',

        'form' => [
            'branch_title' => 'Sucursal',
            'branch_placeholder' => 'Selecionar sucursal',

            'unit_title' => 'Unidade',
            'unit_placeholder' => 'Selecionar unidade',

            'activity_title' => 'Atividade',
            'activity_placeholder' => 'Selecionar atividade',

            'date_title' => 'Data',
            'date_placeholder' => 'Selecionar data',

            'slot_title' => 'Hora disponível',
            'slot_placeholder' => 'Selecionar hora',

            'first_name_title' => 'Primeiro nome',
            'first_name_placeholder' => 'João',

            'last_name_title' => 'Apelido',
            'last_name_placeholder' => 'Silva',

            'email_title' => 'E-mail',
            'email_placeholder' => 'joao@example.com',

            'phone_code_title' => 'Indicativo telefónico',
            'phone_code_placeholder' => '+351',

            'phone_title' => 'Telefone',
            'phone_placeholder' => '912345678',

            'note_title' => 'Nota',
            'note_placeholder' => 'Informações adicionais para a sua reserva',
        ],

        'content' => [
            'form_title' => 'Complete a sua reserva',
            'ready' => 'pronto',

            'appointment_title' => 'Detalhes da marcação',
            'appointment_text' => 'Escolha a sucursal, a unidade, o serviço, a data e o horário que melhor se adequam.',

            'customer_title' => 'Detalhes do cliente',
            'customer_text' => 'Adicione os dados de contacto necessários para confirmar e identificar a reserva.',

            'note_title' => 'Nota adicional',
            'note_text' => 'Partilhe qualquer informação útil antes do início da reserva.',

            'review_title' => 'Reveja os detalhes da reserva e confirme quando tudo estiver correto.',
            'review_text' => 'O resumo da reserva é atualizado em tempo real enquanto preenche o formulário.',
            'review_live_text' => ':selection/4 detalhes da reserva, :customer/4 dados de contacto',

            'summary_badge' => 'Resumo',
            'summary_progress' => 'Revisão da reserva',

            'branch_label' => 'Sucursal',
            'unit_label' => 'Unidade',
            'activity_label' => 'Atividade',
            'date_time_label' => 'Data / hora',
            'customer_label' => 'Cliente',
            'email_label' => 'E-mail',
            'phone_label' => 'Telefone',
            'note_label' => 'Nota',

            'summary_empty_selection' => 'Ainda não selecionado',
            'summary_empty_customer' => 'Ainda não preenchido',

            'branch_status_title' => 'Estado da sucursal',
            'service_status_title' => 'Estado do serviço',
            'schedule_status_title' => 'Estado do horário',
        ],

        'states' => [
            'no_branches_title' => 'Nenhuma sucursal disponível',
            'no_branches_text' => 'Atualmente não existem sucursais públicas disponíveis para reserva.',

            'no_units_title' => 'Nenhuma unidade disponível',
            'no_units_text' => 'Atualmente não existem unidades disponíveis para a sucursal selecionada.',

            'no_activities_title' => 'Nenhuma atividade disponível',
            'no_activities_text' => 'Atualmente não existem atividades disponíveis para a unidade selecionada.',

            'no_slots_title' => 'Nenhum horário disponível',
            'no_slots_text' => 'Não existem horários de reserva disponíveis para a data selecionada.',

            'branch_default' => 'Escolha o local onde a reserva deve decorrer.',
            'service_default' => 'Escolha o serviço depois de selecionar a unidade adequada.',
            'schedule_loading' => 'A verificar a disponibilidade em direto para o dia selecionado.',
            'schedule_default' => 'Selecione uma data para carregar os horários de reserva disponíveis.',
        ],

        'actions' => [
            'submit' => 'Criar reserva',
            'submitting' => 'A criar reserva...',
        ],

        'messages' => [
            'created' => 'A reserva foi criada com sucesso.',
            'failed' => 'Não foi possível criar a reserva.',
        ],

        'detail' => [
            'title' => 'Detalhes da reserva',
            'badge_created' => 'Reserva criada',
            'status_label' => 'Estado',
            'heading' => 'A sua reserva está guardada',
            'description' => 'Guarde esta página para mais tarde, transfira o ficheiro de calendário ou imprima a confirmação.',
            'details_title' => 'Detalhes da reserva',
            'branch_label' => 'Sucursal',
            'unit_label' => 'Unidade',
            'activity_label' => 'Atividade',
            'date_time_label' => 'Data e hora',
            'to_label' => 'a',
            'customer_title' => 'Informações do cliente',
            'customer_name_label' => 'Primeiro nome e apelido',
            'customer_email_label' => 'E-mail',
            'customer_phone_label' => 'Telefone',
            'note_label' => 'Nota',
            'actions' => [
                'back' => 'Voltar à página de reserva',
                'print' => 'Imprimir página',
                'calendar' => 'Importar para o seu calendário',
            ],
            'fallback' => '—',
        ],
    ],
];
