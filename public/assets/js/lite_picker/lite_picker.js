import litepicker from "../../lib/litepicker/litepicker.js";

export function initDate(element){
    let datePicker = document.querySelector(element);
    new litepicker.Litepicker({
        element: datePicker,
        format: 'DD MMMM YYYY',
    });
}