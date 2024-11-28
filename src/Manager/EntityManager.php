<?php

namespace App\Manager;

use App\Repository\NewsRepository;
use App\Entity\News;
use App\ValueObject\Uid;

class EntityManager
{
    private NewsRepository $repository;

    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getById(string $id): ?News
    {
        return $this->repository->findById(new Uid($id));
    }

    public function create(News $news): void
    {
        $this->repository->save($news);
    }

    public function update(News $news): void
    {
        $this->repository->update($news);
    }

    public function delete(News $news): void
    {
        $this->repository->delete($news);
    }
}
