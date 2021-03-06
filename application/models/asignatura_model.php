<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class asignatura_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function insertar($new_asignatura)
	{
		if($this->db->insert('asignatura', $new_asignatura))
			return true;
		else
			return false;
	}
	
	public function mostrar()
	{
		$query = $this->db->select('*')->from('asignatura')->join('academico', 'asignatura.academico_asignatura = academico.id_academico')->get();
                return $query->result();
	}
	
	public function editar($id, $data)
	{
		if($this->db->where('id_asignatura', $id)->update('asignatura', $data))
			return true;
		else
			return false;
	}
	
	public function getAsignatura($id)
	{
		return $this->db->select('*')->from('asignatura')->where('id_asignatura', $id)->get()->row();
	}

	public function mostrar_academico()
        {
                $query_academico = $this->db->SELECT('*')->FROM('academico')->get();
                return $query_academico->result();
        }

	public function eliminar($id)
        {
            if($this->db->delete('evaluacion', array('asignatura_evaluacion'=>$id)))
            {
                if($this->db->delete('asignatura', array('id_asignatura'=>$id)))
                    return true;
                return true;
            }
            else
            {
                if($this->db->delete('asignatura', array('id_asignatura'=>$id)))
                    return true;
                else
                    return false;
            }
        }
}
