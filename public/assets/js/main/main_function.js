import $ from "../../lib/jquery/jquery.js";
import { formatDate } from "../date/date.js";
import { htmlTableItem } from "../html/main_html.js";
import { serviceCreateNote, serviceLoadNote, serviceRemoveNote } from "./main_service.js";

export function functionLoadNote() {
    let notes = serviceLoadNote();
    notes.forEach((note) => {
        $("#table__body").append(htmlTableItem(note.id,note.name,formatDate(note.date_created) ,formatDate(note.date_end)));
    });
}

export function functionCreateNote(note) {
    let noteCreated = serviceCreateNote(note);
    $("#table__body").append(htmlTableItem(noteCreated.id,noteCreated.name,formatDate(new Date()),formatDate(new Date(noteCreated.date_end))));
    $("#modal").css("display", "none");
}

export function functionRemoveNote(noteId) {
    serviceRemoveNote(noteId);
    $(`#${noteId}`).remove();
}