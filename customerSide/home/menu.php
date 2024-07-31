<?php 
include_once('../components/header.php');
include_once('../config.php'); // Include the database connection

// Mock function to check if the user is logged in (replace with your actual login check)
function isLoggedIn() {
    // This should be replaced with the actual user authentication logic
    // For example, check if a session variable for user ID is set
    return isset($_SESSION['account_id']);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize inputs
    $item_id = isset($_POST['item_id']) ? intval($_POST['item_id']) : 0;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
    
    if (isLoggedIn()) {
        $account_id = $_SESSION['account_id']; // Fetch the logged-in user's account_id
        
        if ($item_id > 0 && $quantity > 0) {
            // Prepare and execute the query
            $stmt = $link->prepare("INSERT INTO orders (item_id, account_id, quantity, order_time) VALUES (?, ?, ?, NOW())");
            $stmt->bind_param("iii", $item_id, $account_id, $quantity);
            
            if ($stmt->execute()) {
                echo '<script>window.onload = function() { showPopup("Order placed successfully!"); };</script>';
            } else {
                echo '<script>window.onload = function() { showPopup("Failed to place order. Please try again."); };</script>';
            }
            
            $stmt->close();
        } else {
            echo '<script>window.onload = function() { showPopup("Invalid item or quantity."); };</script>';
        }
    } else {
        echo '<script>window.onload = function() { showPopup("Please log in to place an order."); };</script>';
    }
}

// Fetch menu items
$sriLankanDishes = $link->query("SELECT * FROM Menu WHERE item_category='Sri Lankan'")->fetch_all(MYSQLI_ASSOC);
$italianDishes = $link->query("SELECT * FROM Menu WHERE item_category='Italian'")->fetch_all(MYSQLI_ASSOC);
$chineseDishes = $link->query("SELECT * FROM Menu WHERE item_category='Chinese'")->fetch_all(MYSQLI_ASSOC);
?>


<!-- menu Section -->
<section id="projects">
    <div class="projects container">
        <div class="projects-header">
            <h1 class="section-title">Me<span>n</span>u</h1>
        </div>
        
        <!-- Category Selector -->
        <select style="text-align:center;" id="menu-category" class="menu-category">
            <option value="all">ALL ITEMS</option>
            <option value="sri-lankan">SRI LANKAN</option>
            <option value="italian">ITALIAN</option>
            <option value="chinese">CHINESE</option>
        </select>
        
        <!-- All Items (default view) -->
        <div class="all msg">
            <div class="mainDish">
                <h1 class="category-title">SRI LANKAN</h1>
                <?php foreach ($sriLankanDishes as $item): ?>
                    <form action="menu.php" method="POST" class="menu-item-form">
                        <p class="menu-item">
                            <span class="item-name"> <strong><?php echo htmlspecialchars($item['item_name']); ?></strong></span>
                            <span class="item-price">Rs.<?php echo htmlspecialchars($item['item_price']); ?></span><br>
                            <span class="item_type"><i><?php echo htmlspecialchars($item['item_type']); ?></i></span>
                            <br>
                            <input type="number" name="quantity" min="1" value="1" class="quantity-input">
                            <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($item['item_id']); ?>">
                            <button type="submit" class="preorder-button">Pre-order</button>
                            <hr>
                        </p>
                    </form>
                <?php endforeach; ?>
            </div>

            <div class="sideDish">
                <h1 class="category-title">CHINESE</h1>
                <?php foreach ($chineseDishes as $item): ?>
                    <form action="menu.php" method="POST" class="menu-item-form">
                        <p class="menu-item">
                            <span class="item-name"> <strong><?php echo htmlspecialchars($item['item_name']); ?></strong></span>
                            <span class="item-price">Rs.<?php echo htmlspecialchars($item['item_price']); ?></span><br>
                            <span class="item_type"><i><?php echo htmlspecialchars($item['item_type']); ?></i></span>
                            <br>
                            <input type="number" name="quantity" min="1" value="1" class="quantity-input">
                            <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($item['item_id']); ?>">
                            <button type="submit" class="preorder-button">Pre-order</button>
                            <hr>
                        </p>
                    </form>
                <?php endforeach; ?>
            </div>
            
            <div class="drinks">
                <h1 class="category-title">ITALIAN</h1>
                <?php foreach ($italianDishes as $item): ?>
                    <form action="menu.php" method="POST" class="menu-item-form">
                        <p class="menu-item">
                            <span class="item-name"> <strong><?php echo htmlspecialchars($item['item_name']); ?></strong></span>
                            <span class="item-price">Rs.<?php echo htmlspecialchars($item['item_price']); ?></span><br>
                            <span class="item_type"><i><?php echo htmlspecialchars($item['item_type']); ?></i></span>
                            <br>
                            <input type="number" name="quantity" min="1" value="1" class="quantity-input">
                            <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($item['item_id']); ?>">
                            <button type="submit" class="preorder-button">Pre-order</button>
                            <hr>
                        </p>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Category Sections -->
        <div class="sri-lankan msg" style="display: none;">
            <div class="mainDish">
                <h1 class="category-title">SRI LANKAN</h1>
                <?php foreach ($sriLankanDishes as $item): ?>
                    <form action="menu.php" method="POST" class="menu-item-form">
                        <p class="menu-item">
                            <span class="item-name"> <strong><?php echo htmlspecialchars($item['item_name']); ?></strong></span>
                            <span class="item-price">Rs.<?php echo htmlspecialchars($item['item_price']); ?></span><br>
                            <span class="item_type"><i><?php echo htmlspecialchars($item['item_type']); ?></i></span>
                            <br>
                            <input type="number" name="quantity" min="1" value="1" class="quantity-input">
                            <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($item['item_id']); ?>">
                            <button type="submit" class="preorder-button">Pre-order</button>
                            <hr>
                        </p>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="italian msg" style="display: none;">
            <div class="drinks">
                <h1 class="category-title">ITALIAN</h1>
                <?php foreach ($italianDishes as $item): ?>
                    <form action="menu.php" method="POST" class="menu-item-form">
                        <p class="menu-item">
                            <span class="item-name"> <strong><?php echo htmlspecialchars($item['item_name']); ?></strong></span>
                            <span class="item-price">Rs.<?php echo htmlspecialchars($item['item_price']); ?></span><br>
                            <span class="item_type"><i><?php echo htmlspecialchars($item['item_type']); ?></i></span>
                            <br>
                            <input type="number" name="quantity" min="1" value="1" class="quantity-input">
                            <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($item['item_id']); ?>">
                            <button type="submit" class="preorder-button">Pre-order</button>
                            <hr>
                        </p>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="chinese msg" style="display: none;">
            <div class="sideDish">
                <h1 class="category-title">CHINESE</h1>
                <?php foreach ($chineseDishes as $item): ?>
                    <form action="menu.php" method="POST" class="menu-item-form">
                        <p class="menu-item">
                            <span class="item-name"> <strong><?php echo htmlspecialchars($item['item_name']); ?></strong></span>
                            <span class="item-price">Rs.<?php echo htmlspecialchars($item['item_price']); ?></span><br>
                            <span class="item_type"><i><?php echo htmlspecialchars($item['item_type']); ?></i></span>
                            <br>
                            <input type="number" name="quantity" min="1" value="1" class="quantity-input">
                            <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($item['item_id']); ?>">
                            <button type="submit" class="preorder-button">Pre-order</button>
                            <hr>
                        </p>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Popup Modal -->
