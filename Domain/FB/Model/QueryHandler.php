<?php

namespace lwMembersearch\Domain\FB\Model;

class QueryHandler 
{
    public function __construct(\lw_db $db)
    {
        $this->db = $db;
        $this->table = 'lw_master';
        $this->type = "lw_membersearch_fb";
    }
    
    public function loadAllEntries()
    {
        $this->db->setStatement("SELECT * FROM t:".$this->table." WHERE lw_object = :type ORDER BY name ");
        $this->db->bindParameter("type", "s", $this->type);
        //die($this->db->prepare());
        return $this->db->pselect();
    }
    
    public function loadAllEntriesByCategoryId($categoryId)
    {
        $this->db->setStatement("SELECT * FROM t:".$this->table." WHERE lw_object = :type AND category_id = :category ORDER BY name ");
        $this->db->bindParameter("type", "s", $this->type);
        $this->db->bindParameter("category", "i", $categoryId);
        return $this->db->pselect();
    }
    
    public function loadObjectById($id)
    {
        $this->db->setStatement("SELECT * FROM t:".$this->table." WHERE lw_object = :type AND id = :id ORDER BY name ");
        $this->db->bindParameter("type", "s", $this->type);
        $this->db->bindParameter("id", "i", $id);
        return $this->db->pselect1();
    }
}