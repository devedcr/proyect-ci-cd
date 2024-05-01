import $ from "../../lib/jquery/jquery.js";
import { initDate } from "../lite_picker/lite_picker.js";
import { getParentElement } from "../util/util.js";
import { functionCreateNote, functionLoadNote, functionRemoveNote } from "./main_function.js";

$(document).ready(function () {
    initDate("#date_end");
    functionLoadNote();
});

$(document).on("click", ".btn_remove", function (e) {
    let tr = getParentElement(e.target,"TR");
    functionRemoveNote(tr.getAttribute("id"));
});

$(document).on("click", "#btn_create", function (e) {
    $("#modal").css("display", "flex");
});

$(document).on("click", "#icon__close", function (e) {
    $("#modal").css("display", "none");
});

$(document).on("submit", "#modal__form__create", function (e) {
    e.preventDefault();
    let noteInput = Object.fromEntries(new FormData(e.target));
    functionCreateNote(noteInput);
    e.target.reset();
});

