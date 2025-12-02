const todolist = document.querySelector('.todolist');
const paginationBox = document.querySelector('.pagination');
const input = document.getElementById("todofield");
const addBtn = document.getElementById("todobutton");

let currentPage = 1;

// ----------------------------
// Загрузка задач
// ----------------------------
function loadTasks(page = 1) {
    fetch(`todoAPI.php?page=${page}`)
        .then(r => r.json())
        .then(data => {
            currentPage = data.page;
            renderTasks(data.tasks);
            renderPagination(data.page, data.totalPages);
        });
}


// ----------------------------
// Отрисовка задач
// ----------------------------
function renderTasks(tasks) {
    todolist.innerHTML = "";

    if (tasks.length === 0) {
        todolist.innerHTML = "<p>No tasks</p>";
        return;
    }

    tasks.forEach(task => {
        const li = document.createElement("li");

        const textSpan = document.createElement("span");
        textSpan.textContent = task.text;

        // edit
        textSpan.addEventListener("dblclick", () => {
            const newText = prompt("Edit:", task.text);
            if (!newText) return;

            fetch("todoAction.php", {
                method: "POST",
                body: new URLSearchParams({
                    action: "update",
                    index: task.realIndex,
                    text: newText
                })
            }).then(() => loadTasks(currentPage));
        });

        const delBtn = document.createElement("button");
        delBtn.textContent = "🗑️";

        delBtn.addEventListener("click", () => {
            fetch("todoAction.php", {
                method: "POST",
                body: new URLSearchParams({
                    action: "delete",
                    index: task.realIndex
                })
            }).then(() => loadTasks(currentPage));
        });

        li.appendChild(textSpan);
        li.appendChild(delBtn);
        todolist.appendChild(li);
    });
}


// ----------------------------
// Пагинация
// ----------------------------
function renderPagination(page, total) {
    paginationBox.innerHTML = "";

    if (page > 1) {
        const prev = document.createElement("button");
        prev.textContent = "Prev";
        prev.dataset.page = page - 1;
        paginationBox.appendChild(prev);
    }

    for (let i = 1; i <= total; i++) {
        const btn = document.createElement("button");
        btn.textContent = i;
        btn.dataset.page = i;
        if (i === page) btn.classList.add("active");
        paginationBox.appendChild(btn);
    }

    if (page < total) {
        const next = document.createElement("button");
        next.textContent = "Next";
        next.dataset.page = page + 1;
        paginationBox.appendChild(next);
    }
}

paginationBox.addEventListener("click", (e) => {
    if (e.target.tagName !== "BUTTON") return;
    loadTasks(e.target.dataset.page);
});


// ----------------------------
// Добавление
// ----------------------------
addBtn.addEventListener("click", () => {
    const text = input.value.trim();
    if (!text) return;

    fetch("todoAction.php", {
        method: "POST",
        body: new URLSearchParams({
            action: "add",
            text
        })
    }).then(() => {
        input.value = "";
        loadTasks(1); // после добавления возвращаемся на первую страницу
    });
});

// первая загрузка
loadTasks();
