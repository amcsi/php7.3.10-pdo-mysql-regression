<?php
declare(strict_types=1);

$pdo = new PDO('mysql:dbname=test_db;host=db', 'devuser', 'devpass', [
    PDO::ATTR_EMULATE_PREPARES => true,
]);

try {
    $pdo->query('DROP TABLE IF EXISTS `example`;');
    $pdo->query('CREATE TABLE `example` ( `value` INT );');
    $statement = $pdo->query(file_get_contents('sql.sql'));
    while ($statement->nextRowset()) {
        /* Must iterate to get exceptions for non-first statements. */
        /* https://bugs.php.net/bug.php?id=61613 */
    }

    $statement = $pdo->query('SELECT * from `example`');
    if (!$statement) {
        var_dump($pdo->errorInfo());
        exit(1);
    }
    $all = $statement->fetchAll(PDO::FETCH_NUM);
    var_dump($all);
} catch (Throwable $e) {
    echo (string) $e;
}

return 0;