<div id="popup" class="popup">
    <div class="popup-content">
        <span class="popup-close">&times;</span>
        <p id="popup-message"></p>
    </div>
</div>

<script>
function showPopup(message) {
    var popup = document.getElementById('popup');
    var popupMessage = document.getElementById('popup-message');
    var popupClose = document.querySelector('.popup-close');
    
    popupMessage.textContent = message;
    popup.style.display = 'block';
    
    popupClose.onclick = function() {
        popup.style.display = 'none';
    }
    
    window.onclick = function(event) {
        if (event.target == popup) {
            popup.style.display = 'none';
        }
    }
}
</script>

<style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .projects {
        margin: 20px auto;
        max-width: 1200px;
        padding: 0 20px;
    }

    .projects-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 2em;
        color: #333;
    }

    .section-title span {
        color: #f00;
    }

    /* Category Selector Styles */
    .menu-category {
        display: block;
        margin: 0 auto;
        padding: 10px;
        font-size: 1em;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Menu Items Container */
    .msg {
        margin-top: 20px;
    }

    .category-title {
        font-size: 1.5em;
        color: #333;
        margin-bottom: 10px;
    }

    .menu-item-form {
        margin-bottom: 20px;
    }

    .menu-item {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .item-name {
        font-size: 1.2em;
        color: #333;
    }

    .item-price {
        color: #f00;
    }

    .item_type {
        color: #666;
    }

    .quantity-input {
        margin: 5px 0;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .preorder-button {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
    }

    .preorder-button:hover {
        background-color: #218838;
    }

    /* HR Styling */
    hr {
        border: 0;
        height: 1px;
        background: #ddd;
        margin: 10px 0;
    }

    /* Success and Error Messages */
    .success {
        color: green;
        font-weight: bold;
    }

    .error {
        color: red;
        font-weight: bold;
    }

    /* Popup Modal Styles */
    .popup {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
        z-index: 1000;
    }

    .popup-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
        border-radius: 5px;
        text-align: center;
    }

    .popup-close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .popup-close:hover,
    .popup-close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<?php include_once('../components/footer.php'); ?>