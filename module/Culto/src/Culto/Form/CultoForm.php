<?php
namespace Culto\Form;

use Zend\Form\Annotation\Options;

use Doctrine\DBAL\Types\Type;

use Zend\Form\Form;

class CultoForm extends Form{
	public function __construct($name = null)
	{
		parent::__construct('cultoform');

		$this->setAttribute('method', 'post');
		$this->setInputFilter(new CultoFilter());

		$this->add(array(
				'name' => 'id',
				'type' => 'Hidden',
		));
		$this->add(array(
				'name' => 'cultoData',
				'type' => 'DateTime',
				'options' => array(
						'format' => 'd/m/Y',
						'label' =>'Data:'
				),
				'attributes' => array(
						'id' =>'cultoData',
						'class' => 'form-control',
						'placeholder' => 'Data da Reunião',
				),
				
					
		));
		$this->add(array(
				
				'name' => 'nomePastor',
				'attributes' => array(
						'id' =>'nomePastor',
						'class' => 'form-control',
						'placeholder' => 'Nome do pastor ou Lider Responsavel',
				),
				'options' => array(
						'label' =>'Pastor:'
				),
					
		));
		$this->add(array(
				'name' => 'preletor',
				'attributes' => array(
						'id' =>'preletor',
						'class' => 'form-control',
						'placeholder' => 'O Preletor da palavra',
				),
				'options' => array(
						'label' =>'Preletor:'
				),
					
		));
		$this->add(array(
				'name' => 'reuniao',
				'type' => 'Text',
				
				'attributes' => array(
						'id' =>'reuniao',
						'class' => 'form-control', 
						'placeholder' => 'O Tipo do Culto',
				),
				'options' => array(
						'label' =>'Tipo da Reuniao:'
				),
					
					
		));
		$this->add(array(
				'name' => 'tema',
				'attributes' => array(
						'id' =>'tema',
						'class' => 'form-control',
						'placeholder' => 'Tema da Palavra',
				),
				'options' => array(
						'label' =>'Tema do Culto:'
				),
					
					
		));
		$this->add(array(
				'name' => 'txtBiblico',
				'attributes' => array(
						'id' =>'txtBiblico',
						'class' => 'form-control',
						'placeholder' => 'Texto Base',
				),
				'options' => array(
						'label' =>'Texto Biblico:'
				),
					
					
		));
		$this->add(array(
				'name' => 'numPessoas',
				'attributes' => array(
						'id' =>'numPessoas',
						'class' => 'form-control',
						'placeholder' => 'Numero de Pessoas',
				),
				'options' => array(
						'label' =>'Numero de Pessoas:'
				),
					
					
		));
		$this->add(array(
				'name' => 'numLideres',
				'attributes' => array(
						'id' =>'numLideres',
						'class' => 'form-control',
						'placeholder' => 'Numero de Lideres',
				),
				'options' => array(
						'label' =>'Numero de Lideres:'
				),
					
					
		));
		$this->add(array(
				'name' => 'numConsolid',
				'attributes' => array(
						'id' =>'numConsolid',
						'class' => 'form-control',
						'placeholder' => 'Numero de Consolidações',
				),
				'options' => array(
						'label' =>'Numero Consolidações:'
				),	
					
		));
		
		
		$this->add(array(
				'name' => 'dnhDizimos',
				'attributes' => array(
						'id' =>'dnhDizimos',
						'class' => 'form-control',
						'placeholder' => 'dnh Dizimos',
				),
				'options' => array(
						'label' =>'Dinheiro Dizimos:'
				),
					
					
		));
		$this->add(array(
				'name' => 'chqDizimos',
				'attributes' => array(
						'id' =>'chqDizimos',
						'class' => 'form-control',
						'placeholder' => 'chq Dizimos',
				),
				'options' => array(
						'label' =>'Cheque Dizimos:'
				),
					
					
		));
		$this->add(array(
				'name' => 'moeDizimos',
				'attributes' => array(
						'id' =>'moeDizimos',
						'class' => 'form-control',
						'placeholder' => 'moe Dizimos',
				),
				'options' => array(
						'label' =>'Moedas Dizimos:'
				),
					
					
		));
		
		$this->add(array(
				'name' => 'dnhOfertas',
				'attributes' => array(
						'id' =>'dnhOfertas',
						'class' => 'form-control',
						'placeholder' => 'dnh Ofertas',
				),
				'options' => array(
						'label' =>'Dinheiro Ofertas:'
				),
					
					
		));
		$this->add(array(
				'name' => 'chqOfertas',
				'attributes' => array(
						'id' =>'chqOfertas',
						'class' => 'form-control',
						'placeholder' => 'chq Ofertas',
				),
				'options' => array(
						'label' =>'Cheque Ofertas:'
				),
					
					
		));
		$this->add(array(
				'name' => 'moeOfertas',
				'attributes' => array(
						'id' =>'moeOfertas',
						'class' => 'form-control',
						'placeholder' => 'moe Ofertas',
				),
				'options' => array(
						'label' =>'Moedas Ofertas:'
				),
					
					
		));
		
		$this->add(array(
				'name' => 'dnhParcDeus',
				'attributes' => array(
						'id' =>'dnhParcDeus',
						'class' => 'form-control',
						'placeholder' => 'dinheiro Parceiro de Deus',
				),
				'options' => array(
						'label' =>'Dinheiro Parceiro de Deus:'
				),
					
					
		));
		$this->add(array(
				'name' => 'chqParcDeus',
				'attributes' => array(
						'id' =>'chqParcDeus',
						'class' => 'form-control',
						'placeholder' => 'cheque Parceiro de Deus',
				),
				'options' => array(
						'label' =>'Cheque Parceiro de Deus:'
				),
					
					
		));
		$this->add(array(
				'name' => 'moeParcDeus',
				'attributes' => array(
						'id' =>'moeParcDeus',
						'class' => 'form-control',
						'placeholder' => 'moe ParcDeus',
				),
				'options' => array(
						'label' =>'Moedas Parceiro de Deus:'
				),
					
					
		));
		
		$this->add(array(
				'name' => 'imgAnexo',
				'type' => 'Text',
				'attributes' => array(
						'id' =>'imgAnexo',
						'class' => 'form-control',
						'placeholder' => 'Foto dos Relatorios',
				),
				'options' => array(
						'label' =>'Anexo:'
				),
					
					
		));
		$this->add(array(
				'name' => 'submit',
				'type' => 'Submit',
				'attributes' => array(
						'id' => 'submitbutton',
						'class' =>'btn btn-primary',
				),
		));
	}
}