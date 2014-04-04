<?php
namespace Culto\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Culto\Model\Culto;
use Culto\Form\CultoForm;

use Zend\Paginator\Paginator,
	Zend\Paginator\Adapter\ArrayAdapter;

abstract class CrudController extends AbstractActionController{

	protected $em;
	protected $service;
	protected $entity;
	protected $form;
	protected $route;
	protected $controller;
	public function indexAction(){		
		
			$list = $this->getEm()
                ->getRepository($this->entity)
                ->findAll();
			
			
			return new ViewModel(array(
					'financ' => $list,
			));
	}
	//ADICIONAR
	public function addAction(){
		
		$form = new $this->form();
		$form->get('submit')->setValue('Enviar');
		 
		$request = $this->getRequest();
		
		if ($request->isPost()) {			
			$form->setData($request->getPost());
			 
			if ($form->isValid()) {
				$service = $this->getServiceLocator()->get($this->service);
				
				$service->insert($request->getPost()->toArray());
				 
				$this->flashMessenger()->addSuccessMessage("Culto Criado com Sucesso.");
				
				// Redirect to list of albums
				return $this->redirect()->toRoute(
						$this->route, 
						array('controller' => $this->controller));
			}else{
				$this->flashMessenger()->addErrorMessage("Erro ao adicionar as informações.");
			}
		}
		return array('form' => $form);
	}
	//EDITAR
	public function editAction(){		
		//Se nao passar nenhum ID vai para ADD
		$id = (int) $this->params()->fromRoute('id', 0);
		if (!$id) {
			return $this->redirect()->toRoute(
						$this->route, 
						array('controller' => $this->controller));
		}
		
		$form = new $this->form();		
		$request = $this->getRequest();
		
		$repository = $this->getEm()->getRepository($this->entity);
		
		$entity = $repository->find($this->params()->fromRoute('id', 0));
		
		if($this->params()->fromRoute('id', 0)){
			$form->setData($entity->toArray());
		}
		
		if ($request->isPost()) {			
							
			$form->setData($request->getPost());
			
			
			if ($form->isValid()) {
				$service = $this->getServiceLocator()->get($this->service);
				$service->update($request->getPost()->toArray());
				
				$this->flashMessenger()->addSuccessMessage("Culto Editado com Sucesso.");
					
				// Redirect to list of albums
				return $this->redirect()->toRoute(
						$this->route, 
						array('controller' => $this->controller));
			}else{
				$this->flashMessenger()->addErrorMessage("Erro ao editar as informações.");
			}
		}
		return array(
				'id' => $id,
				'form' => $form,
		);
	}	
	
	public function deleteAction(){
		
		$id = (int) $this->params()->fromRoute('id', 0);
		
		if (!$id) {
			return $this->redirect()->toRoute(
						$this->route, 
						array('controller' => $this->controller));
		}
		
		$service = $this->getServiceLocator()->get($this->service);
		
			if ($service->delete($this->params()->fromRoute('id', 0), 0)) {
				$this->flashMessenger()->addSuccessMessage("O registro foi excluido com sucesso.$id");
				return $this->redirect()->toRoute(
						$this->route,
						array('controller' => $this->controller));
				}
	}
	
	protected function getEm(){
		if(null === $this->em)
			$this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		
		return $this->em;
	}
	
	
}