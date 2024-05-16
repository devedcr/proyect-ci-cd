import { api } from "../../../constant/api.js";

let notes = [];

export async function serviceLoadNote() {
    try {
        let response = await fetch(`${api.url}/note/list`).then((res) => res.json());
        notes = response.data;
        return notes;
    } catch (error) {
        return [];
    }
}

export async function serviceCreateNote(note) {
    try {
        let response = await fetch(`${api.url}/note/save`,{
            method:"POST",
            headers:{
              'Content-Type': 'application/json'
            },
            body:JSON.stringify(note)
        }).then((res) => res.json());
        notes = response.data;
        return notes;
    } catch (error) {
        return notes;
    }
}
export async function serviceUpdateNote(note) {
    let noteUpdate = notes.find((n) => n.id == note.id);
    noteUpdate.name = note.name;
    noteUpdate.date_end = note.date_end;
    try {
        await fetch(`${api.url}/note/update/${note.id}`,{
            method:"PUT",
            headers:{
                'Content-Type': 'application/json'
            },
            body:JSON.stringify(noteUpdate)
        }).then((res) => res.json());
        return noteUpdate;
    } catch (error) {
        return null;
    }
}

export async function serviceRemoveNote(noteId) {
    try {
        await fetch(`${api.url}/note/remove/${noteId}`,{
            method:"DELETE",
        }).then((res) => res.json());
        notes = notes.filter((note) => note.id != noteId);
        return notes;
    } catch (error) {
        return notes;
    }
}

export function serviceSearchNote(noteId) {
    return notes.find((note) => note.id == noteId);
}