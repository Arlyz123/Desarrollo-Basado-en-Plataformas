document.addEventListener('DOMContentLoaded', () => {
    const completarTodo = document.querySelector('#completar-todo');
    const deselectTodo = document.querySelector('#deseleccionar-todo');
    const taskList = document.querySelector('#task-list');
    const taskInput = document.querySelector('#task-input');
    
    completarTodo.addEventListener('click', () => {
        const taskItems = taskList.querySelectorAll('li');

        taskItems.forEach((item) => {
            const checkbox = item.querySelector('input[type="checkbox"]');
            if (checkbox) {
                checkbox.checked = true;
            }
        });
    });

    deselectTodo.addEventListener('click', () => {
        const taskItems = taskList.querySelectorAll('li');

        taskItems.forEach((item) => {
            const checkbox = item.querySelector('input[type="checkbox"]');
            if (checkbox) {
                checkbox.checked = false;
            }
        });
    });


    document.querySelector('#new-task').addEventListener('submit', (event) => {
        event.preventDefault(); // evita el comportamientopredeterminado del form

        const taskValue = taskInput.value.trim();
        if (taskValue === "")   // si no hay nada escrito o esta vacio el recuadro
            return;     // no se agrega

        // elmento check
        const cb = document.createElement('input');
        cb.setAttribute('type', 'checkbox');
        
        // 
        const li = document.createElement('li');
        li.appendChild(cb);
        li.innerHTML += " " + taskValue;

        taskList.append(li);
  
        // delete button
        const deleteButton = document.createElement('button');
        deleteButton.innerText = '✘';
        deleteButton.classList.add('delete-button');
        deleteButton.addEventListener('click', () => {
            li.remove();
        });
        li.appendChild(deleteButton);

        

        taskInput.value = '';   // recarga y deja el recuadro vacio
        taskInput.focus();  // colocar el cursor en el recuadro del input
    });
});
