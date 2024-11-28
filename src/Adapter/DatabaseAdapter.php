<?php

namespace App\Adapter;

use PDO;
use RuntimeException;

class DatabaseAdapter
{
    private PDO $pdo;

    public function __construct(array $config)
    {
        try {
            $this->pdo = new PDO(
                $config['dsn'],           // DSN
                $config['username'],      // Nom d'utilisateur
                $config['password'],      // Mot de passe
                $config['options']        // Options PDO
            );
        } catch (\PDOException $e) {
            throw new RuntimeException('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}
