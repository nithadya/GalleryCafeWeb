<?php
session_start();
include_once('../components/header-2.php');
include_once('../config.php');

// Ensure that account_id is set in the session
if (!isset($_SESSION['account_id'])) {
    // Display "User not logged in" message with icon
    echo '
    <div class="container">
        <div class="alert alert-warning">
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
            <strong>Warning!</strong> User not logged in. Please <a href="../login.php">log in</a> to access this page.
        </div>
    </div>';
    exit(); // Stop further execution if not logged in
}

// Fetch user orders
$account_id = $_SESSION['account_id']; // Assuming you have session management
$query = "SELECT o.order_id, m.item_name, o.quantity, m.item_price * o.quantity AS total_price, o.order_time 
          FROM orders o
          JOIN Menu m ON o.item_id = m.item_id
          WHERE o.account_id = ?";
$stmt = $link->prepare($query);
$stmt->bind_param("i", $account_id);
$stmt->execute();
$result = $stmt->get_result();

// Handle delete request
if (isset($_GET['delete_order_id'])) {
    $order_id = $_GET['delete_order_id'];
    $delete_query = "DELETE FROM orders WHERE order_id = ?";
    $delete_stmt = $link->prepare($delete_query);
    $delete_stmt->bind_param("i", $order_id);
    $delete_stmt->execute();
    // Refresh page after deletion
}

// Handle payment request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    $amount = $_POST['amount'];
    // Here you should handle the payment processing with your preferred payment gateway
    // For example, using Stripe, PayPal, etc.
    echo "Payment of Rs. $amount for Order ID $order_id processed.";
}

// Handle update request
if (isset($_POST['update_order_id'])) {
    $order_id = $_POST['update_order_id'];
    $quantity = $_POST['quantity'];
    $update_query = "UPDATE orders SET quantity = ? WHERE order_id = ?";
    $update_stmt = $link->prepare($update_query);
    $update_stmt->bind_param("ii", $quantity, $order_id);
    $update_stmt->execute();
}
?>

<!-- User Panel Section -->
<section id="user-panel" class="container">
    <div class="panel-header">
        <h1>User Panel</h1>
    </div>

    <!-- Order List -->
    <div class="order-list">
        <h2>Your Orders</h2>
        <!-- Display orders -->
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Order Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['item_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['order_time']; ?></td>
                    <td>
                        <a href="?delete_order_id=<?php echo $row['order_id']; ?>" class="action-button delete-button" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
                        <button class="action-button update-button" onclick="openUpdateModal(<?php echo $row['order_id']; ?>, <?php echo $row['quantity']; ?>)">Update</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Payment Section -->
    <section>
        <div class="payment-section">
            <h2>Make a Payment</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="order_id">Order ID:</label>
                    <input type="number" id="order_id" name="order_id" required>
                </div>
                <div class="form-group">
                    <label for="amount">Amount:</label>
                    <input type="number" id="amount" name="amount" step="0.01" required>
                </div>
                <button type="submit" class="pay-button">Pay Now</button>
            </form>
        </div>
    </section>

    <!-- Update Order Modal -->
    <div id="update-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Update Order</h2>
            <form id="update-form" method="POST">
                <input type="hidden" name="update_order_id" id="update_order_id">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" required>
                </div>
                <button type="submit" class="update-button">Update</button>
            </form>
        </div>
    </div>
</section>

<script>
    // Modal functionality
    var modal = document.getElementById("update-modal");
    var span = document.getElementsByClassName("close")[0];

    function openUpdateModal(orderId, quantity) {
        document.getElementById("update_order_id").value = orderId;
        document.getElementById("quantity").value = quantity;
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        margin: 0 auto;
        max-width: 1200px;
        padding: 20px;
        background: #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        border-radius: 8px;
        animation: fadeIn 1s ease-out;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .panel-header {
        margin-bottom: 30px;
    }

    .panel-header h1 {
        font-size: 3.5em;
        color: orangered;
        margin: 0;
        animation: slideIn 1s ease-out;
    }

    .order-list {
        margin-bottom: 30px;
    }

    .order-list h2 {
        font-size: 2em;
        color: #333;
        margin-bottom: 10px;
        animation: slideIn 1s ease-out;
    }

    .order-list table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        animation: fadeIn 1s ease-out;
    }

    .order-list th, .order-list td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    .order-list th {
        background-color: #f9f9f9;
        color: #333;
    }

    .action-button {
        padding: 8px 12px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.9em;
        text-align: center;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .delete-button {
        background-color: #dc3545;
        color: #fff;
        border: none;
        text-decoration: none;
        margin-right: 8px;
    }

    .delete-button:hover {
        background-color: #c82333;
        transform: scale(1.05);
    }

    .update-button {
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    .update-button:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .payment-section {
        margin-top: 20px;
    }

    .payment-section h2 {
        font-size: 2em;
        color: #333;
        margin-bottom: 15px;
        animation: slideIn 1s ease-out;
    }

    .payment-section form {
        display: flex;
        flex-direction: column;
        max-width: 400px;
        margin: 0 auto;
        animation: fadeIn 1s ease-out;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1em;
    }

    .pay-button {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 4px;
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .pay-button:hover {
        background-color: #218838;
        transform: scale(1.05);
    }

    /* Alert Styles */
    .alert {
        padding: 20px;
        background-color: #f8d7da;
        color: #721c24;
        border-radius: 4px;
        margin-top: 20px;
        display: flex;
        align-items: center;
    }

    .alert i {
        font-size: 24px;
        margin-right: 10px;
    }

    .alert a {
        color: #004085;
        text-decoration: underline;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
        animation: fadeIn 0.5s ease;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
        border-radius: 8px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideIn {
        from { transform: translateY(-20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 10px;
        }

        .panel-header h1 {
            font-size: 2.5em;
        }

        .order-list h2 {
            font-size: 1.5em;
        }

        .payment-section h2 {
            font-size: 1.5em;
        }
    }
</style>
