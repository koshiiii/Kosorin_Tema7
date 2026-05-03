<?php

namespace db;

use PDO;
use PDOException;

require dirname(__DIR__) . '/db/config.php';

class Database
{
    private ?PDO $conn = null;

    public function __construct()
    {
        $this->connect();
    }

    protected function connect(): void
    {
        if (!defined('DATABASE') || !is_array(DATABASE)) {
            trigger_error('DB konfiguracia DATABASE nie je definovana korektne.', E_USER_WARNING);
            return;
        }

        if (!extension_loaded('pdo_mysql')) {
            trigger_error('Rozsirenie pdo_mysql nie je aktivne.', E_USER_WARNING);
            return;
        }

        $config = DATABASE;
        if (!$this->isValidConfig($config)) {
            trigger_error('DB konfiguracii chybaju potrebne kluce.', E_USER_WARNING);
            return;
        }

        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;port=%s;charset=%s',
            $config['HOST'],
            $config['DBNAME'],
            $config['PORT'],
            $config['CHARSET']
        );

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            $this->conn = new PDO($dsn, $config['USER_NAME'], $config['PASSWORD'], $options);
        } catch (PDOException $e) {
            error_log('Chyba DB pripojenia: ' . $e->getMessage());
            $this->conn = null;
        }
    }

    private function isValidConfig(array $config): bool
    {
        $requiredKeys = ['HOST', 'DBNAME', 'PORT', 'USER_NAME', 'PASSWORD', 'CHARSET'];

        foreach ($requiredKeys as $key) {
            if (!array_key_exists($key, $config)) {
                return false;
            }
        }

        return true;
    }

    public function getConnection(): ?PDO
    {
        return $this->conn;
    }
}
