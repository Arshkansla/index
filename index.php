index.php

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Website</title>
    <style>

         /* Styles for header */
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        /* Styles for footer */
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Styles for content */
        .content {
            padding: 20px;
            margin-bottom: 60px; /* Adjust according to footer height */
        }
    
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Our Library</h1>
    </header>

    <div class="content">
        <h2>Available Books</h2>
        <ul>
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root"; // Your MySQL username
            $password = ""; // Your MySQL password
            $database = "presentation"; // Your database name
            $conn = new mysqli($servername, $username, $password, $database);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // Fetching books from the database
            $sql = "SELECT * FROM books";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<li>{$row["title"]} by {$row["author"]} ({$row["year_published"]})</li>";
                }
            } else {
                echo "<li>No books available</li>";
            }
            $conn->close();
            ?>
        </ul>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Our Library.Arshdeep Singh (202106666) </p>
    </footer>
</body>
</html>
