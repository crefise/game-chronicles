<?php

return [
    'imports' => [
        'game' => [
            'actives' => [
                \App\Imports\Game\RAWGImporter::class,
            ],
            'default' => \App\Imports\Game\RAWGImporter::class,
        ],
    ],
];
