
<?php
class Ajaxsearch_model extends CI_Model
{
    function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("berita");
        if ($query != '') {
            $this->db->like('judul', $query);
        }
        $this->db->order_by('id_berita', 'DESC');
        return $this->db->get();
    }
}
?>