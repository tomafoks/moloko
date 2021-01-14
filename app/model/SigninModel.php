<?php
    class SigninModel extends DB\SQL\Mapper
    {
        public function __construct(DB\SQL $db)
        {
            parent::__construct($db, "user");
        }
        
        public function getEmail($email) {
            $this->load(array('email=?',$email));
        }

        public function getId($id) {
            $this->load(array('iduser=?',$id));
        }

        public function addNewUser($param) {
            $this->nameuser = $param['nameuser'];
            $this->lastnameuser = $param['lastnameuser'];
            $this->email = $param['email'];
            $this->phone = $param['phone'];
            $this->password = password_hash($param['password'], PASSWORD_DEFAULT);
            $this->save();
            return true;
        }
    }
    