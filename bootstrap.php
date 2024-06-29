<?php
include 'conectar.php'; 
$pdo = conectar();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css <rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
<div class="container mt-5">
    <form method="post">
        <div class="form-group">
            <label>Login</label>
            <input type="text" class="form-control" name="Nome" placeholder="Entre com o nome" required>
            <label>Nome</label>
            <input type="text" class="form-control" name="email" placeholder="Entre com o email" required>
            <label>email</label>
            <input type="text" class="form-control" name="senha" placeholder="Entre com a senha" required>
            <label>senha</label>
            <input type="text" class="form-control" name="descricao" placeholder="Entre com a descrição" required>
            <label>descricao</label>

        </div>
        <button type="submit" name="btnAdd" class="btn btn-primary">Adicionar</button>
    </form>
</div>
</body>
</html>

<?php

if (isset($_POST['btnAdd'])) {

    $senha_use = $_POST['senha'];
    $nome_use = $_POST['nome'];
    $email_use = $_POST['email'];
    $desc_use = $_POST['descricao'];


    if (!empty ($senha_use, $nome_use, $email_use, $desc_use)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO User (senha_use, nome_use, email_use, desc_use) VALUES (:senha_use, :nome_use, :email_use, desc_use)");
            $stmt->bindParam(':descricao', $desc_use, ':nome_use', $nome_use, ':email_use', $email_use, ':senha_use', $senha_use);
            $stmt->execute();
            echo "Grupo adicionado com sucesso!";
        } catch (\PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    } else {
        echo "Descrição não pode ser vazia!";
    }
}
?>

<div class="container mt-5">
    <h2>Login</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
    <?php

    try {

        $sql = "SELECT * FROM tb_user";
        $stmt = $pdo->query($sql);
       
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id_use']) . "</td>";
            echo "<td>" . htmlspecialchars($row['senha_use']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email_use']) . "</td>";
            echo "<td>" . htmlspecialchars($row['desc_use']) . "</td>";
            echo "</tr>";
        }
    } catch (\PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
    ?>
</tbody>

    </table>
</div>