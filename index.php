<html>
<body>

    <h1>Hello, from PRINCESS LORAINE BARTOLOME!</h1>

    <h3>My First PHP Program</h3>
    <?php
        echo "Hello, World!";
    ?>

    <h3>PHP Variables</h3>
    <?php
        $x = 15;
        $y = 3;
        $sum = $x + $y;

        echo "The sum is $sum.";
    ?>

    <h3>Simple Arithmetic Operations</h3>
    <?php
        $x = 15;
        $y = 3;

        $sum = $x + $y;
        $difference = $x - $y;
        $product = $x * $y;
        $quotient = $x / $y;

        echo "The sum is $sum.<br>";
        echo "The difference is $difference.<br>";
        echo "The product is $product.<br>";
        echo "The quotient is $quotient.<br>";
    ?>

    <h3>Conditional Statement</h3>
    <?php
        $x = 15;
        $y = 3;

        if ($x % $y == 0) {
            echo "$y is a factor of $x";
        } else {
            echo "$y is not a factor of $x";
        }
    ?>

    <h3>PHP Loops</h3>
    <?php
        echo "<b>Multiples of 3 from 1 to 100: </b><br>";
        for ($i = 1; $i <= 100; $i++) {
            if ($i % 3 == 0) {
                echo "$i <br>";
            }
        }

        echo "<br>";

        echo "<b>Multiples of 5 from 1 to 100: </b><br>";
        for ($i = 1; $i <= 100; $i++) {
            if ($i % 5 == 0) {
                echo "$i <br>";
            }
        }
    ?>

    <h3>Arrays</h3>
    <?php
        $products = array("Product A", "Product B", "Product C");
        var_dump($products);
    ?> 

    <br>

    <?php
        $products = array("Product A", "Product B", "Product C");
        echo $products[0];
    ?>

    <br>

    <?php
        $products = array("Product A", "Product B", "Product C");
        $products[1] = "Product D";

        var_dump($products);
    ?>

    <br><br>

    <?php
        $products = array("Product A", "Product B", "Product C");

        foreach ($products as $p) {
            echo "$p <br>";
        }
    ?>

    <br>

    <?php
        $products = array("name" => "Product A", "price" => 10.50, "stock" => 12);
        echo $products["name"];
    ?>

    <br><br>

    <?php
        $products = array(
            array("name" => "Product A", "price" => 10.50, "stock" => 12),
            array("name" => "Product B", "price" => 5.60, "stock" => 7),
            array("name" => "Product C", "price" => 7.00, "stock" => 5)
        );

        foreach ($products as $p) {
            echo $p["name"] . " is " . $p["price"] . " pesos <br>";
        }
    ?>

</body>
</html>
