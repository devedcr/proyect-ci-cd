<?php 
namespace App\Entity;

class Note{
    public $id;
    public $name;
    public $date_start;
    public $date_end;
    public function __construct(array $note){
        $this->name = $note["name"];
        $this->date_start = $note["date_start"];
        $this->date_end = $note["date_end"];
    }
}