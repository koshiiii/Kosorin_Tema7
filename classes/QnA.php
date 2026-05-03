<?php

namespace otazkyodpovede;

use db\Database;
use PDOException;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/Database.php';

class QnA extends Database
{
    private ?\PDO $connection;

    private array $fallbackData = [
        [
            'question' => 'Otazka 1',
            'answer' => 'Odpoved 1',
        ],
        [
            'question' => 'Otazka 2',
            'answer' => 'Odpoved 2',
        ],
        [
            'question' => 'Otazka 3',
            'answer' => 'Odpoved 3',
        ],
    ];

    public function __construct()
    {
        parent::__construct();
        $this->connection = $this->getConnection();
    }

    public function getQnAData(): array
    {
        if (!$this->connection) {
            return $this->fallbackData;
        }

        $queries = [
            'SELECT question, answer FROM qna ORDER BY id ASC',
            'SELECT otazka AS question, odpoved AS answer FROM qna ORDER BY id ASC',
        ];

        foreach ($queries as $sql) {
            try {
                $statement = $this->connection->prepare($sql);
                $statement->execute();
                $data = $statement->fetchAll();

                if (is_array($data) && !empty($data)) {
                    return $data;
                }
            } catch (PDOException $e) {
                error_log('QnA query zlyhala: ' . $e->getMessage());
            }
        }

        return $this->fallbackData;
    }
}
