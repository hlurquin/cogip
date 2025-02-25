<?php

namespace App\Repositories;

use App\Core\Database;
use App\Models\Contacts;
use PDO;

class ContactsRepository
{
    private $database;

    public function __construct()
    {
        $this->database = Database::getInstance()->getConnection();
    }

    public function create(Contacts $contactsData)
    {
        $query = "USE cogip";
        $stmt = $this->database->prepare($query);
        $stmt->execute();
        // Prepare the SQL query
        $query = "INSERT INTO contacts (name, company_id, email, phone, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepare the statement
        $stmt = $this->database->prepare($query);

        // Bind the parameters
        $stmt->bindValue(1, $contactsData->getName());
        $stmt->bindValue(2, $contactsData->getCompanyId());
        $stmt->bindValue(3, $contactsData->getEmail());
        $stmt->bindValue(4, $contactsData->getPhone());
        $stmt->bindValue(5, $contactsData->getCreatedat());
        $stmt->bindValue(6, $contactsData->getUpdatedat());

        // Execute the statement
        $stmt->execute();

        // Set the json response
        $json_encode = json_encode(['message' => 'Contact successfully created!'], true);

        return $json_encode;
    }

    public function update(Contacts $contactsData): string
    {
        $query = "USE cogip";
        $stmt = $this->database->prepare($query);
        $stmt->execute();
        // Prepare the query
        $query = "UPDATE contacts SET name = :name, company_id = :company_id, email = :email, phone = :phone, created_at = :created_at, updated_at = :created_at WHERE id = :id";

        // Prepare the statement
        $stmt = $this->database->prepare($query);

        // // Bind the parameters
        $stmt->bindValue(':id', $contactsData->getId());
        $stmt->bindValue(':name', $contactsData->getName());
        $stmt->bindValue(':company_id', $contactsData->getCompanyId());
        $stmt->bindValue(':email', $contactsData->getEmail());
        $stmt->bindValue(':phone', $contactsData->getPhone());
        $stmt->bindValue(':created_at', $contactsData->getCreatedAt());
        $stmt->bindValue(':updated_at', $contactsData->getUpdatedAt());

        // Execute the statement
        $stmt->execute();

        // Set the json response
        $json_encode = json_encode(['message' => 'Contact successfully updated!'], true);

        return $json_encode;
    }

    public function delete(Contacts $contactsData): string
    {
        $query = "USE cogip";
        $stmt = $this->database->prepare($query);
        $stmt->execute();
        // Prepare the query
        $query = "DELETE FROM contacts WHERE id = :id";

        // Prepare the statement
        $stmt = $this->database->prepare($query);

        // Bind the parameters
        $stmt->bindValue(':id', $contactsData->getId());

        // Execute the statement
        $stmt->execute();

        // Set the json response
        $json_response = json_encode(['message' => 'Contact successfully deleted!'], JSON_THROW_ON_ERROR);

        header('Content-Type: application/json');
        return $json_response;
    }

    public function getAllContacts()
    {
        $query = "USE cogip";
        $stmt = $this->database->prepare($query);
        $stmt->execute();
        // Prepare the query
        $query = "SELECT * FROM contacts";

        // Prepare the statement
        $stmt = $this->database->prepare($query);

        // Execute the query
        $stmt->execute();


        $contactsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Set the json response
        $json = json_encode($contactsData, JSON_PRETTY_PRINT);

        header('Content-type: application/json');
        return $json;
    }

    public function getContactsById(Contacts $contactsData)
    {
        $query = "USE cogip";
        $stmt = $this->database->prepare($query);
        $stmt->execute();
        // Prepare the query
        $query = "SELECT * FROM contacts WHERE id = :id";

        // Prepare the statement
        $stmt = $this->database->prepare($query);

        // Execute the query
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set the json response
        $json_response = json_encode($result, JSON_PRETTY_PRINT);

        header('Content-type: application/json');
        echo $json_response;
    }
}