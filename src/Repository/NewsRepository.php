<?php

namespace App\Repository;

use App\Adapter\DatabaseAdapter;
use App\Entity\News;
use App\ValueObject\Uid;
use DateTimeImmutable;

class NewsRepository
{
    private \PDO $pdo;

    public function __construct(DatabaseAdapter $adapter)
    {
        $this->pdo = $adapter->getPdo();
    }

    public function findById(Uid $id): ?News
    {
        $stmt = $this->pdo->prepare("SELECT * FROM News WHERE id = :id");
        $stmt->execute(['id' => $id->getValue()]);
        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return $this->mapRowToNews($row);
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM News");
        $rows = $stmt->fetchAll();

        return array_map([$this, 'mapRowToNews'], $rows);
    }

    private function mapRowToNews(array $row): News
    {
        return new News(
            $row['id'],
            $row['content'],
            new DateTimeImmutable($row['created_at'])
        );
    }

    public function save(News $news): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO News (id, content, created_at) VALUES (:id, :content, :created_at)");
        $stmt->execute([
            'id' => $news->getId(),
            'content' => $news->getContent(),
            'created_at' => $news->getCreatedAt()->format('Y-m-d H:i:s'),
        ]);
    }

    public function update(News $news): void
    {
        $stmt = $this->pdo->prepare("UPDATE News SET content = :content WHERE id = :id");
        $stmt->execute([
            'id' => $news->getId(),
            'content' => $news->getContent(),
        ]);
    }

    public function delete(News $news): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM News WHERE id = :id");
        $stmt->execute(['id' => $news->getId()]);
    }
}
