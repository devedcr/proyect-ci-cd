<?php

namespace App\Controller;

use App\Entity\Note;
use App\Service\NoteService;

class NoteController
{
    private $INoteService;

    public function __construct()
    {
        $this->INoteService = new NoteService();
    }

    public function index()
    {
        $notes = $this->INoteService->list();
        header("content-type:application/json; charset=utf8;");
        echo json_encode([
            "ok" => true,
            "data" => $notes
        ]);
    }

    public function save()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $note = $this->INoteService->save(new Note($data));
        header('content-type: application/json; charset=utf-8;');
        echo json_encode([
            "ok" => true,
            "data" => $note
        ]);
    }

    public function remove($noteId)
    {
        $this->INoteService->remove($noteId);
        header("content-type: application/json; charset=utf-8;");
        echo json_encode([
            "ok" => true
        ]);
    }

    public function update($noteId)
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $note = new Note($data);
        $note->id = $noteId;
        $this->INoteService->update($note);
        header("content-type:application/json; charset=utf8;");
        echo json_encode([
            "ok" => true,
        ]);
    }
}
