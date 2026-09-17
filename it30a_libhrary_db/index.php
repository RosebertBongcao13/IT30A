<?php
// Database connection 
$host = 'localhost';
$db = 'it30a_library_db';
$user = 'root';
$pass ='';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host; dbname=$db; charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

try{
    $pdo = new PDO($dsn,$user,$pass,$options);
}catch(PDOException $e){
    die("Database connection failed: " . $e->getMessage());
}

// Session
session_start();

// Create students table if it does not exist
$pdo->exec("
    CREATE TABLE IF NOT EXISTS students (
        student_id INT AUTO_INCREMENT PRIMARY KEY,
        student_first_name VARCHAR(100) NOT NULL,
        student_last_name VARCHAR(100) NOT NULL,
        student_course VARCHAR(100) NOT NULL,
        student_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

// Determine current section
$section = $_GET['section'] ?? 'students';

// CRUD Operations
$actions = $_GET['actions'] ?? '';

//--------------------------------------------------------------------------
// Students
//--------------------------------------------------------------------------

// Fetch students
if($section === 'students'){
    $stmt = $pdo->query("
        SELECT *
        FROM students
        ORDER BY student_id DESC
    ");

    $students = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <h1>Simple Library System</h1>

    <nav>
        <a href="index.php?section=students">Students</a>
        <a href="index.php?section=books">Books</a>
        <a href="index.php?section=borrow">Borrow</a>
    </nav>

    <hr>

    <?php if($section === 'students'): ?>

        <h1>Students</h1>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Course</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach($students as $student): ?>

                    <tr>
                        <td>
                            <?= htmlspecialchars($student['student_id']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($student['student_first_name']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($student['student_last_name']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($student['student_course']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($student['student_created_at']) ?>
                        </td>

                        <td>
                            <a href="#">Edit</a>
                            |
                            <a href="#">Delete</a>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>

    <?php endif; ?>


    <?php if($section === 'books'): ?>

        <h1>Books</h1>

    <?php endif; ?>


    <?php if($section === 'borrow'): ?>

        <h1>Borrow</h1>

    <?php endif; ?>

</body>
</html>

