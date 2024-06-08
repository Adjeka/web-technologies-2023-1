import Auth from "../services/auth.js";
import location from "../services/location.js";
import loading from "../services/loading.js";
import Todos from "../services/todos.js";

const init = async () => {
    const { ok: isLogged } = await Auth.me()

    if (!isLogged) {
        return location.login()
    } else {
        loading.stop()
    }

    // Получение и отображение списка todos
    await renderTodos();

    // Обработчик формы добавления нового todo
    const todoForm = document.getElementById('todo-form');
    todoForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        const todoName = document.getElementById('todo-description').value;
        await Todos.add({ description: todoName });
        await renderTodos(); // Обновление списка
    });

    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', async (event) => {
            const id = event.target.getAttribute('data-id');
            const response = await Todos.delete(id);
            if (response.ok) {
                await renderTodos(); // Обновление списка
            }
        });
    });

    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', async (event) => {
            const id = event.target.getAttribute('data-id');
            const completed = event.target.checked;
            const response = await Todos.update(id, { completed: completed });
            if (!response.ok) {
                event.target.checked = !completed; // Откат изменения в случае ошибки
            }
            await renderTodos(); // Обновление списка
        });
    });
}

async function renderTodos() {
    var todos = await Todos.getAll();
    todos = todos.data;
    const todosDiv = document.querySelector('.todos');
    todosDiv.innerHTML = `<div class="todo-item">
                            <span class="id">Id</span>
                            <span>Сompleteness</span>
                            <span>Name</span>
                            <span>Action</span>
                        </div>`; 
    todos.forEach(todo => {
        const todoItem = document.createElement('div');
        todoItem.classList.add('todo-item');
        todoItem.innerHTML = `
            <span class="id">${todo.id}</span>
            <span><label>
                <input type="checkbox" ${todo.completed ? 'checked' : ''} data-id="${todo.id}">
                completed
            </label></span>
            <span>${todo.description}</span>
            <span><button class="delete-button" data-id="${todo.id}">Удалить</button></span>
        `;
        todosDiv.appendChild(todoItem);
    });
}

if (document.readyState === 'loading') {
    document.addEventListener("DOMContentLoaded", init)
} else {
    init()
}
