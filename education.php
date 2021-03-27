<?php

class education
{
	private $id;
	private $departamento;
	private $municipio;
	private $sede;
	private $dane_sede;
	private $institucion_educativa;
	private $dane_institucion;
	private $base_origen;
	private $latitud;
	private $longitud;
	private $estado;
	private $formacion;
	private $region;
	private $conn;
	private $tableName = "instituciones";

	function setId($id)
	{
		$this->id = $id;
	}
	function getId()
	{
		return $this->id;
	}

	function setDepartamento($departamento)
	{
		$this->departamento = $departamento;
	}
	function getDepartamento()
	{
		return $this->departamento;
	}

	function setMunicipio($municipio)
	{
		$this->municipio = $municipio;
	}
	function getMunicipio()
	{
		return $this->municipio;
	}

	function setSede($sede)
	{
		$this->sede = $sede;
	}
	function getSede()
	{
		return $this->sede;
	}

	function setDaneSede($dane_sede)
	{
		$this->dane_sede = $dane_sede;
	}
	function getDaneSede()
	{
		return $this->dane_sede;
	}

	function setInstitucionEducativa($institucion_educativa)
	{
		$this->institucion_educativa = $institucion_educativa;
	}
	function getInstitucionEducativa()
	{
		return $this->institucion_educativa;
	}

	function setDaneInstitucion($dane_institucion)
	{
		$this->dane_institucion = $dane_institucion;
	}
	function getDaneInstitucion()
	{
		return $this->dane_institucion;
	}

	function setBaseOrigen($base_origen)
	{
		$this->base_origen = $base_origen;
	}
	function getBaseOrigen()
	{
		return $this->base_origen;
	}

	function setLatitud($latitud)
	{
		$this->latitud = $latitud;
	}
	function getLatitud()
	{
		return $this->latitud;
	}

	function setLongitud($longitud)
	{
		$this->longitud = $longitud;
	}
	function getLongitud()
	{
		return $this->longitud;
	}

	function setEstado($estado)
	{
		$this->estado = $estado;
	}
	function getEstado()
	{
		return $this->estado;
	}

	function setFormacion($formacion)
	{
		$this->formacion = $formacion;
	}
	function getFormacion()
	{
		return $this->formacion;
	}

	function setRegion($region)
	{
		$this->region = $region;
	}
	function getRegion()
	{
		return $this->region;
	}

	public function __construct()
	{
		require_once('db/DbConnect.php');
		$conn = new DbConnect;
		$this->conn = $conn->connect();
	}

	public function getCollegesBlankLatLng()
	{
		$sql = "SELECT * FROM $this->tableName WHERE latitud IS NULL AND longitud IS NULL";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAllColleges()
	{
		// $sql = "SELECT * FROM $this->tableName WHERE departamento =:departamento";
		$sql = "SELECT * FROM $this->tableName  WHERE departamento = 'GUAVIARE' LIMIT 2";
		// $sql = "SELECT * FROM $this->tableName  WHERE departamento = 'HUILA'";
		// $sql = "SELECT * FROM $this->tableName";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getDepartamentos()
	{
		$sql = "SELECT DISTINCT departamento FROM  $this->tableName order by departamento";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getMunicipios()
	{
		// $sql = "SELECT DISTINCT municipio FROM  $this->tableName WHERE departamento = :departamento";
		$sql = "SELECT DISTINCT municipio FROM  $this->tableName ";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}