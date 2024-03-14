<?php
// Assuming you have a database connection established already
require "includes/db.php";
// Check if search query is set
?>

<?php
$query = $_POST['query']; // Sanitize this value before using in the query

// Perform the database query to fetch search results
$sql = "SELECT * FROM posts WHERE title LIKE '%$query%' OR description LIKE '%$query%'";
$result = $conn->query($sql);

// Check for errors in the query execution
if (!$result) {
    // Handle the error (e.g., display an error message, log the error, etc.)
    echo "Error executing query: " . $conn->error;
} else {
    // Proceed with displaying search results
    if ($result->num_rows > 0) {
        // Display search results
        while ($row = $result->fetch_assoc()) {
            echo '<div class="post">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["title"] . '">';
            echo '<h2>' . $row["title"] . '</h2>';
            echo '<p>' . $row["description"] . '</p>';
            echo '<button class="show-description">Description</button>';
            echo '<a href="single.php?id=' . $row["id"] . '" class="button red">Comments</a>';
            echo '<button class="grey"> Share </button>';
            ?>
            <!-- Button -->
            <button class="blue" onclick="likes(<?php echo $row["id"] ?>, <?php echo $row["likes"] ?>)" >Like</button>
<button class="black" onclick="hate(<?php echo $row["id"] ?>, <?php echo $row["likes"] ?>)" >Dislike</button><span id="likeCount_<?php echo $row["id"] ?>"><?php echo $row["likes"] ?></span>

            <?php
            echo '</div>';
        }
    } else {
        // No results found message
        echo "No results found for '$query'";
    }
}

// Close database connection if needed
$conn->close();
?>


