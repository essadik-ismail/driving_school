<?php

$single = 'Unit';
$multiple = 'Units';

return [
    // pages
    'index_page' => [
        'title' => "List $multiple",
        'head_title' => "$multiple",
    ],

    'create_page' => [
        'title' => "create a $single",
        'head_title' => "Add $single",
    ],

    'edit_page' => [
        'title' => "Edit $single",
        'head_title' => "Edit $single",
    ],

    // labels
    'unit_name' => 'name',
    'description' => 'description',

    // alerts
    'created' => 'stade créée avec succès',
    'updated' => 'stade mise à jour avec succès',
    'deleted' => 'stade supprimée avec succès',
    'exported' => 'stade supprimée avec succès',
    'imported' => 'stade supprimée avec succès',
];
