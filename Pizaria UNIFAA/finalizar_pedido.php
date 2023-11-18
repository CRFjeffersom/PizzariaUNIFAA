<?php
session_start(); // Iniciar a sessão para manter o estado do carrinho

// Verificar se o carrinho está vazio
if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
    header("Location: carrinho.php");
    exit();
}



// Limpar o carrinho
unset($_SESSION["cart"]);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Pedido - Pizzaria UNIFAA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Pizzaria UNIFAA</h1>
        <nav>
            <ul>
                <?php
                    $pages = array("Home" => "index.php", "Cardápio" => "cardapio.php", "Contato" => "contato.php");

                    foreach ($pages as $title => $url) {
                        echo "<li><a href=\"$url\">$title</a></li>";
                    }
                ?>
                <li><a href="carrinho.php">Carrinho</a></li>
            </ul>
        </nav>
    </header>

    <section class="content">
        <h2>Pedido Finalizado</h2>
        <p>Obrigado por escolher a Pizzaria UNIFAA! Seu pedido foi recebido.</p>
        <a href="index.php">Voltar para a página inicial</a>
    </section>

    <footer>
        <p>&copy; 2023 Pizzaria UNIFAA. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
