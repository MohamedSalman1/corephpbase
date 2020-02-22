https://websitebeaver.com/php-pdo-prepared-statements-to-prevent-sql-injection

$dsn = "mysql:host=localhost;dbname=myDatabase;charset=utf8mb4";
$options = [
  PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];
try {
  $pdo = new PDO($dsn, "username", "password", $options);
} catch (Exception $e) {
  error_log($e->getMessage());
  exit('Something weird happened'); //something a user can understand
}


$stmt = $pdo->prepare("UPDATE myTable SET name = :name WHERE id = :id");
$stmt->execute([':name' => 'David', ':id' => $_SESSION['id']]);
$stmt = null;

$stmt = $pdo->prepare("UPDATE myTable SET name = ? WHERE id = ?")->execute([$_POST['name'], $_SESSION['id']]);
$stmt = null;


$stmt = $pdo->prepare("DELETE FROM myTable WHERE id = ?");
$stmt->execute([$_SESSION['id']]);
$stmt = null;

$stmt = $pdo->prepare("UPDATE myTable SET name = ? WHERE id = ?");
$stmt->execute([$_POST['name'], $_SESSION['id']]);
echo $stmt->rowCount();
$stmt = null;

$stmt = $pdo->prepare("INSERT INTO myTable (name, age) VALUES (?, ?)");
$stmt->execute([$_POST['name'], 29]);
echo $pdo->lastInsertId();
$stmt = null;

ALTER TABLE myTable ADD CONSTRAINT unique_person UNIQUE (name, age)

$stmt = $pdo->prepare("SELECT * FROM myTable WHERE id <= ?");
$stmt->execute([5]);
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(!$arr) exit('No rows');
var_export($arr);
$stmt = null;


$arr = [];
$stmt = $pdo->prepare("SELECT * FROM myTable WHERE id <= ?");
$stmt->execute([5]);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $arr[] = $row;
}
if(!$arr) exit('No rows');
var_export($arr);
$stmt = null;


$stmt = $pdo->prepare("SELECT first_name, squat, bench_press FROM myTable WHERE weight > ?");
$stmt->execute([200]);
$arr = $stmt->fetchAll(PDO::FETCH_NUM);
if(!$arr) exit('No rows');
var_export($arr);
$stmt = null;


$stmt = $pdo->prepare("SELECT id, name, age FROM myTable WHERE name = ?");
$stmt->execute([$_POST['name']]);
$arr = $stmt->fetch();
if(!$arr) exit('No rows');
var_export($arr);
$stmt = null;


$stmt = $pdo->prepare("SELECT height FROM myTable WHERE id < ?");
$stmt->execute([500]);
$heights = $stmt->fetchAll(PDO::FETCH_COLUMN);
if(!$heights) exit('No rows');
var_export($heights);
$stmt = null;


$stmt = $pdo->prepare("SELECT id, name FROM myTable WHERE age < ?");
$stmt->execute([25]);
$arr = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
if(!$arr) exit('No rows');
var_export($arr);
$stmt = null;


$stmt = $pdo->prepare("SELECT eye_color, name, weight FROM myTable WHERE age < ?");
$stmt->execute([35]);
$arr = $stmt->fetchAll(PDO::FETCH_GROUP);
if(!$arr) exit('No rows');
var_export($arr);
$stmt = null;


