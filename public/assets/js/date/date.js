import moment from '../../lib/moment/moment.js';


export function formatDate(date) {
    return moment(date).format("DD/MM/YYYY");
}

export function formatDateEs(date) {
    return moment(date,"DD/MM/YYYY").format("DD [of] MMMM YYYY");
}

export function formatDateEn(date) {
    return moment(date,"DD/MM/YYYY").format("MM/DD/YYYY");
}