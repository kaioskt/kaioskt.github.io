<?php
namespace Culto\Service;

use Doctrine\ORM\EntityManager;

class CultoService extends AbstractService{
	
	public function __construct(EntityManager $em){
		parent::__construct($em);
		$this->entity = 'Culto\Entity\CultoEntity';
	}
	
	
	
}