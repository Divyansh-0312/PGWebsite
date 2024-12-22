$db_host = 'localhost';
$db_username = 'your_username';
$db_password = 'your_password';
$db_name = 'your_database';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle review submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_review'])) {
    $domain = $conn->real_escape_string($_POST['domain']);
    $review_text = $conn->real_escape_string($_POST['review_text']);
    
    $sql = "INSERT INTO reviews (domain, review_text) VALUES ('$domain', '$review_text')";
    
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $conn->error;
    }
}

// Fetch reviews
$reviews = [];
$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['replies'] = []; // Initialize replies array
        $reviews[] = $row;
    }
}

// Fetch admin replies for each review
foreach ($reviews as &$review) {
    $review_id = $review['id'];
    $reply_sql = "SELECT * FROM replies WHERE review_id = $review_id";
    $reply_result = $conn->query($reply_sql);
    
    if ($reply_result->num_rows > 0) {
        while ($reply = $reply_result->fetch_assoc()) {
            $review['replies'][] = $reply;
        }
    }
}

// Close connection
$conn->close();

// Include the HTML file to display reviews
include 'display_reviews.php';
?>