<?php
// Connect to the database
$pdo = new PDO('sqlite:database.db');

// Create the "users" table
$pdo->exec('CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY,
    username TEXT,
    password TEXT,
    balance INTEGER
)');

// Create the "transactions" table
$pdo->exec('CREATE TABLE IF NOT EXISTS transactions (
    id INTEGER PRIMARY KEY,
    user_id INTEGER,
    amount INTEGER,
    FOREIGN KEY (user_id) REFERENCES users(id)
)');

// Insert a new user into the "users" table
$username = 'example';
$password = 'password';
$balance = 100;
$stmt = $pdo->prepare('INSERT INTO users (username, password, balance) VALUES (?, ?, ?)');
$stmt->execute([$username, $password, $balance]);

// Update the balance of a user
$username = 'example';
$amount = 50;
$stmt = $pdo->prepare('UPDATE users SET balance = balance + ? WHERE username = ?');
$stmt->execute([$amount, $username]);

// Select all transactions for a user
$username = 'example';
$stmt = $pdo->prepare('SELECT transactions.* FROM transactions
                      JOIN users ON transactions.user_id = users.id
                      WHERE username = ?');
$stmt->execute([$username]);
$transactions = $stmt->fetchAll();

// Display the transactions
foreach ($transactions as $transaction) {
    echo "Transaction ID: " . $transaction['id'] . "\n";
    echo "Amount: " . $transaction['amount'] . "\n";
}

