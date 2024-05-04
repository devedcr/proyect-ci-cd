import $ from "../../lib/jquery/jquery.js";
import { formatDateEn } from "../date/date.js";
import { initDate } from "../lite_picker/lite_picker.js";
import { getParentElement } from "../util/util.js";
import { functionCreateNote, functionLoadNote, functionRemoveNote, functionSearcheNote, functionUpdateNote } from "./main_function.js";

let input_edit_date;

$(document).ready(function () {
    initDate("#input_create_date_end");
    input_edit_date = initDate("#input_edit_date_end");
    functionLoadNote();
});

$(document).on("click", ".btn_remove", function (e) {
    let tr = getParentElement(e.target, "TR");
    functionRemoveNote(tr.getAttribute("id"));
});

$(document).on("click", ".btn_edit", function (e) {
    let tr = getParentElement(e.target, "TR");
    let noteId = tr.getAttribute("id").split("_")[1];
    let note = functionSearcheNote(noteId);
    $("#modal_edit").css("display", "flex");
    $("#id_note").val(noteId);
    $("#input_edit_name").val(note.name);
    input_edit_date.setDate(formatDateEn(note.date_end));
});

$(document).on("click", "#icon_edit_close", function (e) {
    $("#modal_edit").css("display", "none");
});

$(document).on("click", "#btn_create", function (e) {
    $("#modal_create").css("display", "flex");
});

$(document).on("click", "#icon_create_close", function (e) {
    $("#modal_create").css("display", "none");
});

$(document).on("submit", "#modal__form__create", function (e) {
    e.preventDefault();
    let noteInput = Object.fromEntries(new FormData(e.target));
    functionCreateNote(noteInput);
    e.target.reset();
});

$(document).on("submit", "#modal__form__edit", function (e) {
    e.preventDefault();
    let noteInput = Object.fromEntries(new FormData(e.target));
    let noteUpdate = functionUpdateNote(noteInput);
    $(`#note_name_${noteInput.id}`).text(noteUpdate.name);;
    $(`#note_date_created_${noteInput.id}`).text(noteUpdate.date_created);
    $(`#note_date_end_${noteInput.id}`).text(noteUpdate.date_end);
    e.target.reset();
});
