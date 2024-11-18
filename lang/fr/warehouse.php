<?php

$single = 'Entrepôt';
$multiple = 'Entrepôts';

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
    'name' => 'Nom',
    'location' => 'Emplacement',

    // alerts
    'created' => 'Entrepôt créé avec succès',
    'updated' => 'Entrepôt mis à jour avec succès',
    'deleted' => 'Entrepôt supprimé avec succès',
    'exported' => 'Entrepôt exporté avec succès',
    'imported' => 'Entrepôt importé avec succès',
];
