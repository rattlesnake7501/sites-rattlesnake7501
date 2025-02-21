// Create a new mysqli instance
$mysqli = new mysqli('localhost', 'username', 'password', 'database');

// Check for errors
if ($mysqli->connect_error) {
  die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Prepare the SQL statement
$stmt = $mysqli->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");

// Bind the parameters to the statement
$stmt->bind_param('sss', $name, $email, $message);

// Set the parameter values
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Execute the statement
if ($stmt->execute()) {
  // Success
} else {
  // Error
}

// Close the statement and connection
$stmt->close();
$mysqli->close();