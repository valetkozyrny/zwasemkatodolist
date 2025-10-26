const todofield = document.querySelector('.todofield')
const buttoncreate = document.querySelector('button')
const todolist = document.querySelector('.todolist')
buttoncreate.addEventListener('click', () => {
    const taskText = todofield.value
    const taskcheckbox = document.createElement('input')
    const li = document.createElement('li')
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
    })

})

