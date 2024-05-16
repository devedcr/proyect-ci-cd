import moment from '../../lib/moment/moment.js';


export function formatDate(date) {
    return moment(date).format("YYYY/MM/DD");
}

export function formatDateEs(date) {
    return moment(date,"YYYY/MM/DD").format("DD [of] MMMM YYYY");
}

export function formatDateEn(date) {
    return moment(date,"YYYY/MM/DD").format("MM/DD/YYYY");
}