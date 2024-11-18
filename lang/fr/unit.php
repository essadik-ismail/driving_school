<?php

$single = 'Unité';
$multiple = 'Unités';

return [
    // pages
    'index_page' => [
        'title' => "Liste des $multiple",
        'head_title' => "$multiple",
    ],

    'create_page' => [
        'title' => "Créer une $single",
        'head_title' => "Ajouter une $single",
    ],

    'edit_page' => [
        'title' => "Modifier une $single",
        'head_title' => "Modifier la $single",
    ],

    // labels
    'unit_name' => 'Nom',
    'description' => 'Description',

    // alerts
    'created' => 'Unité créée avec succès',
    'updated' => 'Unité mise à jour avec succès',
    'deleted' => 'Unité supprimée avec succès',
    'exported' => 'Unité exportée avec succès',
    'imported' => 'Unité importée avec succès',
];
