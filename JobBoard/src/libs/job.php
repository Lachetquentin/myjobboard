<?php
include_once 'config/init.php';

class Job
{
    private $db;
    private $parPage = parPage;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get Profession
    public function getProfession()
    {
        $this->db->query("SELECT * FROM profession");

        $results = $this->db->resultSet();

        return $results;
    }

    // Get Location
    public function getLocation()
    {
        $this->db->query("SELECT * FROM location");

        $results = $this->db->resultSet();

        return $results;
    }

    // Get Contract
    public function getContract()
    {
        $this->db->query("SELECT * FROM contract");

        $results = $this->db->resultSet();

        return $results;
    }

    // --- Order by post_date DESC --- //

    // Get All Jobs
    public function getAllJobs()
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname 
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        ORDER BY `post_date` DESC 
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfession($profession)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.profession_id = $profession
        ORDER BY post_date DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByLocation($location)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id = $location
        ORDER BY post_date DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByContract($contract)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.contract_id = $contract
        ORDER BY post_date DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionAndLocation($profession, $location)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.profession_id = $profession
        AND jobs.location_id = $location
        ORDER BY post_date DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionAndContract($profession, $contract)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.profession_id = $profession
        AND jobs.contract_id = $contract
        ORDER BY post_date DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByLocationAndContract($location, $contract)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id = $location
        AND jobs.contract_id = $contract
        ORDER BY post_date DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionContractAndLocation($profession, $contract, $location)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id
        AND jobs.profession_id = $profession
        AND jobs.location_id = $location
        AND jobs.contract_id = $contract
        ORDER BY post_date DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    // --- Order by post_date ASC --- //

    // Get All Jobs
    public function getAllJobsAsc()
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        ORDER BY `post_date`
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionAsc($profession)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.profession_id = $profession
        ORDER BY post_date
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByLocationAsc($location)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id = $location
        ORDER BY post_date
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByContractAsc($contract)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.contract_id = $contract
        ORDER BY post_date
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionAndLocationAsc($profession, $location)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.profession_id = $profession
        AND jobs.location_id = $location
        ORDER BY post_date
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionAndContractAsc($profession, $contract)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.profession_id = $profession
        AND jobs.contract_id = $contract
        ORDER BY post_date
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByLocationAndContractAsc($location, $contract)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id = $location
        AND jobs.contract_id = $contract
        ORDER BY post_date
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionContractAndLocationAsc($profession, $contract, $location)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id
        AND jobs.profession_id = $profession
        AND jobs.location_id = $location
        AND jobs.contract_id = $contract
        ORDER BY post_date
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    // --- Order by job_title DESC --- //

    // Get All Jobs
    public function getAllJobsAlphDesc()
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        ORDER BY job_title DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionAlphDesc($profession)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.profession_id = $profession
        ORDER BY job_title DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByLocationAlphDesc($location)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id = $location
        ORDER BY job_title DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByContractAlphDesc($contract)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.contract_id = $contract
        ORDER BY job_title DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionAndLocationAlphDesc($profession, $location)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.profession_id = $profession
        AND jobs.location_id = $location
        ORDER BY job_title DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionAndContractAlphDesc($profession, $contract)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.profession_id = $profession
        AND jobs.contract_id = $contract
        ORDER BY job_title DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByLocationAndContractAlphDesc($location, $contract)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id = $location
        AND jobs.contract_id = $contract
        ORDER BY job_title DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionContractAndLocationAlphDesc($profession, $contract, $location)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id
        AND jobs.profession_id = $profession
        AND jobs.location_id = $location
        AND jobs.contract_id = $contract
        ORDER BY job_title DESC
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    // --- Order by job_title ASC --- //

