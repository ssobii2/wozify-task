<!DOCTYPE html>
<html>
<head>
    <!-- Set the title of the document -->
    <title>Home</title>
</head>
<body>
<!-- Create a form with an input field and a submit button -->
<form id="search-form">
    <input type="text" id="query" name="query" required>
    <button type="submit">Search</button>
</form>

<!-- Create an empty list to display the users -->
<ul id="users"></ul>

<script>
    // Add an event listener to the form that triggers when the form is submitted
    document.getElementById('search-form').addEventListener('submit', function(e) {
        // Prevent the form from doing the default form submission
        e.preventDefault();

        // Send a POST request to the search route
        fetch('{{ route('search') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                query: document.getElementById('query').value
            })
        })
            // Convert the response to JSON
            .then(response => response.json())
            // Update the list of users with the response data
            .then(data => {
                const usersList = document.getElementById('users');
                usersList.innerHTML = '';

                data.forEach(user => {
                    const listItem = document.createElement('li');
                    listItem.textContent = user.name + ' - ' + user.email;
                    usersList.appendChild(listItem);
                });
            });
    });
</script>
</body>
</html>
