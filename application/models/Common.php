<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Model
{

	public function set_data($table, $data)
	{
		$this->db->trans_start();
		$this->db->insert($table, $data);
		$returnValue = $this->db->insert_id();
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$error = $this->db->error();
			print_r($error);
		} else {
			return $returnValue;
		}
	}


	public function set_data_mod($table, $data)
	{
		$otherdb = $this->load->database('offline', TRUE);
		$otherdb->trans_start();
		$otherdb->insert($table, $data);
		$returnValue = $otherdb->insert_id();
		$otherdb->trans_complete();
		if ($otherdb->trans_status() === FALSE) {
			$error = $otherdb->error();
			print_r($error);
		} else {
			return $returnValue;
		}
	}
	public function online_insert($table, $data)
	{
		$otherdb = $this->load->database('otherdb', TRUE);
		$otherdb->trans_start();
		$otherdb->insert($table, $data);
		$returnValue = $otherdb->insert_id();
		$otherdb->trans_complete();
		if ($otherdb->trans_status() === FALSE) {
			$error = $otherdb->error();
			print_r($error);
		} else {
			return $returnValue;
		}
	}

	public function online_check($table, $index, $data)
	{
		$otherdb = $this->load->database('otherdb', TRUE);
		$otherdb->where($index, $data);
		$query = $otherdb->get($table);
		if ($otherdb->affected_rows() > 0) {
			return $query->row();
		} else {
			return FALSE;
		}
	}

	public function online_updated($table, $index, $identifier, $data)
	{
		$otherdb = $this->load->database('otherdb', TRUE);
		$otherdb->where($index, $identifier);
		$otherdb->update($table, $data);
		if ($otherdb->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function get_data($table)
	{
		$query = $this->db->get($table);
		if ($this->db->affected_rows() > 0) {
			return $query;
		} else {
			return FALSE;
		}
	}
	
	public function get_data_desc($table,$order_by)
	{
		
		$this->db->order_by($order_by, 'DESC');
		$query = $this->db->get($table);
		if ($this->db->affected_rows() > 0) {
			return $query;
		} else {
			return FALSE;
		}
	}

	public function g_etData($table)
	{
		$query = $this->db->get($table);
		return $query;
	}

	public function get_data_multi_conditional($table, $data)
	{
		$this->db->where($data);
		$query = $this->db->get($table);
		return $query;
	}

	public function get_data_multi_conditional_mod($table, $data)
	{
		$otherdb = $this->load->database('offline', TRUE);
		$otherdb->where($data);
		$query = $otherdb->get($table);
		return $query;
	}

	public function get_data_multi_conditional_desc($table, $data, $order_by)
	{
		$this->db->where($data);
		$this->db->order_by($order_by, 'DESC');
		$query = $this->db->get($table);
		return $query;
	}
	public function get_data_multi_conditional_limit_desc($table, $order_by, $limit)
	{
		$this->db->order_by($order_by, 'DESC');
		$this->db->limit($limit);
		$query = $this->db->get($table);
		return $query;
	}
	public function get_data_conditional_limit_desc($table, $data, $order_by, $limit)
	{
		$this->db->where($data);
		$this->db->order_by($order_by, 'DESC');
		$this->db->limit($limit);
		$query = $this->db->get($table);
		return $query;
	}
	public function get_data_multi_conditional_desc_mod($table, $data, $order_by)
	{
		$otherdb = $this->load->database('offline', TRUE);
		$otherdb->where($data);
		$otherdb->order_by($order_by, 'DESC');
		$query = $otherdb->get($table);
		return $query;
	}
	public function get_data_multi_conditional_asc($table, $data, $order_by)
	{
		$this->db->where($data);
		$this->db->order_by($order_by, 'ASC');
		$query = $this->db->get($table);
		return $query;
	}

	public function get_data_multi_conditional_group($table, $data, $group_by)
	{
		$this->db->where($data);
		$this->db->group_by($group_by);
		$query = $this->db->get($table);
		return $query;
	}

	public function get_data_single_conditional($table, $index, $data)
	{
		$this->db->where($index, $data);
		$query = $this->db->get($table);
		return $query;
	}


	public function get_single_row_information($table, $index, $data)
	{
		$this->db->where($index, $data);
		$query = $this->db->get($table);
		if ($this->db->affected_rows() > 0) {
			return $query->row();
		} else {
			return FALSE;
		}
	}


	function delete_data($table, $index, $data)
	{
		$this->db->where($index, $data);
		$this->db->delete($table);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function update_data($table, $index, $identifier, $data)
	{
		$this->db->where($index, $identifier);
		$this->db->update($table, $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function update_data_mul_condition($table, $identifier, $data)
	{
		$this->db->where($identifier);
		$this->db->update($table, $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function pegination_count($table, $index, $identifier)
	{
		$this->db->where($index, $identifier);
		$query = $this->db->get($table);
		$rowcount = $query->num_rows();
		return $rowcount;
	}

	public function count_data($table, $index, $data)
	{
		$this->db->where($index, $data);
		$this->db->get($table);
		if ($this->db->affected_rows() > 0) {
			return $this->db->affected_rows();
		} else {
			return 0;
		}
	}


	public function count_data_member($table, $data)
	{
		$this->db->where($data);
		$this->db->get($table);
		if ($this->db->affected_rows() > 0) {
			return $this->db->affected_rows();
		} else {
			return 0;
		}
	}


	public function count_data_search_like($table, $index, $data, $where_data)
	{
		$this->db->like($index, $data, 'both');
		$this->db->where($where_data);
		$this->db->get($table);
		if ($this->db->affected_rows() > 0) {
			return $this->db->affected_rows();
		} else {
			return 0;
		}
	}

	public function count_all($table)
	{

		$this->db->get($table);
		if ($this->db->affected_rows() > 0) {
			return $this->db->affected_rows();
		} else {
			return 0;
		}
	}

	//pagination start

	public function getData($rowno, $rowperpage, $table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result();
	}

	// Select total records
	public function getrecordCount($table)
	{
		$this->db->select('count(*) as allcount');
		$this->db->from($table);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	//pagination end
	public function get_data_view_multi_conditional($table, $data)
	{
		$this->db->where($data);
		$query = $this->db->get($table);
		return $query->result();
	}

	public function sql_excute($sql)
	{
		$query = $this->db->query($sql);
		return $query;
	}

	public function table_empty($table)
	{
		$this->db->from($table);
		$query = $this->db->truncate();
		return $query;
	}

	public function table_empty_mod($table)
	{
		$otherdb = $this->load->database('offline', TRUE);
		$otherdb->from($table);
		$query = $otherdb->truncate();
		return $query;
	}
	function delete($table, $data)
	{
		$this->db->where($data);
		$this->db->delete($table);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function checkNumberCodeAuth($data)
	{
		$this->db->where('a_credential', $data);
		$query = $this->db->get('authority');
		if ($this->db->affected_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}
	
    public function set_data_batch($table, $data) {
        $query = $this->db->insert_batch($table, $data);
    }
	
    public function delete_batch($table, $index, $delete_arr) {
        foreach ($delete_arr as $key => $value) {
            $id = $value["id"];
            $this->db->where($index, $id)->delete($table);
        }
    }
	
	public function gallery_photo( $limit, $offset ) {
        $q = $this->db
                        ->limit( $limit, $offset )
                        ->get('gallery_photo');
        return $q->result();
    }
	
	public function get_data_applicant_list($data) {
		$this->db->join('recruitment','applicant.ap_rec_id = recruitment.rec_id');
		$this->db->join('register','applicant.ap_r_candidate_id = register.r_candidate_id');
		$this->db->where($data);
		$query = $this->db->get('applicant');

		return $query;
	}
}
