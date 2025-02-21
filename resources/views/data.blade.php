<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Requests</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Data Requests</h1>

    <!-- Form untuk POST -->
    <form action="/data" method="POST">
        @csrf
        <button type="submit">Send POST Request</button>
    </form>

    <!-- Form untuk PUT dengan method spoofing -->
    <form action="/data" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <button type="submit">Send PUT Request</button>
    </form>

    <!-- Form untuk DELETE dengan method spoofing -->
    <form action="/data" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">Send DELETE Request</button>
    </form>

    <!-- Form untuk PATCH dengan method spoofing -->
    <form action="/data" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <button type="submit">Send PATCH Request</button>
    </form>

    <!-- Tombol untuk mengirim request menggunakan JavaScript -->
    <button onclick="sendRequest('POST')">Send POST via JavaScript</button>
    <button onclick="sendRequest('PUT')">Send PUT via JavaScript</button>
    <button onclick="sendRequest('DELETE')">Send DELETE via JavaScript</button>
    <button onclick="sendRequest('PATCH')">Send PATCH via JavaScript</button>

    <!-- Script JavaScript untuk mengirim request -->
    <script>
        async function sendRequest(method) {
            const url = '/data';
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            const response = await fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            const result = await response.text();
            alert(result); // Tampilkan respons dari server
        }
    </script>
</body>
</html>