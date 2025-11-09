const todofield = document.querySelector('.todofield')
const buttoncreate = document.querySelector('button')
const todolist = document.querySelector('.todolist')

function emptyList() {
    const tasks = document.querySelectorAll('.todolist li')
    const emptymessage = document.querySelector('.empty-message')

    if (tasks.length === 0 && !emptymessage) {
        const p = document.createElement('p')
        p.classList.add('empty-message')
        p.textContent = 'No tasks yet 👀'
        todolist.parentElement.appendChild(p)
    } else if (tasks.length > 0 && emptymessage) {
        emptymessage.remove()
    }
}

buttoncreate.addEventListener('click', () => {
    const taskText = todofield.value.trim()
    if (taskText === '') return

    const li = document.createElement('li')
    const taskcheckbox = document.createElement('input')
    const labelfortask = document.createElement('label')
    const deletetask = document.createElement('button')

    taskcheckbox.type = 'checkbox'
    deletetask.textContent = '🗑️'
    labelfortask.textContent = taskText

    li.appendChild(taskcheckbox)
    li.appendChild(labelfortask)
    li.appendChild(deletetask)
    todolist.appendChild(li)
    todofield.value = ''

    deletetask.addEventListener('click', () => {
        li.remove()
        emptyList()
    })

    labelfortask.addEventListener('dblclick', () => {
        const newinput = document.createElement('input')
        newinput.type = 'text'
        newinput.classList.add('edit-input')
        newinput.value = labelfortask.textContent.trim()

        li.replaceChild(newinput, labelfortask)
        newinput.focus()

        function saveEdit() {
            const newtext = newinput.value.trim()
            if (newtext !== '') {
                labelfortask.textContent = newtext
                li.replaceChild(labelfortask, newinput)
            } else {
                newinput.focus()
            }
        }

        function cancelEdit() {
            li.replaceChild(labelfortask, newinput)
        }

        newinput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                saveEdit()
            } else if (e.key === 'Escape') {
                cancelEdit()
            }
        })

        newinput.addEventListener('blur', saveEdit)
    })

    emptyList()
})


emptyList()