    // Get All Jobs
    public function getAllJobsAlphAsc()
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        ORDER BY job_title 
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionAlphAsc($profession)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.profession_id = $profession
        ORDER BY job_title
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByLocationAlphAsc($location)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id = $location
        ORDER BY job_title
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByContractAlphAsc($contract)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.contract_id = $contract
        ORDER BY job_title
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionAndLocationAlphAsc($profession, $location)
    {
        $this->db->query("SELECT DATE_FORMAT(jobs.post_date, '%Y-%m-%d %H:%i') as post_date, jobs.id, jobs.profession_id, jobs.location_id, jobs.contract_id, jobs.company, jobs.job_title, jobs.description, jobs.salary, jobs.contact_user, jobs.contact_email, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.profession_id = $profession
        AND jobs.location_id = $location
        ORDER BY job_title
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionAndContractAlphAsc($profession, $contract)
    {
        $this->db->query("SELECT DATE_FORMAT(jobs.post_date, '%Y-%m-%d %H:%i') as post_date, jobs.id, jobs.profession_id, jobs.location_id, jobs.contract_id, jobs.company, jobs.job_title, jobs.description, jobs.salary, jobs.contact_user, jobs.contact_email, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.profession_id = $profession
        AND jobs.contract_id = $contract
        ORDER BY job_title
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByLocationAndContractAlphAsc($location, $contract)
    {
        $this->db->query("SELECT DATE_FORMAT(jobs.post_date, '%Y-%m-%d %H:%i') as post_date, jobs.id, jobs.profession_id, jobs.location_id, jobs.contract_id, jobs.company, jobs.job_title, jobs.description, jobs.salary, jobs.contact_user, jobs.contact_email, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id = $location
        AND jobs.contract_id = $contract
        ORDER BY job_title
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getByProfessionContractAndLocationAlphAsc($profession, $contract, $location)
    {
        $this->db->query("SELECT DATE_FORMAT(jobs.post_date, '%Y-%m-%d %H:%i') as post_date, jobs.id, jobs.profession_id, jobs.location_id, jobs.contract_id, jobs.company, jobs.job_title, jobs.description, jobs.salary, jobs.contact_user, jobs.contact_email, contract.name as cname, location.name as lname, profession.name as pname
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id
        AND jobs.profession_id = $profession
        AND jobs.location_id = $location
        AND jobs.contract_id = $contract
        ORDER BY job_title
        LIMIT " . $_SESSION['calcpage'] . ",$this->parPage");

        $results = $this->db->resultSet();

        return $results;
    }

    // --- Utils --- //

    public function getProfessionName($profession_id)
    {
        $this->db->query("SELECT * FROM profession WHERE id = :profession_id ");

        $this->db->bind(':profession_id', $profession_id);

        $row = $this->db->single();

        return $row;
    }

    public function getContractName($contract_id)
    {
        $this->db->query("SELECT * FROM contract WHERE id = :contract_id ");

        $this->db->bind(':contract_id', $contract_id);

        $row = $this->db->single();

        return $row;
    }

    public function getLocationName($location_id)
    {
        $this->db->query("SELECT * FROM location WHERE id = :location_id ");

        $this->db->bind(':location_id', $location_id);

        $row = $this->db->single();

        return $row;
    }

    public function getJob($id)
    {
        $this->db->query("SELECT jobs.*, contract.name as cname, location.name as lname, profession.name as pname 
        FROM jobs, contract, location, profession 
        WHERE jobs.profession_id = profession.id 
        AND jobs.location_id = location.id 
        AND jobs.contract_id = contract.id 
        AND jobs.id = :id");

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // Création de l'offre dans la BDD
    public function create($data)
    {
        // Insert Query
        $this->db->query("INSERT INTO jobs (profession_id, contract_id, location_id, job_title, company, description, salary, contact_user, contact_email) 
        VALUES (:profession_id, :contract_id, :location_id, :job_title, :company, :description, :salary, :contact_user, :contact_email)");

        // Relier les données
        $this->db->bind(':job_title',  $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':profession_id', $data['profession_id']);
        $this->db->bind(':contract_id', $data['contract_id']);
        $this->db->bind(':location_id', $data['location_id']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);

        //Execution
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Suppression d'une offre dans la BDD
    public function delete($id)
    {
        // Insert Query
        $this->db->query("DELETE FROM jobs WHERE id = $id");

        //Execution
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Modification de l'offre dans la BDD
    public function update($id, $data)
    {
        // Insert Query
        $this->db->query("UPDATE jobs SET job_title = :job_title, company = :company, profession_id = :profession_id, contract_id = :contract_id, location_id = :location_id, description = :description, salary = :salary, contact_user = :contact_user, contact_email = :contact_email, post_update =now() WHERE id = $id");

        // Relier les données
        $this->db->bind(':job_title',  $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':profession_id', $data['profession_id']);
        $this->db->bind(':contract_id', $data['contract_id']);
        $this->db->bind(':location_id', $data['location_id']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);

        //Execution
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

 
}
