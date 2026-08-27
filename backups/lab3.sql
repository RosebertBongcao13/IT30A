    CREATE TABLE books(
        book_id INT PRIMARY KEY AUTO_INCREMENT,
        book_title VARCHAR(100) NOT NULL,
        book_author VARCHAR(100) NOT NULL,
        book_category VARCHAR(50) NOT NULL,
        book_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);


    INSERT INTO books (book_title, book_author, book_category) VALUES
    ("Terminator 2: Judgment Day", "James Cameron & William Wisher", "Action"),
    ("Mission: Impossible", "Bruce Geller", "Action"),
    ("Top Gun: Maverick", "Ehren Kruger", "Action");

    CREATE TABLE borrow(
        borrow_id INT PRIMARY KEY AUTO_INCREMENT,
        student_id INT NOT NULL,
        book_id INT NOT NULL,
        borrow_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        borrow_return_date TIMESTAMP NULL DEFAULT NULL,
        constraint fk_borrow_student FOREIGN KEY (student_id) REFERENCES students(student_id),
        constraint fk_borrow_book FOREIGN KEY (book_id) REFERENCES books(book_id)
    );

    INSERT INTO borrow (student_id, book_id)
VALUES
    (1, 2);

     
SELECT
br.borrow_id,

s.student_id,
CONCAT(
s.student_first_name, ' ', s.student_last_name) as student_name, s.student_course,
b.book_title, b.book_author, b.book_category,
br.borrow_date FROM borrow br JOIN students s ON br.student_id = s.student_id
JOIN books b ON br.book_id = b.book_id
WHERE br.borrow_return_date IS NULL
ORDER BY br.borrow_date DESC;

UPDATE borrow
SET borrow_return_date = CURRENT_TIMESTAMP
-- Set borrow id for the borrowed book you want to return
WHERE borrow_id = 4 AND borrow_return_date IS NULL;

        SELECT
            br.borrow_id,

            CONCAT(
                s.student_first_name,
                ' ',
                s.student_last_name      
            ) as student_name,

            b.book_title,
            b.book_author,
            b.book_category,

            br.borrow_date,
            br.borrow_return_date
            FROM borrow br
            JOIN students s ON
                br.student_id = s.student_id
            JOIN books b ON
                br.book_id = b.book_id

            WHERE br.borrow_return_date is NOT NULL
            ORDER BY br.borrow_date DESC;