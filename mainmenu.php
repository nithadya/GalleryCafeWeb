<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        .header {
            background-color: #ff6600;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
        }
        .menu {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .menu-item {
            width: 30%;
            margin-bottom: 20px;
            text-align: center;
        }
        .menu-item img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
        .menu-item h3 {
            margin: 10px 0 5px;
            font-size: 1.2em;
            color: #ff6600;
        }
        .menu-item p {
            font-size: 0.9em;
            color: #666;
            margin: 5px 0;
        }
        .menu-item .price {
            font-size: 1em;
            color: #333;
            font-weight: bold;
        }
    </style>
    <title>Food Menu - The Gallery Cafe</title>
</head>
<body>
    <div class="header">
        <h1>The Gallery Cafe</h1>
    </div>
    <div class="container">
        <h2>Food Menu</h2>
        <div class="menu">
            <div class="menu-item">
                <img src="../GalleryCafe/assets/images/food-menu-1.png" alt="Food Menu Item 1">
                <h3>Food Menu Item 1</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Non, quae.</p>
                <p class="price">Rs:2500/=</p>
            </div>
            <div class="menu-item">
                <img src="../GalleryCafe/assets/images/food-menu-2.png" alt="Food Menu Item 2">
                <h3>Food Menu Item 2</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Non, quae.</p>
                <p class="price">Rs:2500/=</p>
            </div>
            <div class="menu-item">
                <img src="../GalleryCafe/assets/images/food-menu-3.png" alt="Food Menu Item 3">
                <h3>Food Menu Item 3</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Non, quae.</p>
                <p class="price">Rs:2700/=</p>
            </div>
            <div class="menu-item">
                <img src="../GalleryCafe/assets/images/food-menu-4.png" alt="Food Menu Item 4">
                <h3>Food Menu Item 4</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Non, quae.</p>
                <p class="price">Rs:2200/=</p>
            </div>
            <div class="menu-item">
                <img src="../GalleryCafe/assets/images/food-menu-6.png" alt="Food Menu Item 5">
                <h3>Food Menu Item 5</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Non, quae.</p>
                <p class="price">Rs:1500/=</p>
            </div>
            <div class="menu-item">
                <img src="../GalleryCafe/assets/images/food-menu-1.png" alt="Food Menu Item 6">
                <h3>Food Menu Item 6</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Non, quae.</p>
                <p class="price">Rs:1800/=</p>
            </div>
        </div>
    </div>
</body>
</html>