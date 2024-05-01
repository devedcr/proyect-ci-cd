import $ from "../../lib/jquery/jquery.js";
import { formatDate } from "../date/date.js";
import { htmlTableItem } from "../html/main_html.js";
import { serviceLoadNote } from "./main_service.js";

export function functionLoadNote() {
    let notes = serviceLoadNote();
    notes.forEach((note) => {
        $("#table__body").append(htmlTableItem(1,note.name,formatDate(note.date_created) ,formatDate(note.date_end)));
    });
}

export function functionCreateNote(note) {
    $("#table__body").append(htmlTableItem(1,note.name,formatDate(new Date()),formatDate(new Date(note.date_end))));
    $("#modal").css("display", "none");
}