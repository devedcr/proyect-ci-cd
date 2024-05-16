<?php 
namespace App\Repository;

use App\Config\DB;
use App\Entity\Note;
use Error;
use PDO;
use Throwable;

class NoteRepository implements INoteRepository{
    private DB $db;
    public function __construct(){
        $this->db = (new DB());
    }
    public function findById(int $id) : Note{
        $connection = $this->db->getConnection();
        try {
            $stmt = $connection->prepare("select*from note where id=:id");
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $note = $stmt->fetch(PDO::FETCH_ASSOC);
            $dtoNote = new Note($note);
            return $dtoNote;
        } catch (Throwable $th) {
            throw new Error($th->getMessage());
        }finally{
            $stmt=null;
        }
    }
    public function save(Note $note):Note{
        $connection = $this->db->getConnection();
        try {
            $connection->beginTransaction();
            $stmt = $connection->prepare("insert into note(name,date_start,date_end) values(:name,:date_start,:date_end);");
            $stmt->bindParam(":name",$note->name);
            $stmt->bindParam(":date_start",$note->date_start);
            $stmt->bindParam(":date_end",$note->date_end);
            $stmt->execute();
            $connection->commit();
            $note->id=$connection->lastInsertId();
            return $note;
        } catch (Throwable $th) {
            $connection->rollBack();
            throw new Error($th->getMessage());
        }finally{
            $stmt = null;
        }
    }
    public function remove(int $id):void{
        $connection = $this->db->getConnection();
        try {
            $connection->beginTransaction();
            $stmt = $connection->prepare("delete from note where id=:id");
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $connection->commit();
        } catch (Throwable $th) {
            $connection->rollBack();
            throw new Error($th->getMessage());
        }finally{
            $stmt = null;
        }
    }

    public function update(Note $note):Note{
        $connection = $this->db->getConnection();
        try {
            $connection->beginTransaction();
            $stmt = $connection->prepare("update note set name=:name,date_end=:date_end where id=:id");
            $stmt->bindParam(":id",$note->id);
            $stmt->bindParam(":name",$note->name);
            $stmt->bindParam(":date_end",$note->date_end);
            $stmt->execute();
            $connection->commit();
            return $note;
        } catch (Throwable $th) {
            $connection->rollBack();
            throw new Error($th->getMessage());
        }finally{
            $stmt = null;
        }
    }
    public function list(): array{
        $connection = $this->db->getConnection();
        try {
            $stmt = $connection->prepare("select*from note");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Throwable $th) {
            throw new Error($th->getMessage());
        }finally{
            $stmt = null;
        }
    }
}