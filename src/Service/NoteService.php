<?php

namespace App\Service;

use App\Entity\Note;
use App\Repository\INoteRepository;
use App\Repository\NoteRepository;

class NoteService implements INoteService{

    private INoteRepository $inoteRepository;

    public function __construct(){  
        $this->inoteRepository = new NoteRepository();
    }

    public function findById(int $id): Note{
        return $this->inoteRepository->findById($id);
    }

    public function save(Note $note): Note{
        return $this->inoteRepository->save($note);
    }
    public function remove(int $id): void{
        $this->inoteRepository->remove($id);
    }
    public function update(Note $note): Note{
        return $this->inoteRepository->update($note);
    }
    public function list(): array{
        return $this->inoteRepository->list();
    }
}