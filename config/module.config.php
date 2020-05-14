<?php
namespace Settings;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Settings\Controller\SettingsController;
use Settings\Controller\Factory\SettingsControllerFactory;
use Settings\Service\Factory\SettingsModelAdapterFactory;

return [
    'router' => [
        'routes' => [
            'settings' => [
                'type' => Literal::class,
                'priority' => 1,
                'options' => [
                    'route' => '/settings',
                    'defaults' => [
                        'action' => 'index',
                        'controller' => SettingsController::class,
                    ],
                ],
                'may_terminate' => TRUE,
                'child_routes' => [
                    'default' => [
                        'type' => Segment::class,
                        'priority' => -100,
                        'options' => [
                            'route' => '/[:action[/:uuid]]',
                            'defaults' => [
                                'action' => 'index',
                                'controller' => SettingsController::class,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            SettingsController::class => SettingsControllerFactory::class,
        ],
    ],
    'navigation' => [
        'default' => [
            'settings' => [
                'label' => 'Settings',
                'route' => 'settings/default',
                'class' => 'dropdown',
                'pages' => [
                    [
                        'label' => 'Add New Setting',
                        'route' => 'settings/default',
                        'action' => 'create',
                        'resource' => 'settings/default',
                        'privilege' => 'index',
                    ],
                    [
                        'label' => 'List Settings',
                        'route' => 'settings/default',
                        'action' => 'index',
                        'resource' => 'settings/default',
                        'privilege' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'aliases' => [
            'settings-model-adapter-config' => 'model-adapter-config',
        ],
        'factories' => [
            'settings-model-adapter' => SettingsModelAdapterFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];