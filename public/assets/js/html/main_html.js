export function htmlTableItem(id,name,date_created,date_end) {
    return `
    <tr id="note_${id}" class="table_row text-center py-2 border-b" style="padding: 10px;">
        <td id="note_id_${id}" class="p-2">${id}</td>
        <td id="note_name_${id}" class="p-2">${name}</td>
        <td id="note_date_created_${id}" class="p-2 hidden sm:table-cell">${date_created}</td>
        <td id="note_date_end_${id}" class="p-2 hidden sm:table-cell">${date_end}</td>
        <td class="p-2">
        <button class="btn_remove border px-3 py-[2px] rounded shadow btn__trash">
            <ion-icon name="trash"></ion-icon>
        </button>
        <button class="btn_edit border px-3 py-[2px] rounded shadow btn__edit">
            <ion-icon name="create"></ion-icon>
        </button>
        </td>
    </tr>
    `;
}