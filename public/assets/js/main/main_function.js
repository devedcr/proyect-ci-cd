import $ from "../../lib/jquery/jquery.js";
import { formatDate, formatDateEs } from "../date/date.js";
import { htmlTableItem } from "../html/main_html.js";
import { serviceCreateNote, serviceLoadNote, serviceRemoveNote, serviceSearchNote, serviceUpdateNote } from "./main_service.js";

export function functionLoadNote() {
    let notes = serviceLoadNote();
    notes.forEach((note) => {
        $("#table__body").append(htmlTableItem(note.id,note.name,formatDateEs(note.date_created) ,formatDateEs(note.date_end)));
    });
}

export function functionCreateNote(note) {
    note.date_created = formatDate(new Date());
    note.date_end = formatDate(note.date_end);
    let noteCreated = serviceCreateNote(note);
    $("#table__body").append(htmlTableItem(noteCreated.id,noteCreated.name,formatDateEs(note.date_created),formatDateEs(note.date_end)));
    $("#modal_create").css("display", "none");
}
export function functionUpdateNote(note) {
    note.date_end = formatDate(note.date_end);
    $("#modal_edit").css("display", "none");
    return serviceUpdateNote(note);
}

export function functionRemoveNote(noteId) {
    serviceRemoveNote(noteId);
    $(`#${noteId}`).remove();
}


export function functionSearcheNote(noteId) {
    return serviceSearchNote(noteId);
}