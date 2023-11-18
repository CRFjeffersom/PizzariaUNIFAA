<?php
session_start(); // sessão para manter o estado do carrinho

// Verificar se o carrinho está vazio
if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
    $cart_empty = true;
} else {
    $cart_empty = false;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - Pizzaria UNIFAA</title>
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
        <h2>Carrinho de Compras</h2>
        <?php
            if ($cart_empty) {
                echo "<p>O seu carrinho está vazio.</p>";
            } else {
                echo "<ul>";
                foreach ($_SESSION["cart"] as $pizza) {
                    echo "<li>$pizza</li>";
                }
                echo "</ul>";
            }
        ?>
        <a href="finalizar_pedido.php">Finalizar Pedido</a>
    </section>

    <footer>
        <p>&copy; 2023 Pizzaria UNIFAA. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
