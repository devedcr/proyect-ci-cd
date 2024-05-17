<?php

namespace App\Test;

use App\Entity\Note;
use App\Repository\NoteRepositoryMockup;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{

    public function test_case_create_note()
    {
        $repository = new NoteRepositoryMockup();
        $note = new Note([
            "name" => "test_name",
            "date_start" => "2020/02/01",
            "date_end" => "2020/03/01"
        ]);
        $note->id = 1;
        $noteSave = $repository->save($note);
        $this->assertEquals($noteSave->id, $note->id);
        $this->assertEquals($noteSave->name, $note->name);
        $this->assertEquals($noteSave->date_start, $note->date_start);
        $this->assertEquals($noteSave->date_end, $note->date_end);
    }
    public function test_case_update_note()
    {
        $repository = new NoteRepositoryMockup();
        $note = new Note([
            "name" => "test_name",
            "date_start" => "2020/02/01",
            "date_end" => "2020/03/01"
        ]);
        $note->id = 1;
        $repository->save($note);
        $note_update_data = new Note([
            "name" => "test_name_update",
            "date_start" => "2020/02/01",
            "date_end" => "2020/03/01"
        ]);
        $note_update_data->id = 1;
        $note_updated = $repository->update($note_update_data);
        $this->assertEquals($note_update_data->name, $note_updated->name);
        $this->assertEquals($note_update_data->date_start, $note_updated->date_start);
        $this->assertEquals($note_update_data->date_end, $note_updated->date_end);
    }
    public function test_case_remove_note()
    {
        $repository = new NoteRepositoryMockup();
        $note = new Note([
            "name" => "test_name",
            "date_start" => "2020/02/01",
            "date_end" => "2020/03/01"
        ]);
        $note->id = 1;
        $repository->save($note);
        $repository->remove($note->id);
        $result = $repository->findById($note->id);
        $this->assertNotEquals($note->id , $result->id);
    }
    public function test_case_list_note()
    {
        $repository = new NoteRepositoryMockup();
        $note = new Note([
            "name" => "test_name",
            "date_start" => "2020/02/01",
            "date_end" => "2020/03/01"
        ]);
        $note->id = 1;
        $repository->save($note);
        $note2 = new Note([
            "name" => "test_name2",
            "date_start" => "2020/02/02",
            "date_end" => "2020/03/02"
        ]);
        $note->id = 2;
        $repository->save($note2);
        $this->assertEquals(2,count($repository->list()));
    }
}
