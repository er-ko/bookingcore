<?php

return [
    'view' => [
        'title' => 'Agende seu horário',
        'description' => 'Escolha a filial, o serviço, a data e a hora que forem mais convenientes para você.',

        'form' => [
            'branch_title' => 'Filial',
            'branch_placeholder' => 'Selecionar filial',

            'unit_title' => 'Unidade',
            'unit_placeholder' => 'Selecionar unidade',

            'activity_title' => 'Atividade',
            'activity_placeholder' => 'Selecionar atividade',

            'date_title' => 'Data',
            'date_placeholder' => 'Selecionar data',

            'slot_title' => 'Hora disponível',
            'slot_placeholder' => 'Selecionar hora',

            'first_name_title' => 'Nome',
            'first_name_placeholder' => 'João',

            'last_name_title' => 'Sobrenome',
            'last_name_placeholder' => 'Silva',

            'email_title' => 'E-mail',
            'email_placeholder' => 'joao@example.com',

            'phone_code_title' => 'Código telefônico',
            'phone_code_placeholder' => '+55',

            'phone_title' => 'Telefone',
            'phone_placeholder' => '11912345678',

            'note_title' => 'Nota',
            'note_placeholder' => 'Informações adicionais para sua reserva',
        ],

        'content' => [
            'form_title' => 'Complete sua reserva',
            'ready' => 'pronto',

            'appointment_title' => 'Detalhes do agendamento',
            'appointment_text' => 'Escolha a filial, a unidade, o serviço, a data e o horário que melhor se adequam.',

            'customer_title' => 'Detalhes do cliente',
            'customer_text' => 'Adicione os dados de contato necessários para confirmar e identificar a reserva.',

            'note_title' => 'Nota adicional',
            'note_text' => 'Compartilhe qualquer informação útil antes do início da reserva.',

            'review_title' => 'Reveja os detalhes da reserva e confirme quando tudo estiver correto.',
            'review_text' => 'O resumo da reserva é atualizado em tempo real enquanto preenche o formulário.',
            'review_live_text' => ':selection/4 detalhes da reserva, :customer/4 dados de contato',

            'summary_badge' => 'Resumo',
            'summary_progress' => 'Revisão da reserva',

            'branch_label' => 'Filial',
            'unit_label' => 'Unidade',
            'activity_label' => 'Atividade',
            'date_time_label' => 'Data / hora',
            'customer_label' => 'Cliente',
            'email_label' => 'E-mail',
            'phone_label' => 'Telefone',
            'note_label' => 'Nota',

            'summary_empty_selection' => 'Ainda não selecionado',
            'summary_empty_customer' => 'Ainda não preenchido',

            'branch_status_title' => 'Estado da filial',
            'service_status_title' => 'Estado do serviço',
            'schedule_status_title' => 'Estado do horário',
        ],

        'states' => [
            'no_branches_title' => 'Nenhuma filial disponível',
            'no_branches_text' => 'Atualmente não há filiais públicas disponíveis para reserva.',

            'no_units_title' => 'Nenhuma unidade disponível',
            'no_units_text' => 'Atualmente não há unidades disponíveis para a filial selecionada.',

            'no_activities_title' => 'Nenhuma atividade disponível',
            'no_activities_text' => 'Atualmente não há atividades disponíveis para a unidade selecionada.',

            'no_slots_title' => 'Nenhum horário disponível',
            'no_slots_text' => 'Não há horários de reserva disponíveis para a data selecionada.',

            'branch_default' => 'Escolha o local onde a reserva deve ocorrer.',
            'service_default' => 'Escolha o serviço depois de selecionar a unidade adequada.',
            'schedule_loading' => 'Verificando a disponibilidade em tempo real para o dia selecionado.',
            'schedule_default' => 'Selecione uma data para carregar os horários de reserva disponíveis.',
        ],

        'actions' => [
            'submit' => 'Criar reserva',
            'submitting' => 'Criando reserva...',
        ],

        'messages' => [
            'created' => 'A reserva foi criada com sucesso.',
            'failed' => 'Não foi possível criar a reserva.',
        ],

        'detail' => [
            'title' => 'Detalhes da reserva',
            'badge_created' => 'Reserva criada',
            'status_label' => 'Estado',
            'heading' => 'Sua reserva está salva',
            'description' => 'Salve esta página para mais tarde, baixe o arquivo de calendário ou imprima a confirmação.',
            'details_title' => 'Detalhes da reserva',
            'branch_label' => 'Filial',
            'unit_label' => 'Unidade',
            'activity_label' => 'Atividade',
            'date_time_label' => 'Data e hora',
            'to_label' => 'a',
            'customer_title' => 'Informações do cliente',
            'customer_name_label' => 'Primeiro nome e sobrenome',
            'customer_email_label' => 'E-mail',
            'customer_phone_label' => 'Telefone',
            'note_label' => 'Nota',
            'actions' => [
                'back' => 'Voltar à página de reserva',
                'print' => 'Imprimir página',
                'calendar' => 'Importar para seu calendário',
            ],
            'fallback' => '—',
        ],
    ],
];
