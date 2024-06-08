<!-- task_manager/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Task Manager</title>
</head>
<body>
    <div class="container">
        <h1>𝕋𝕒𝕤𝕜 𝕄𝕒𝕟𝕒𝕘𝕖𝕣📝</h1>
        <label for="darkModeToggle">𝐃𝐚𝐫𝐤 𝐌𝐨𝐝𝐞:</label>
        <input type="checkbox" id="darkModeToggle">
        <form id="taskForm" method="POST" action="php/tasks.php">
            <input type="hidden" name="action" value="add">
            <label for="title">𝐓𝐚𝐬𝐤 𝐓𝐢𝐭𝐥𝐞:</label>
            <input type="text" id="title" name="title" required>
            <label for="description">𝐃𝐞𝐬𝐜𝐫𝐢𝐩𝐭𝐢𝐨𝐧:</label>
            <textarea id="description" name="description"></textarea>
            <button type="submit">𝐀𝐝𝐝 𝐓𝐚𝐬𝐤</button>
        </form>
        <ul id="taskList"></ul>
        <button id="logoutButton" class="logout-button">Logout</button> <!-- Logout button -->
    </div>

    <!-- Quotes Section -->
    <div class="quotes-container">
        <div id="quoteText" class="quote-text"></div>
    </div>

    <script src="js/scripts.js"></script>
</body>
</html>
