<?php 
namespace App\Repository;

use App\Entity\Note;

interface INoteRepository{
    public function findById(int $id) : Note;
    public function save(Note $note):Note;
    public function remove(int $id):void;
    public function update(Note $note):Note;
    public function list(): array;
}