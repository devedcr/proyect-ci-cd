import $ from "../../lib/jquery/jquery.js";
import { formatDate, formatDateEs } from "../date/date.js";
import { htmlTableItem } from "../html/main_html.js";
import { serviceCreateNote, serviceLoadNote, serviceRemoveNote, serviceSearchNote, serviceUpdateNote } from "./main_service.js";

export async function functionLoadNote() {
    let notes = await serviceLoadNote();
    notes.forEach((note) => {
        $("#table__body").append(htmlTableItem(note.id,note.name,formatDateEs(note.date_start) ,formatDateEs(note.date_end)));
    });
}

export async function functionCreateNote(note) {
    note.date_start = formatDate(new Date());
    note.date_end = formatDate(note.date_end);
    let noteCreated = await serviceCreateNote(note);
    $("#table__body").append(htmlTableItem(noteCreated.id,noteCreated.name,formatDateEs(note.date_start),formatDateEs(note.date_end)));
    $("#modal_create").css("display", "none");
}
export async function functionUpdateNote(note) {
    note.date_end = formatDate(note.date_end);
    $("#modal_edit").css("display", "none");
    return await serviceUpdateNote(note);
}

export async function functionRemoveNote(noteId) {
    await serviceRemoveNote(noteId);
    $(`#note_${noteId}`).remove();
}


export function functionSearcheNote(noteId) {
    return serviceSearchNote(noteId);
}