<?php

namespace App\Entity;

use DateTimeImmutable;
use InvalidArgumentException;

class News
{
    private string $id;
    private string $content;
    private DateTimeImmutable $createdAt;

    public function __construct(string $id, string $content, DateTimeImmutable $createdAt)
    {
        $this->setId($id);
        $this->setContent($content);
        $this->setCreatedAt($createdAt);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        if (empty($id) || !preg_match('/^[a-zA-Z0-9\-]{36}$/', $id)) {
            throw new InvalidArgumentException("L'identifiant fourni est invalide.");
        }
        $this->id = $id;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        if (empty(trim($content))) {
            throw new InvalidArgumentException("Le contenu ne peut pas être vide.");
        }
        $this->content = $content;
        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}
