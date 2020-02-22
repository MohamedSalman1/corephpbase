<?php

    include_once('includes/database.php');

    class UserModel extends DbModel {

        public function checkEmailRegistered($email) {
            $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ? order by id desc");
            $stmt->execute([$email]);
            $row = $stmt->fetch();
            return empty($row) ? true : false;
        }

    }
