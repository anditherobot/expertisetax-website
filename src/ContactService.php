<?php

class ContactService {
    private $db;
    private $jsonFile;

    public function __construct() {
        $this->jsonFile = __DIR__ . '/../contacts.json';
        $this->setupDatabase();
    }

    private function setupDatabase() {
        $dbDir = __DIR__ . '/../database';
        $dbFile = $dbDir . '/contacts.db';

        // Create database directory if it doesn't exist
        if (!file_exists($dbDir)) {
            if (!mkdir($dbDir, 0775, true)) {
                throw new Exception("Failed to create database directory: $dbDir");
            }
        }

        // Check if directory is writable
        if (!is_writable($dbDir)) {
            throw new Exception("Database directory is not writable: $dbDir");
        }

        // Create/connect to SQLite database
        $this->db = new PDO("sqlite:$dbFile");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if table exists, create it if not
        $result = $this->db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='contacts'");
        if ($result->fetch() === false) {
            $this->db->exec("CREATE TABLE contacts (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                email TEXT NOT NULL,
                phone TEXT,
                message TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )");
        }
    }

    public function saveContact($data) {
        if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
            throw new Exception('Please fill all required fields');
        }

        $contact = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? '',
            'message' => $data['message'],
            'timestamp' => date('Y-m-d H:i:s')
        ];

        // Save to JSON
        $jsonData = file_exists($this->jsonFile) ? json_decode(file_get_contents($this->jsonFile), true) : [];
        $jsonData[] = $contact;
        if (!file_put_contents($this->jsonFile, json_encode($jsonData, JSON_PRETTY_PRINT))) {
            throw new Exception("Failed to write to JSON file: $this->jsonFile");
        }

        // Save to SQLite
        $stmt = $this->db->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (:name, :email, :phone, :message)");
        $stmt->execute([
            ':name' => $contact['name'],
            ':email' => $contact['email'],
            ':phone' => $contact['phone'],
            ':message' => $contact['message']
        ]);

        return true;
    }
}