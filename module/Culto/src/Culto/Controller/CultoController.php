<?php
namespace Culto\Controller;

class CultoController extends CrudController{
	
	public function __construct(){
		$this->entity = 'Culto\Entity\CultoEntity';
		$this->service = 'Culto\Service\CultoService';
		$this->form = 'Culto\Form\CultoForm';
		$this->route = 'culto';
		$this->controller = 'CultoController';
		
	}
	
}