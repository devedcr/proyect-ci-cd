export function htmlTableItem(id,name,date_created,date_end) {
    return `
    <tr class="table_row text-center py-2 border-b" style="padding: 10px;">
        <td class="p-2">${id}</td>
        <td class="p-2">${name}</td>
        <td class="p-2 hidden sm:table-cell">${date_created}</td>
        <td class="p-2 hidden sm:table-cell">${date_end}</td>
        <td class="p-2">
        <button class="border px-3 py-[2px] rounded shadow btn__trash">
            <ion-icon name="trash"></ion-icon>
        </button>
        <button class="border px-3 py-[2px] rounded shadow btn__edit">
            <ion-icon name="create"></ion-icon>
        </button>
        </td>
    </tr>
    `;
}