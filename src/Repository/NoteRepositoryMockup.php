<?php 
namespace App\Repository;

use App\Entity\Note;

class NoteRepositoryMockup implements INoteRepository{
    /** 
     * @data Note[] 
     */
    public $data = [];

    public function findById(int $id) : Note{
        foreach ($this->data as $note) {
            if($note->id == $id){
                return $note;
            }
        }
        $newNote = new Note([
            "id"=> -1,
            "name"=> "",
            "date_start"=>"",
            "date_end"=> "",
        ]);
        return $newNote;
    }

    public function save(Note $note):Note{
        $this->data[] = $note;
        return $this->data[count($this->data)-1];
    }

    public function remove(int $id):void{
        foreach ($this->data as $key => $note) {
            if($note->id == $id){
                unset($this->data[$key]);
                break;
            }
        }
    }
    public function update(Note $note):Note{
        foreach ($this->data as  $key => $item) {
            if($item->id == $note->id){
                $this->data[$key] = $note;
                return $this->data[$key];
            }
        }
        return null;
    }
    public function list(): array{
        return $this->data;
    }
}