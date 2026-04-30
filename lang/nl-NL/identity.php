<?php

return [
    'messages' => [
        'updated' => 'Identiteitsinstellingen succesvol bijgewerkt.',
        'deletion_scheduled' => 'Uw account is ingepland voor verwijdering over 7 dagen.',
        'deletion_canceled' => 'De geplande verwijdering van uw account is geannuleerd.',
    ],

    'validation' => [
        'mode_required' => 'De boekingsmodus is verplicht.',
        'mode_in' => 'De geselecteerde boekingsmodus is ongeldig.',

        'brand_required' => 'De merknaam is verplicht.',
        'brand_max' => 'De merknaam mag niet langer zijn dan 160 tekens.',

        'slug_required' => 'De slug is verplicht.',
        'slug_min' => 'De slug moet minimaal 3 tekens bevatten.',
        'slug_max' => 'De slug mag niet langer zijn dan 120 tekens.',
        'slug_regex' => 'De slug mag alleen kleine letters, cijfers en enkele koppeltekens tussen woorden bevatten.',
        'slug_unique' => 'Deze slug is al in gebruik.',

        'default_lang_required' => 'De standaardtaal is verplicht.',
        'default_lang_max' => 'De standaardtaal mag niet langer zijn dan 16 tekens.',
        'default_lang_exists' => 'De geselecteerde standaardtaal is ongeldig.',

        'default_currency_required' => 'De standaardvaluta is verplicht.',
        'default_currency_size' => 'De standaardvaluta moet exact 3 tekens bevatten.',
        'default_currency_exists' => 'De geselecteerde standaardvaluta is ongeldig.',

        'default_country_required' => 'Het standaardland is verplicht.',
        'default_country_size' => 'Het standaardland moet exact 2 tekens bevatten.',
        'default_country_exists' => 'Het geselecteerde standaardland is ongeldig.',

        'is_public_required' => 'De zichtbaarheidsstatus is verplicht.',
        'is_public_boolean' => 'De zichtbaarheidsstatus moet waar of onwaar zijn.',
    ],

    'view' => [
        'title' => 'Identiteit',
        'description' => 'Beheer de openbare identiteit van uw boekingspagina, waaronder merknaam, openbare URL en regionale standaardinstellingen.',

        'overview' => [
            'title' => 'Overzicht',
            'brand_title' => 'Merk',
            'brand_text' => 'Stel de openbare naam in die bezoekers op uw boekingspagina zien.',
            'public_url_title' => 'Openbare URL',
            'public_url_text' => 'Kies de slug voor uw openbare boekingspagina. Uw pagina is beschikbaar via :slug',
            'defaults_title' => 'Standaardinstellingen',
            'defaults_text' => 'Definieer de standaardtaal, valuta en het standaardland die binnen uw boekingsomgeving worden gebruikt.',
            'visibility_title' => 'Zichtbaarheid',
            'visibility_text' => 'Deze instellingen bepalen hoe uw boekingspagina aan bezoekers wordt gepresenteerd en hoe uw werkomgeving standaard functioneert.',
        ],

        'form' => [
            'identity_settings' => 'Identiteitsinstellingen',
            'base_configuration' => 'Basisconfiguratie',
            'brand_name_title' => 'Merknaam',
            'brand_name_placeholder' => 'BookingCore Studio',
            'public_slug_title' => 'Openbare slug',
            'public_slug_placeholder' => 'uw-slug',
            'public_slug_prefix' => 'bookingcore.link/@',
            'default_language_title' => 'Standaardtaal',
            'select_language_title' => 'Selecteer een taal',
            'default_currency_title' => 'Standaardvaluta',
            'select_currency_title' => 'Selecteer een valuta',
            'default_country_title' => 'Standaardland',
            'select_country_title' => 'Selecteer een land',
            'booking_page_visibility_title' => 'Zichtbaarheid van de boekingspagina',
            'public_booking_page_title' => 'Openbare boekingspagina',
            'public_booking_page_text' => 'Wanneer dit is ingeschakeld, kunnen bezoekers uw boekingspagina openen via de openbare URL. Wanneer dit is uitgeschakeld, blijft de pagina verborgen voor bezoekers.',
        ],

        'actions' => [
            'cancel' => 'Annuleren',
            'save' => 'Identiteit opslaan',
            'saving' => 'Bezig met opslaan...',
            'schedule_account_deletion' => 'Accountverwijdering inplannen',
            'cancel_deletion' => 'Verwijdering annuleren',
        ],

        'deletion' => [
            'account_removal_title' => 'Accountverwijdering',
            'scheduled_deletion_title' => 'Geplande verwijdering',
            'scheduled_deletion_text' => 'Uw openbare boekingspagina wordt direct verborgen nadat de verwijdering is ingepland. Alle accountgegevens worden na 7 dagen permanent verwijderd, tenzij u het verzoek annuleert.',
            'recovery_period_title' => 'Herstelperiode',
            'recovery_period_text' => 'Tijdens de respijtperiode van 7 dagen kunt u het verwijderingsverzoek nog annuleren en uw account behouden.',
            'deletion_date_title' => 'Verwijderingsdatum',
            'deletion_date_text' => 'Uw account staat gepland voor permanente verwijdering op :date.',
        ],
    ],
];