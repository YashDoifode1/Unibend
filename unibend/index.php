<?php require "includes/header.php"; ?>
<?php require "includes/db.php";?>
<?php 
    if (!isset($_SESSION['username'])) {
        // Redirect the user to the login page
        header("Location: login.php");
        exit(); // Stop further execution
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* Embedded CSS
            .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }*/
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        } 
        .container1 {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .post {
            max-width: 800px;
            margin: 50px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
        }
        .post img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 20px;
            border-radius: 5px;
        }
        .post h2 {
            color: #333;
            margin-bottom: 10px;
        }
        .post p {
            color: #666;
            display: none; /* Initially hide description */
        }
        .show-description {
            background-color: #4CAF50;
            color: white;
            margin-left:10px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        button:hover{
            background-color:pink;
        }
        button:active{
            background-color:brown;
        }

        .red{
            margin-left: 10px;
            color: white;
            background: red;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        .blue{
            margin-left: 10px;
            color: white;
            background: blue;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        .black{
            margin-left: 10px;
            color: white;
            background: black;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        .grey{
            margin-left: 10px;
            color: white;
            background: grey;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        span{
            margin-left: 10px;
              
        } </style>


</head>

<body>
<br>
<div id="searchResults"></div>
 <?php
   
        // Query to fetch posts from the database
        
$sql = "SELECT * FROM posts ORDER BY created_at DESC"; // Assuming 'created_at' is the column representing the creation date of posts
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="post">';
        echo '<img src="' . $row["image"] . '" alt="' . $row["title"] . '">';
        echo '<h2>' . $row["title"] . '</h2>';
        echo '<p>' . $row["description"] . '</p>';
        echo '<button class="show-description">Description</button>';
        echo '<a href="single.php?id=' . $row["id"] . '" class="button red">Comments</a>';
        echo '<button id="copyButton" class="grey"> Share </button>';
        ?>
        <input type="text" value="http://localhost/twitter/single.php?id=<?php echo $row["id"] ?>" id="shareLink" style="display: none;">
        
        <!-- Button -->
        <?php
        echo '<button class="likeButton blue" data-id="' . $row["id"] . '">Like</button>';
        echo '<button class="hateButton black" data-id="' . $row["id"] . '">Dislike</button>';
        echo '<span id="likeCount_' . $row["id"] . '">' . $row["likes"] . '</span>';
        
        echo '</div>';
    }
}


    

 else {
    echo '<script>alert("NO data Found !");</script>'; 
}
$conn->close();


?>
<div id="searchResults"></div>


<script>
// Get all like and hate buttons
var likeButtons = document.querySelectorAll('.likeButton');
var hateButtons = document.querySelectorAll('.hateButton');

// Add click event listener to each like button
likeButtons.forEach(function(likeButton) {
    likeButton.addEventListener('click', function() {
        var postId = this.dataset.id;
        var likeCountSpan = document.getElementById('likeCount_' + postId);
        
        // Disable the like button and enable the hate button
        likeButton.disabled = true;
        this.nextElementSibling.disabled = false;
        
        // Update like count
        var likeCount = parseInt(likeCountSpan.innerText);
        likeCount++;
        likeCountSpan.innerText = likeCount;
        
        // You can perform AJAX request here to update like count in the database
    });
});

// Add click event listener to each hate button
hateButtons.forEach(function(hateButton) {
    hateButton.addEventListener('click', function() {
        var postId = this.dataset.id;
        var likeCountSpan = document.getElementById('likeCount_' + postId);
        
        // Disable the hate button and enable the like button
        hateButton.disabled = true;
        this.previousElementSibling.disabled = false;
        
        // Update like count
        var likeCount = parseInt(likeCountSpan.innerText);
        likeCount--;
        likeCountSpan.innerText = likeCount;
        
        // You can perform AJAX request here to update like count in the database
    });
});
</script> 
<script>
    document.getElementById("copyButton").addEventListener("click", function() {
        var shareLink = document.getElementById("shareLink");
        shareLink.style.display = "block";
        shareLink.select();
        document.execCommand("copy");
        shareLink.style.display = "none";
        alert("Link copied to clipboard!");
        location.reload();
});
</script>

    <script>
        // JavaScript to toggle visibility of post description
        document.querySelectorAll('.show-description').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var description = this.previousElementSibling;
                description.style.display = (description.style.display === 'none') ? 'block' : 'none';
                
            });
        });
    </script>
        
    
        <script>
    function likes(postId, currentLikes) {
        // Send AJAX request to update likes in the database
        $.ajax({
            type: 'POST',
            url: 'update.php',
            data: { postId: postId },
            dataType: 'json', // Specify JSON dataType for parsing response
            success: function(response) {
                // Update likes count on the page
                var likeCountSpan = $(`button[data-postid="${postId}"]`).siblings('span');
                likeCountSpan.text(response.likesCount);
                console.log(response.message);

                // Reload the body of the page
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>

<script>
    function hate(postId, currentHate) {
        // Send AJAX request to update hate in the database
        $.ajax({
            type: 'POST',
            url: 'hate.php',
            data: { postId: postId },
            dataType: 'json', // Specify JSON dataType for parsing response
            success: function(response) {
                // Update hate count on the page
                var likeCountSpan = $(`button[data-postid="${postId}"]`).siblings('span');
                likeCountSpan.text(response.likesCount);
                console.log(response.message);

                // Reload the body of the page
                location.reload();
                
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>






   
 <!--
            function hate(postId, currentLikes) {
                // Update UI immediately
                var likeButton = $(`button[data-postid="${postId}"]`);
                var likeCountSpan = likeButton.siblings('span');
                likeCountSpan.text(currentLikes - 1);

                // Send AJAX request to update likes in the database
                $.ajax({
                    type: 'POST',
                    url: 'hate.php', // Assuming this is the endpoint to handle like updates
                    data: { postId: postId },
                    success: function(response) {
                        // Handle success if needed
                        console.log(response);
                        updatePosts();
                    },
                    error: function(xhr, status, error) {
                        // Revert UI changes if there is an error
                        likeCountSpan.text(currentLikes);
                        console.error(xhr.responseText);
                    }
                    
                    
                });
                updatePosts();
            }
        </script>-->
        
</body>

</html>


<?php require "includes/footer.php"; ?>
