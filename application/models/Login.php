<?php

class Login extends Model {
        
        public function asd() {
                $result = $this->db->prepare('SELECT * FROM sth');
                $result->execute();
                
                return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        
}