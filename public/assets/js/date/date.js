import moment from '../../lib/moment/moment.js';

export function formatDate(date) {
    return moment(date,"DD/MM/YYYY'").format("DD [of] MMMM YYYY");
}