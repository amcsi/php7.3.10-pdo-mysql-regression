# PHP 7.3.10 Regression

Due to fix of https://bugs.php.net/bug.php?id=41997

```sh
docker-compose up
```

PHP 7.3.10 result:

```
array(3) {
  [0]=>
  string(5) "HY000"
  [1]=>
  int(2014)
  [2]=>
  string(269) "Cannot execute queries while other unbuffered queries are active.  Consider using PDOStatement::fetchAll().  Alternatively, if your code is only ever going to run against mysql, you may enable query buffering by setting the PDO::MYSQL_ATTR_USE_BUFFERED_QUERY attribute."
}
```

PHP 7.3.9 result (changing the PHP version in the Dockerfile):
```
array(2) {
  [0]=>
  array(1) {
    [0]=>
    string(1) "1"
  }
  [1]=>
  array(1) {
    [0]=>
    string(1) "2"
  }
}
```
