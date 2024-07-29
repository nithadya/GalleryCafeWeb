<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - The Gallery Cafe</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background-color: black;">
    <div class="contact-container">
        <div class="contact-image">
            <img src="./assets/images/customer-service.png">
            <!-- Add your background image here -->
        </div>
        <div class="contact-form">
            <h2>Contact Us</h2>
            <form action="submit_form.php" method="post">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email" required>
                
                <label for="message">Type Your Message</label>
                <textarea id="message" name="message" rows="4" required></textarea>
                
                <button type="submit">SUBMIT</button>
            </form>
        </div>
    </div>
</body>
</html>

<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f4f4f4;
}

.contact-container {
    display: flex;
    width: 80%;
    max-width: 900px;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.contact-image {
    flex: 1;
    background: url('/GalleryCafe/assets/images/customer-service.png') no-repeat center center/cover;
}

.contact-form {
    flex: 1;
    padding: 20px;
}

.contact-form h2 {
    margin-bottom: 20px;
}

.contact-form label {
    display: block;
    margin-bottom: 5px;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.contact-form button {
    padding: 10px 20px;
    background-color: #333;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.contact-form button:hover {
    background-color: #555;
}

</style>
