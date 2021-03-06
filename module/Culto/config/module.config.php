<?php

namespace Culto;

return array(
		'controllers' => array(
				'invokables' => array(
						'CultoController' => 'Culto\Controller\CultoController',
				),
		),
		
		
		
		'router' => array(
				'routes' => array(
						
						'culto' => array(
								'type'    => 'segment',
								'options' => array(
										'route'    => '/culto[/:action][/:id]',
										'constraints' => array(
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id'     => '[0-9]+',
										),
										'defaults' => array(
												'controller' => 'CultoController',
												'action'     => 'index',
										),
								),
						),
						'home' => array(
								'type'    => 'Literal',
								'options' => array(
										'route'    => '/',
										'defaults' => array(
												'controller' => 'CultoController',
												'action'     => 'index',
										),
								),
						),
				),
		),
		// faz a diferenca��o emtre menus pelo namespace
	

		'service_manager' => array(
				'abstract_factories' => array(
						'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
						'Zend\Log\LoggerAbstractServiceFactory',
				),
				'aliases' => array(
						'translator' => 'MvcTranslator',
				),
		),
		'translator' => array(
				'locale' => 'pt_BR',
				'translation_file_patterns' => array(
						array(
								'type'     => 'gettext',
								'base_dir' => __DIR__ . '/../language',
								'pattern'  => '%s.mo',
						),
				),
		),

		'view_manager' => array(
				'display_not_found_reason' => true,
				'display_exceptions'       => true,
				'doctype'                  => 'HTML5',
				'not_found_template'       => 'error/404',
				'exception_template'       => 'error/index',
				'template_map' => array(
						'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
						'culto/index/index' => __DIR__ . '/../view/culto/culto/index.phtml',
						'error/404'               => __DIR__ . '/../view/error/404.phtml',
						'error/index'             => __DIR__ . '/../view/error/index.phtml',
				),
				'template_path_stack' => array(
						__DIR__ . '/../view',
				),
		),
	'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
    ),
);