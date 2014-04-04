<?php

namespace Culto\Entity;

use Zend\Ldap\Filter\MaskFilter;

use Zend\XmlRpc\Value\String;
use Doctrine\ORM\Mapping as ORM;

/**
 * Culto
 *
 * @ORM\Table(name="culto")
 * @ORM\Entity
 */
class CultoEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="culto_data", type="datetime", nullable=false)
     */
    private $cultoData;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_pastor", type="string", length=100, nullable=true)
     */
    private $nomePastor;

    /**
     * @var string
     *
     * @ORM\Column(name="preletor", type="string", length=100, nullable=true)
     */
    private $preletor;

    /**
     * @var string
     *
     * @ORM\Column(name="reuniao", type="string", length=255, nullable=true)
     */
    private $reuniao;

    /**
     * @var string
     *
     * @ORM\Column(name="tema", type="string", length=255, nullable=true)
     */
    private $tema;

    /**
     * @var string
     *
     * @ORM\Column(name="txt_biblico", type="string", length=100, nullable=true)
     */
    private $txtBiblico;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_pessoas", type="integer", nullable=true)
     */
    private $numPessoas;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_lideres", type="integer", nullable=true)
     */
    private $numLideres;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_consolid", type="integer", nullable=true)
     */
    private $numConsolid;

    /**
     * @var string
     *
     * @ORM\Column(name="anexos", type="string", length=255, nullable=true)
     */
    private $anexos;

    /**
     * @var float
     *
     * @ORM\Column(name="dnh_dizimos", type="float", precision=10, scale=0, nullable=true)
     */
    private $dnhDizimos;

    /**
     * @var float
     *
     * @ORM\Column(name="chq_dizimos", type="float", precision=10, scale=0, nullable=true)
     */
    private $chqDizimos;

    /**
     * @var float
     *
     * @ORM\Column(name="moe_dizimos", type="float", precision=10, scale=0, nullable=true)
     */
    private $moeDizimos;

    /**
     * @var float
     *
     * @ORM\Column(name="dnh_ofertas", type="float", precision=10, scale=0, nullable=true)
     */
    private $dnhOfertas;

    /**
     * @var float
     *
     * @ORM\Column(name="chq_ofertas", type="float", precision=10, scale=0, nullable=true)
     */
    private $chqOfertas;

    /**
     * @var float
     *
     * @ORM\Column(name="moe_ofertas", type="float", precision=10, scale=0, nullable=true)
     */
    private $moeOfertas;

    /**
     * @var float
     *
     * @ORM\Column(name="dnh_parc_deus", type="float", precision=10, scale=0, nullable=true)
     */
    private $dnhParcDeus;

    /**
     * @var float
     *
     * @ORM\Column(name="chq_parc_deus", type="float", precision=10, scale=0, nullable=true)
     */
    private $chqParcDeus;

    /**
     * @var float
     *
     * @ORM\Column(name="moe_parc_deus", type="float", precision=2, scale=2, nullable=true)
     */
    private $moeParcDeus;

    public function __construct($options = null){
    	Configurator::configure($this, $options);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getCultoData()
    {
        return $this->cultoData;
    }

    public function setCultoData($cultoData)
	{	
    	$pieces = explode("/", $cultoData);
    	$montagem = $pieces[2].'-'.$pieces[1].'-'.$pieces[0];
    	$this->cultoData = new \DateTime($montagem,
    			new \DateTimeZone('America/Araguaina'));
    	return $this;
    }

    public function getNomePastor()
    {
        return $this->nomePastor;
    }

    public function setNomePastor($nomePastor)
    {
        $this->nomePastor = $nomePastor;
        return $this;
    }

    public function getPreletor()
    {
        return $this->preletor;
    }

    public function setPreletor($preletor)
    {
        $this->preletor = $preletor;
        return $this;
    }

    public function getReuniao()
    {
        return $this->reuniao;
    }

    public function setReuniao($reuniao)
    {
        $this->reuniao = $reuniao;
        return $this;
    }

    public function getTema()
    {
        return $this->tema;
    }

    public function setTema($tema)
    {
        $this->tema = $tema;
        return $this;
    }

    public function getTxtBiblico()
    {
        return $this->txtBiblico;
    }

    public function setTxtBiblico($txtBiblico)
    {
        $this->txtBiblico = $txtBiblico;
        return $this;
    }

    public function getNumPessoas()
    {
        return $this->numPessoas;
    }

    public function setNumPessoas($numPessoas)
    {
        $this->numPessoas = $numPessoas;
        return $this;
    }

    public function getNumLideres()
    {
        return $this->numLideres;
    }

    public function setNumLideres($numLideres)
    {
        $this->numLideres = $numLideres;
        return $this;
    }

    public function getNumConsolid()
    {
        return $this->numConsolid;
    }

    public function setNumConsolid($numConsolid)
    {
        $this->numConsolid = $numConsolid;
        return $this;
    }

    public function getAnexos()
    {
        return $this->anexos;
    }

    public function setAnexos($anexos)
    {
        $this->anexos = $anexos;
        return $this;
    }

    public function getDnhDizimos()
    {
        return $this->dnhDizimos;
    }

    public function setDnhDizimos($dnhDizimos)
    {
    	$numeroTrans =  str_replace(".", "", $dnhDizimos);
    	$dnhDizimos  =  str_replace(",", ".", $numeroTrans);
        $this->dnhDizimos = $dnhDizimos;
        return $this;
    }

    public function getChqDizimos()
    {
        return $this->chqDizimos;
    }

    public function setChqDizimos($chqDizimos)
    {
    	$numeroTrans =  str_replace(".", "", $chqDizimos);
    	$chqDizimos  =  str_replace(",", ".", $numeroTrans);
        $this->chqDizimos = $chqDizimos;
        return $this;
    }

    public function getMoeDizimos()
    {
        return $this->moeDizimos;
    }

    public function setMoeDizimos($moeDizimos)
    {
    	$numeroTrans =  str_replace(".", "", $moeDizimos);
    	$moeDizimos  =  str_replace(",", ".", $numeroTrans);
        $this->moeDizimos = $moeDizimos;
        return $this;
    }

    public function getDnhOfertas()
    {
        return $this->dnhOfertas;
    }

    public function setDnhOfertas($dnhOfertas)
    {
    	$numeroTrans =  str_replace(".", "", $dnhOfertas);
    	$dnhOfertas  =  str_replace(",", ".", $numeroTrans);
        $this->dnhOfertas = $dnhOfertas;
        return $this;
    }

    public function getChqOfertas()
    {
        return $this->chqOfertas;
    }

    public function setChqOfertas($chqOfertas)
    {
    	$numeroTrans =  str_replace(".", "", $chqOfertas);
    	$chqOfertas  =  str_replace(",", ".", $numeroTrans);
        $this->chqOfertas = $chqOfertas;
        return $this;
    }

    public function getMoeOfertas()
    {
        return $this->moeOfertas;
    }

    public function setMoeOfertas($moeOfertas)
    {
    	$numeroTrans =  str_replace(".", "", $moeOfertas);
    	$moeOfertas  =  str_replace(",", ".", $numeroTrans);
        $this->moeOfertas = $moeOfertas;
        return $this;
    }

    public function getDnhParcDeus()
    {
        return $this->dnhParcDeus;
    }

    public function setDnhParcDeus($dnhParcDeus)
    {
    	$numeroTrans =  str_replace(".", "", $dnhParcDeus);
    	$dnhParcDeus =  str_replace(",", ".", $numeroTrans);
        $this->dnhParcDeus = $dnhParcDeus;
        return $this;
    }

    public function getChqParcDeus()
    {
        return $this->chqParcDeus;
    }

    public function setChqParcDeus($chqParcDeus)
    {
    	$numeroTrans =  str_replace(".", "", $chqParcDeus);
    	$chqParcDeus =  str_replace(",", ".", $numeroTrans);
        $this->chqParcDeus = $chqParcDeus;
        return $this;
    }

    public function getMoeParcDeus()
    {
        return $this->moeParcDeus;
    }

    public function setMoeParcDeus($moeParcDeus)
    {
    	$numeroTrans =  str_replace(".", "", $moeParcDeus);
    	$moeParcDeus =  str_replace(",", ".", $numeroTrans);
      	$this->moeParcDeus = $moeParcDeus;
     // print_r($this->moeParcDeus); exit;
      return $this;
    }
    
    public function toArray(){
    	return array(
    			'id'=>$this->getId(),
    			'cultoData'=>$this->getCultoData(),
    			'nomePastor'=>$this->getNomePastor(),
    			'preletor'=>$this->getPreletor(),
    			'reuniao'=>$this->getReuniao(),
    			'tema'=>$this->getTema(),
    			'txtBiblico'=>$this->getTxtBiblico(),
    			'numPessoas'=>$this->getNumPessoas(),
    			'numLideres'=> $this->getNumLideres(),
    			'numConsolid'=>$this->getNumConsolid(),
    			'anexos' => $this->getAnexos(),
    			'dnhDizimos'=>$this->getDnhDizimos(),
    			'chqDizimos'=>$this->getChqDizimos(),
    			'moeDizimos'=>$this->getMoeDizimos(),
    			'dnhOfertas'=>$this->getDnhOfertas(),
    			'chqOfertas'=>$this->getChqOfertas(),
    			'moeOfertas'=>$this->getMoeOfertas(),
    			'dnhParcDeus'=>$this->getDnhParcDeus(),
    			'chqParcDeus'=>$this->getChqParcDeus(),
    			'moeParcDeus' => $this->getMoeParcDeus(),
    	);
    }
}
