<?php
namespace App\Service;
use App\Entity\Note;

interface INoteService
{
    public function findById(int $id): Note;
    public function save(Note $note): Note;
    public function remove(int $id): void;
    public function update(Note $note): Note;
    public function list(): array;
}
