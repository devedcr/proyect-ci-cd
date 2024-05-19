<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/index.css">
  <script>
      window.API_URL = "<?=$_ENV['API_URL']?>";
  </script>
  <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Notes App</title>
</head>

<body>
  <div id="modal_create" class="modal">
    <div id="modal__content">
      <div class="flex justify-between">
        <h1>Create Note</h1>
        <div id="icon_create_close" class="cursor-pointer">
          <ion-icon name="close-outline"></ion-icon>
        </div>
      </div>
      <div>
        <form id="modal__form__create">
          <div class="mt-5">
            <label for="name"><small>name</small></label>
            <input class="w-full" autocomplete="off" type="text" name="name" id="input_create_name">
          </div>
          <div class="mt-5">
            <label for="name"><small>date end</small></label>
            <input readonly class="w-full" type="text" name="date_end" id="input_create_date_end">
          </div>
          <div class="mt-8">
            <button type="submit" class="px-3 py-[2px] rounded shadow w-full btn__form">save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="modal_edit" class="modal">
    <div id="modal__content">
      <div class="flex justify-between">
        <h1>Edit Note</h1>
        <div id="icon_edit_close" class="cursor-pointer">
          <ion-icon name="close-outline"></ion-icon>
        </div>
      </div>
      <div>
        <form id="modal__form__edit">
          <input type="hidden" name="id" id="id_note" value="">
          <div class="mt-5">
            <label for="name"><small>name</small></label>
            <input class="w-full" autocomplete="off" type="text" name="name" id="input_edit_name">
          </div>
          <div class="mt-5">
            <label for="date_end"><small>date end</small></label>
            <input readonly class="w-full" type="text" name="date_end" id="input_edit_date_end">
          </div>
          <div class="mt-8">
            <button type="submit" class="px-3 py-[2px] rounded shadow w-full btn__form">update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <main class="container mt-2 p-2 mx-auto">
    <header>
      <h1 class="text-kavoon text-4xl flex items-center gap-2">
        <ion-icon name="book"></ion-icon>
        Notes App
      </h1>
    </header>
    <section>
      <div class="my-2">
        <button id="btn_create" class="border px-3 py-[2px] rounded shadow btn__edit">
          <ion-icon name="add-circle"></ion-icon>
        </button>
      </div>
      <div>
        <!--
            <div class="flex justify-center items-center py-5 shadow">
              <div>
                <div class="text-center">
                  <ion-icon class="icon__empty" name="cube"></ion-icon>
                </div>
                <h2>Empty list</h2>
              </div>
            </div>
          -->
        <div class="border rounded pt-2 shadow-md overflow-hidden">
          <table class="table w-full text-start text-sm lowercase">
            <thead class="table__thead">
              <tr class="text-center border-b">
                <th class="p-1">id</th>
                <th class="p-1">name</th>
                <th class="p-1 hidden sm:table-cell">date created</th>
                <th class="p-1 hidden sm:table-cell ">date end</th>
                <th class="p-1">action</th>
              </tr>
            </thead>
            <tbody id="table__body" class="table__tbody">
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>

  <footer class="text-center">
    <span>
      &copy; NoteApp 2024
    </span>
  </footer>

  <script type="module" src="assets/js/main/main_event.js" ></script>  
</body>
</html>