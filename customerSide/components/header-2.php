<?php
require_once '../../adminSide/config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Query for dishes
$sqlSriLankan = "SELECT * FROM Menu WHERE item_category = 'Sri Lankan' ORDER BY item_type;";
$resultSriLankan = mysqli_query($link, $sqlSriLankan);
$sriLankanDishes = mysqli_fetch_all($resultSriLankan, MYSQLI_ASSOC);

$sqlItalian = "SELECT * FROM Menu WHERE item_category = 'Italian' ORDER BY item_type;";
$resultItalian = mysqli_query($link, $sqlItalian);
$italianDishes = mysqli_fetch_all($resultItalian, MYSQLI_ASSOC);

$sqlChinese = "SELECT * FROM Menu WHERE item_category = 'Chinese' ORDER BY item_type;";
$resultChinese = mysqli_query($link, $sqlChinese);
$chineseDishes = mysqli_fetch_all($resultChinese, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Customer Page</title>
    <style>
        /* General header styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        header {
            height: 10vh;
            background-color: #EB5B00;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        /* Logo styles */
        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        /* Navigation styles */
        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 5px 20px;
            font-size: 14px;
            transition: background-color 0.3s, color 0.3s;
        }

        nav a:hover {
            background-color: white;
            color: orange;
            border-radius: 5px;
        }

        /* Dropdown styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: orange;
            min-width: 140px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            top: 45px;
            left: 0;
            border-radius: 0px 0px 5px 5px;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 13px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
            color: orange;
        }

        .dropdown.show .dropdown-content {
            display: block;
        }

        /* Icons styles */
        .icons {
            display: flex;
            align-items: center;
        }

        .icon {
            color: white;
            font-size: 20px;
            margin-left: 15px;
            position: relative;
            padding: 0;
            
        }

        .icon span {
            background-color: orange;
            border-radius: 100%;
            color: black;
            font-size: 10px;
            padding: 3px;
            position: absolute;
            top: -10px;
            right: -10px;
            font-weight: 600;
        }

        /* Hamburger menu styles */
        .hamburger {
            display: none;
            font-size: 24px;
            cursor: pointer;
        }

        /* Mobile and tablet styles */
        @media (max-width: 768px) {
            nav {
                display: none;
                flex-direction: column;
                width: 100%;
                background-color: orange;
                position: absolute;
                top: 60px;
                left: 0;
                border-radius: 10px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
                transition: transform 0.3s;
                transform: translateY(-100%);
            }

            nav.active {
                display: flex;
                transform: translateY(0);
            }

            .hamburger {
                display: block;
            }

            .icons {
                display: none;
            }

            nav a {
                padding: 10px;
                text-align: center;
                border-bottom: 1px solid #fff;
                transition: background-color 0.3s, color 0.3s;
            }

            .nav-a :hover {
                background-color: white;
                color: orange;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">The Gallery Cafe</div>
        <div class="hamburger" onclick="toggleNav()">
            <i class="fa fa-bars"></i>
        </div>
        <nav id="navMenu">
            <a class="nav-a" href="../home/home.php#hero">HOME</a>
            <a class="nav-a" href="../CustomerReservation/reservePage.php">SERVICE</a>
            <div class="dropdown" onclick="toggleDropdown(event)">
                <a class="nav-a" href="#">ACCOUNT <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                <div class="dropdown-content">
                    <?php
                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                        $account_id = $_SESSION['account_id'];
                        $query = "SELECT member_name, points FROM memberships WHERE account_id = ?";
                        $stmt = $link->prepare($query);
                        $stmt->bind_param('i', $account_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result) {
                            $row = $result->fetch_assoc();
                            $member_name = $row['member_name'];
                            $points = $row['points'];
                            $vip_status = ($points >= 1000) ? 'Gold Member' : 'Regular';
                            echo '<a class="nav-a" href="#">'.$member_name.'</a>';
                            echo '<a class="nav-a" href="#">Points: '.$points.'</a>';
                            echo '<a class="nav-a" href="#">'.$vip_status.'</a>';
                        }
                        // Close the statement, not the connection
                        $stmt->close();
                        echo '<a class="nav-a" href="../customerLogin/logout.php">Logout</a>';
                    } else {
                        echo '<a class="nav-a" href="../customerLogin/register.php">Sign Up</a>';
                        echo '<a class="nav-a" href="../customerLogin/login.php">Log In</a>';
                    }
                    ?>
                </div>
            </div>
            <div class="icons">
                <a href="../home/user_panel.php" class="icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span id="cartCount">
                        <?php
                        // Fetch pre-order item count for the logged-in user
                        $cartCount = 0;
                        if (isset($_SESSION['account_id'])) {
                            $account_id = $_SESSION['account_id'];
                            
                            $query = "SELECT COUNT(*) AS item_count FROM orders WHERE account_id = ?";
                            $stmt = $link->prepare($query);
                            $stmt->bind_param('i', $account_id);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $row = $result->fetch_assoc();
                            $cartCount = $row['item_count'];
                            // Close the statement, not the connection
                            $stmt->close();
                        }
                        echo $cartCount;
                        ?>
                    </span>
                </a>
            </div>
        </nav>
    </header>

    <script>
        function toggleNav() {
            var nav = document.getElementById('navMenu');
            nav.classList.toggle('active');
        }

        function toggleDropdown(event) {
            event.stopPropagation(); // Prevent event from bubbling up to the document
            var dropdown = event.currentTarget;
            dropdown.classList.toggle('show');
        }

        function logout() {
            // Implement logout functionality here
            alert('Logging out...');
        }

        // Close dropdown if clicking outside
        document.addEventListener('click', function(event) {
            var dropdowns = document.querySelectorAll('.dropdown');
            dropdowns.forEach(function(dropdown) {
                if (!dropdown.contains(event.target)) {
                    dropdown.classList.remove('show');
                }
            });
        });

        // Mobile menu handling
        const hamburger = document.querySelector('.hamburger');
        const mobileMenu = document.getElementById('navMenu');
        const menuItems = document.querySelectorAll('#navMenu a');
        const header = document.querySelector('header');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            mobileMenu.classList.toggle('active');
        });

        document.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
