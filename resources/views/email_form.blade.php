<!DOCTYPE html>
<html>
<head>
    <title>Email Form</title>
</head>
<body>
<h1>Email Form</h1>
<form method="POST" action="{{ route('send.email') }}">
    @csrf
    <label for="email">Recipient Email:</label>
    <input type="email" name="email" required>
    <br>
    <label for="message">Message:</label>
    <textarea name="message" rows="4" required></textarea>
    <br>
    <button type="submit">Send Email</button>
</form>
</body>
</html>
