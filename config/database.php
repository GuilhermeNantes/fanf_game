<!-- conexão com o banco de dado sem aprendo kk -->
 <?php 



 $host = "localhost"; //servidor da conexao do banco de dado 
 $dbname = "fanf_game"; // None do banco de dado
 $user = "root"; // usuario do banco de dado
 $pass = "senha123"; // senha do banco de dado

 try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (PDOException $e) {
    die("errro ao conectar com o banco de dado". $e->getMessage());
 }