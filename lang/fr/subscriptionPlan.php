<?php

$single = 'Plan d\'Abonnement';
$multiple = 'Plans d\'Abonnement';

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
    'plan_name' => 'Nom du Plan',
    'price' => 'Prix',
    'maxUsers' => 'Nombre Max d\'Utilisateurs',
    'maxStockItems' => 'Nombre Max d\'Articles en Stock',

    // alerts
    'created' => 'Plan créé avec succès',
    'updated' => 'Plan mis à jour avec succès',
    'deleted' => 'Plan supprimé avec succès',
    'exported' => 'Plan exporté avec succès',
    'imported' => 'Plan importé avec succès',
];
