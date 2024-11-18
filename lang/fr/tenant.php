<?php

$single = 'Locataire';
$multiple = 'Locataires';

return [
    // pages
    'index_page' => [
        'title' => "Liste des $multiple",
        'head_title' => "$multiple",
    ],

    'create_page' => [
        'title' => "Créer un $single",
        'head_title' => "Ajouter un $single",
    ],

    'edit_page' => [
        'title' => "Modifier un $single",
        'head_title' => "Modifier le $single",
    ],

    // labels
    'companyName' => 'Nom de l\'Entreprise',
    'address' => 'Adresse',
    'tel' => 'Téléphone',
    'gsm' => 'Gsm',
    'email' => 'Email',
    'website' => 'Site Web',
    'subscription_plan_id' => 'Plan d\'Abonnement',

    // alerts
    'created' => 'Locataire créé avec succès',
    'updated' => 'Locataire mis à jour avec succès',
    'deleted' => 'Locataire supprimé avec succès',
    'exported' => 'Locataire exporté avec succès',
    'imported' => 'Locataire importé avec succès',
];
