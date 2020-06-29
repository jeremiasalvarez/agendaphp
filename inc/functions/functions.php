<?php 

    include 'db.php';

    function loadContacts() {
   
        try {
            include 'db.php';
            $queryString = "SELECT * FROM `contacts`";
            
            return $conn->query('SELECT * FROM contacts');

        } catch(Exception $e) {

            echo "Error! " . $e->getMessage();

            return false;
        }

    }

    function getContactCount(){

        
        try {

            include 'db.php';

            $queryString = "SELECT COUNT(*) FROM contacts";
            
            return $conn->query("SELECT COUNT(*) AS contact_count FROM contacts")->fetch_array()['contact_count'];

        } catch(Exception $e) {

            echo "Error! " . $e->getMessage();

            return false;
        }

    }

    function loadContact($id){
        try {
            include 'db.php';
           
            return $conn->query("SELECT * FROM contacts WHERE contact_id = $id");

        } catch(Exception $e) {

            echo "Error! " . $e->getMessage();

            return false;
        }
    }


?>