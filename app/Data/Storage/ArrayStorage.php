<?php

namespace App\Data\Storage;

use App\Core\Exceptions\DataNotFoundException;
use App\Core\Exceptions\StorageNotFoundException;
use App\Domain\Storage\StorageInterface;

class ArrayStorage implements StorageInterface
{
    private array $data = [];

    public function findAll(string $entityName): array
    {
        $storagePath = dirname(__DIR__, 3) . "/storage/$entityName.php";
        if (!is_file($storagePath)) {
            throw new StorageNotFoundException("$entityName not found!");
        }
        $this->data[$entityName] = include($storagePath);

        return $this->data[$entityName];
    }

    public function create(string $entityName, array $data)
    {
        $this->data[$entityName][] = $data;
    }

    public function update(string $entityName, array $data, int $id)
    {
        $this->data[$entityName][$id] = $data;
    }

    public function delete(string $entityName, int $id)
    {
        if (!isset($this->data[$entityName][$id])) {
            throw new DataNotFoundException("Element $id not found");
        }
        unset($this->data[$entityName][$id]);
    }
}