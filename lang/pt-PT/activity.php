<?php

return [
    'messages' => [
        'created'   => 'A atividade foi criada com sucesso.',
        'updated'   => 'A atividade foi atualizada com sucesso.',
        'deleted'   => 'A atividade foi eliminada com sucesso.',
        'failed'    => 'Não foi possível processar o pedido de atividade.',
        'not_found' => 'Atividade não encontrada.',
        'limit_reached' => 'Atingiu o número máximo permitido de atividades.',
    ],

    'validation' => [
        'name_required' => 'O nome da atividade é obrigatório.',
        'name_max' => 'O nome da atividade não pode ter mais de 255 caracteres.',

        'duration_required' => 'A duração é obrigatória.',
        'duration_integer' => 'A duração deve ser um número inteiro de minutos.',
        'duration_min' => 'A duração deve ser de pelo menos 1 minuto.',
        'duration_max' => 'A duração não pode ser superior a 1200 minutos.',

        'buffer_before_integer' => 'A margem anterior deve ser um número inteiro de minutos.',
        'buffer_before_min' => 'A margem anterior deve ser de pelo menos 0 minutos.',
        'buffer_before_max' => 'A margem anterior não pode ser superior a 60 minutos.',

        'buffer_after_integer' => 'A margem posterior deve ser um número inteiro de minutos.',
        'buffer_after_min' => 'A margem posterior deve ser de pelo menos 0 minutos.',
        'buffer_after_max' => 'A margem posterior não pode ser superior a 60 minutos.',

        'is_active_required' => 'O estado ativo é obrigatório.',
        'is_active_boolean' => 'O estado ativo deve ser verdadeiro ou falso.',
    ],

    'view' => [
        'title' => 'Atividade',
        'activities' => 'Atividades',
        'create_activity' => 'Criar atividade',
        'edit_activity' => 'Editar atividade',
        'index_description' => 'Gira as atividades que podem ser reservadas nas suas unidades.',
        'create_description' => 'Defina uma nova atividade, incluindo duração, tempos de margem e estado ativo.',
        'edit_description' => 'Atualize os detalhes de uma atividade existente, incluindo duração, tempos de margem e estado ativo.',
        'back_to_activities' => 'Voltar às atividades',
        'create_first_activity' => 'Criar a sua primeira atividade',
        'no_activities_found' => 'Não foram encontradas atividades.',
        'no_activities_text' => 'Ainda não existem atividades para apresentar. Crie a primeira atividade para começar a organizar a sua estrutura de reservas.',

        'table' => [
            'name' => 'Nome',
            'status' => 'Estado',
            'updated' => 'Atualizado',
            'actions' => 'Ações',
            'duration' => 'Duração',
            'min' => 'min',
            'active' => 'Ativo',
            'inactive' => 'Inativo',
        ],

        'overview' => [
            'title' => 'Resumo da atividade',
            'activity_id_title' => 'ID da atividade',
            'duration_title' => 'Duração',
            'duration_text' => 'Defina quanto tempo a atividade deve demorar, em minutos.',
            'buffer_time_title' => 'Tempo de margem',
            'buffer_time_text' => 'Adicione tempo opcional antes e depois da atividade para evitar sobreposições demasiado apertadas entre reservas.',
            'required_title' => 'Obrigatório',
            'optional_title' => 'Opcional',
            'status_title' => 'Estado',
            'status_text' => 'As atividades inativas permanecem guardadas no sistema, mas não podem ser utilizadas para novas reservas.',
            'active_title' => 'Ativo',
            'inactive_title' => 'Inativo',
            'note_title' => 'Nota',
            'note_text' => 'A atualização desta atividade não afetará outras atividades no sistema.',
        ],

        'form' => [
            'activity_details' => 'Detalhes da atividade',
            'complete_the_form' => 'Preencha o formulário',
            'update_the_form' => 'Atualize o formulário',
            'name_title' => 'Nome',
            'duration_title' => 'Duração (minutos)',
            'buffer_before_title' => 'Tempo de margem anterior (minutos)',
            'buffer_after_title' => 'Tempo de margem posterior (minutos)',
            'active_title' => 'Atividade ativa',
            'active_text' => 'As atividades inativas permanecem guardadas no sistema, mas não podem ser utilizadas para novas reservas.',
        ],

        'actions' => [
            'edit' => 'Editar',
            'delete' => 'Eliminar',
            'cancel' => 'Cancelar',
            'create' => 'Criar atividade',
            'creating' => 'A criar...',
            'save' => 'Guardar alterações',
            'saving' => 'A guardar...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Tem a certeza de que pretende eliminar esta atividade?',
        ],

    ],
];
