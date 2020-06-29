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

    function searchContacts($searchString) {

        try {

            include 'db.php';

            $res = $conn->query(
                "SELECT contact_name, workplace, phone, contact_id FROM contacts WHERE contact_name LIKE '%$searchString%' OR phone LIKE '%$searchString%' OR workplace LIKE '%$searchString%'");

            $contacts = $res->fetch_all();

            $res_count = $conn->query(
                "SELECT COUNT(*) as count FROM contacts WHERE contact_name LIKE '%$searchString%' OR phone LIKE '%$searchString%' OR workplace LIKE '%$searchString%'");
            
            $count = $res_count->fetch_assoc();

            return array(
                'contacts' => $contacts,
                'count' => $count
            );

        } catch(Exception $e) {

            echo "Error! " . $e->getMessage();

            return false;
        }


    }


    function getAllContacts(){

        try {

            include 'db.php';
            
            return $conn->query("SELECT contact_name, workplace, phone, contact_id FROM contacts");

        } catch(Exception $e) {

            echo "Error! " . $e->getMessage();

            return false;
        }

    }


?>