<?php

namespace Culto;

use Zend\ModuleManager\ModuleManager,
	Zend\Mvc\ModuleRouteListener,
 	Zend\Mvc\MvcEvent,
 	Zend\Authentication\AuthenticationService,
 	Zend\Authentication\Storage\Session as SessionStorage; 


use Zend\Db\ResultSet\ResultSet,
	Zend\Db\TableGateway\TableGateway;

use Culto\Service\CultoService as CultoService;

use Culto\View\Helper\MenuAtivo,
	Culto\View\Helper\Message;

class Module{
	
	public function getAutoloaderConfig(){
		return array(
				'Zend\Loader\ClassMapAutoloader' => array(
						__DIR__ . '/autoload_classmap.php',
				),
				'Zend\Loader\StandardAutoloader' => array(
						'namespaces' => array(
								__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
						),
				),
		);
	}

	public function getConfig(){
		return include __DIR__ . '/config/module.config.php';
	}

	/**
	 * Register View Helper
	 */
	public function getViewHelperConfig(){
		return array(
				# registrar View Helper com injecao de dependecia
				'factories' => array(
						'menuAtivo'  => function($sm) {
							return new MenuAtivo($sm->getServiceLocator()
									->get('Request'));
						},
						'message' => function($sm) {
							return new Message($sm	->getServiceLocator()
									->get('ControllerPluginManager')
									->get('flashmessenger'));
						},
				),
		);
	}
	
	public function getServiceConfig(){
		return array(
				'factories' => array(
						'Culto\Service\CultoService' => function($service){
							return new CultoService($service->get('Doctrine\ORM\EntityManager'));
							},

				),
		);
	}
	
}
