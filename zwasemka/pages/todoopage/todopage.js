
// ------------------------------------------------------
// ЭЛЕМЕНТЫ HTML
// ------------------------------------------------------
const todolist = document.querySelector('.todolist');
const paginationBox = document.querySelector('.pagination');
const input = document.getElementById("todofield");
const addBtn = document.getElementById("todobutton");


// ------------------------------------------------------
// ФУНКЦИЯ ЗАГРУЗКИ ЗАДАЧ С СЕРВЕРА
// ------------------------------------------------------
function loadTasks(page = 1) {
    fetch(`todoAPI.php?page=${page}`)
        .then(res => res.json())
        .then(data => {
            renderTasks(data.tasks);
            renderPagination(data.page, data.totalPages);
        })
        .catch(err => console.error("Ошибка загрузки:", err));
}



// ------------------------------------------------------
// ОТРИСОВКА СПИСКА ЗАДАЧ
// ------------------------------------------------------
function renderTasks(tasks) {
    todolist.innerHTML = "";

    if (tasks.length === 0) {
        todolist.innerHTML = "<p>No tasks yet 👀</p>";
        return;
    }

    tasks.forEach((task, index) => {
        const li = document.createElement("li");

        // текст задачи
        const textSpan = document.createElement("span");
        textSpan.textContent = task.text;

        // кнопка удаления
        const delBtn = document.createElement("button");
        delBtn.textContent = "🗑️";
        delBtn.classList.add("delete-btn");

        // удаление задачи
        delBtn.addEventListener("click", () => {
            fetch("todoAction.php", {
                method: "POST",
                body: new URLSearchParams({
                    action: "delete",
                    index: index
                })
            }).then(() => loadTasks());
        });

        // редактирование задачи по двойному клику
        textSpan.addEventListener("dblclick", () => {
            const newText = prompt("Edit task:", task.text);
            if (!newText || newText.trim() === "") return;

            fetch("todoAction.php", {
                method: "POST",
                body: new URLSearchParams({
                    action: "update",
                    index: index,
                    text: newText.trim()
                })
            }).then(() => loadTasks());
        });

        li.appendChild(textSpan);
        li.appendChild(delBtn);
        todolist.appendChild(li);
    });
}



// ------------------------------------------------------
// ОТРИСОВКА ПАГИНАЦИИ
// ------------------------------------------------------
function renderPagination(currentPage, totalPages) {
    paginationBox.innerHTML = "";

    // Prev
    if (currentPage > 1) {
        const prev = document.createElement("button");
        prev.textContent = "Prev";
        prev.dataset.page = currentPage - 1;
        paginationBox.appendChild(prev);
    }

    // Номера страниц
    for (let i = 1; i <= totalPages; i++) {
        const btn = document.createElement("button");
        btn.textContent = i;
        btn.dataset.page = i;

        if (i === currentPage) btn.classList.add("active");

        paginationBox.appendChild(btn);
    }

    // Next
    if (currentPage < totalPages) {
        const next = document.createElement("button");
        next.textContent = "Next";
        next.dataset.page = currentPage + 1;
        paginationBox.appendChild(next);
    }
}



// ------------------------------------------------------
// КЛИКИ ПО КНОПКАМ ПАГИНАЦИИ
// ------------------------------------------------------
paginationBox.addEventListener("click", (event) => {
    if (event.target.tagName.toLowerCase() === "button") {
        const page = event.target.dataset.page;
        loadTasks(page);
    }
});



// ------------------------------------------------------
// ДОБАВЛЕНИЕ НОВОЙ ЗАДАЧИ
// ------------------------------------------------------
addBtn.addEventListener("click", () => {
    const text = input.value.trim();
    if (!text) return;

    fetch("todoAction.php", {
        method: "POST",
        body: new URLSearchParams({
            action: "add",
            text: text
        })
    }).then(() => {
        input.value = "";
        loadTasks();
    });
});



// ------------------------------------------------------
// ЗАГРУЖАЕМ ПЕРВУЮ СТРАНИЦУ ПРИ ОТКРЫТИИ
// ------------------------------------------------------
loadTasks();
