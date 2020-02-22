<?php

    include('constants.php');

    class DbModel {

        protected $db;

        public function __construct() {
            try {
                $this->db = new PDO(
                    'mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME,
                    DB_USERNAME,
                    DB_PASSWORD,
                    [
                        PDO::ATTR_EMULATE_PREPARES => false, // turn off emulation mode for "real" prepared statements
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
                        PDO::MYSQL_ATTR_FOUND_ROWS => true
                    ]
                );
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        protected function save($table, $data) {
            $date = date('Y-m-d H:i:s');
            $keys = array_keys($data);
            $keys[] = 'created_at';
            $keys[] = 'updated_at';
            $columns = implode(', ', $keys);
            
            $qmarks = implode(', ', array_fill(0, count($keys), '?'));
            $values = array_values($data);
            $values[] = $date;
            $values[] = $date;

            $stmt = $this->db->prepare("INSERT INTO $table ($columns) VALUES ($qmarks)");
            $stmt->execute($values);
            $stmt = null;
            return $this->db->lastInsertId();
        }

    }
    