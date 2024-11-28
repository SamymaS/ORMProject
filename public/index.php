<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Adapter\DatabaseAdapter;
use App\Entity\News;
use App\Manager\EntityManager;
use App\Repository\NewsRepository;
use App\ValueObject\Uid;

$config = require_once __DIR__ . '/../config/config.php';
$adapter = new DatabaseAdapter($config);
$repository = new NewsRepository($adapter);
$entityManager = new EntityManager($repository);

// Exemple de manipulation
$news = $entityManager->getById('1a2b3c4d-1234-5678-9101-abcdef123456');
if ($news) {
    echo "ID : {$news->getId()}\n";
    echo "Content : {$news->getContent()}\n";
    echo "Created At : {$news->getCreatedAt()->format('Y-m-d H:i:s')}\n";
}
