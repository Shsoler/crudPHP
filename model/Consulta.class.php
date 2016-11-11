<?php 

include_once('../model/Medico.class.php');
include_once('../model/Paciente.class.php');

class Consulta{
    private $id;
    private $datacon;   
    private $paciente;
    private $medico;

    public function __construct(){
        $this->medico = new Medico();
        $this->paciente = new Paciente();
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    /**
     * Gets the value of datacon.
     *
     * @return mixed
     */
    public function getDatacon()
    {
        return $this->datacon;
    }

    /**
     * Sets the value of datacon.
     *
     * @param mixed $datacon the datacon
     *
     * @return self
     */
    public function setDatacon($datacon)
    {
        $this->datacon = $datacon;

        return $this;
    }
    /**
     * Gets the value of paciente.
     *
     * @return mixed
     */
    public function getPaciente()
    {
        return $this->paciente;
    }

    /**
     * Sets the value of paciente.
     *
     * @param mixed $paciente the paciente
     *
     * @return self
     */
    public function setPaciente($paciente)
    {
        $this->paciente = $paciente;

        return $this;
    }

    /**
     * Gets the value of medico.
     *
     * @return mixed
     */
    public function getMedico()
    {
        return $this->medico;
    }

    /**
     * Sets the value of medico.
     *
     * @param mixed $medico the medico
     *
     * @return self
     */
    public function setMedico($medico)
    {
        $this->medico = $medico;

        return $this;
    }
}

 ?>