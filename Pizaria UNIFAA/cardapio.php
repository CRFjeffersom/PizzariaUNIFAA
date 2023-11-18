<?php
session_start(); // sessão para manter o estado do carrinho

// Verificar se o formulário de adicionar ao carrinho foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {
    // Adicionar a pizza ao carrinho
    $pizza_id = $_POST["pizza_id"];
    $pizza_name = $_POST["pizza_name"];

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    // Adicionar a pizza ao carrinho
    $_SESSION["cart"][$pizza_id] = $pizza_name;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio - Pizzaria UNIFAA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Pizzaria UNIFAA</h1>
        <nav>
            <ul>
                <?php
                    $pages = array("Inicio" => "index.php", "Cardápio" => "cardapio.php", "Contato" => "contato.php");

                    foreach ($pages as $title => $url) {
                        echo "<li><a href=\"$url\">$title</a></li>";
                    }
                ?>
                <li><a href="carrinho.php">Carrinho</a></li>
            </ul>
        </nav>
    </header>

    <section class="content">
        <h2>Cardápio de Pizzas</h2>
        <?php
            // Adicione mais pizzas conforme necessário
            $pizzas = array(
                1 => array("Margherita", "margherita.jpg"),
                2 => array("Calabresa", "calabresa.jpg"),
                3 => array("Quatro Queijos", "quatro_queijos.jpg")
            );

            foreach ($pizzas as $id => $pizza) {
                $pizza_name = $pizza[0];
                $pizza_image = $pizza[1];

                echo "<div class=\"pizza\">
                        <img src=\"images/$pizza_image\" alt=\"$pizza_name\">
                        <p>$pizza_name</p>
                        <form method=\"post\" action=\"cardapio.php\">
                            <input type=\"hidden\" name=\"pizza_id\" value=\"$id\">
                            <input type=\"hidden\" name=\"pizza_name\" value=\"$pizza_name\">
                            <button type=\"submit\" name=\"add_to_cart\">Adicionar ao Carrinho</button>
                        </form>
                      </div>";
            }
        ?>
    </section>

    <footer>
        <p>&copy; 2023 Pizzaria UNIFAA. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
