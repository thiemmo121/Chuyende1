<?php

return [
    'paths' => [resource_path('views')],
    'compiled' => env('VIEW_COMPILED_PATH', realpath(storage_path('framework/views'))),
    'relative_hash' => false,
    'charset' => 'UTF-8',
    'component_paths' => [resource_path('views/components')],
    'component_namespace' => null,
];
