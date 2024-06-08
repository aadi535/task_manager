// task_manager/js/scripts.js
document.addEventListener('DOMContentLoaded', function() {
    loadTasks();

    document.getElementById('taskForm').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch('php/tasks.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            loadTasks();
            this.reset();
        });
    });

    // Toggle dark mode
    const darkModeToggle = document.querySelector('#darkModeToggle');
    darkModeToggle.addEventListener('change', () => {
        document.body.classList.toggle('dark-mode');
    });

    // Fetch quotes
    fetchQuotes();
    setInterval(fetchQuotes, 10000); // Fetch new quote every 10 seconds

// Logout functionality
document.getElementById('logoutButton').addEventListener('click', function() {
    fetch('php/logout.php', {
        method: 'POST'
    })
    .then(response => response.text())
    .then(data => {
        window.location.href = 'login.php'; // Redirect to login page
    });
});


});

function loadTasks() {
    fetch('php/get_tasks.php')
    .then(response => response.json())
    .then(data => {
        let taskList = document.getElementById('taskList');
        taskList.innerHTML = '';
        data.forEach(task => {
            let li = document.createElement('li');
            let title = document.createElement('span');
            title.textContent = task.title;
            let description = document.createElement('span');
            description.textContent = task.description;
            let timestamp = document.createElement('span');
            timestamp.textContent = task.timestamp;
            let delButton = document.createElement('button');
            delButton.textContent = 'Delete';
            delButton.addEventListener('click', () => deleteTask(task.id));
            li.appendChild(title);
            li.appendChild(description);
            li.appendChild(timestamp);
            li.appendChild(delButton);
            taskList.appendChild(li);
        });
    });
}

function deleteTask(id) {
    let formData = new FormData();
    formData.append('action', 'delete');
    formData.append('task_id', id);

    fetch('php/tasks.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => loadTasks());
}

function fetchQuotes() {
    fetch('https://api.quotable.io/random')
    .then(response => response.json())
    .then(data => {
        const quoteText = document.getElementById('quoteText');
        quoteText.textContent = `"${data.content}" - ${data.author}`;
    })
    .catch(error => {
        console.error('Error fetching quote:', error);
    });
}

