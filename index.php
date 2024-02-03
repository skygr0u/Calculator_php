<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caculator</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="number" name="num01" placeholder="Number 1">
        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="num02" placeholder="Number 2">
        <button>Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // Grab data from inputs
        $num01 = filter_input(INPUT_POST,"num01", FILTER_SANITIZE_NUMBER_FLOAT);
        $num02 = filter_input(INPUT_POST,"num02", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST["operator"]);

        // Error handlers
        $error = false;
        if (empty($num01) || empty($num02) || empty($operator)){
            echo"<p>Fill in all Fields </p>";
            $error = true;
        }
        if (!is_numeric($num01) || !is_numeric($num02)){
            echo"<p>Only Numbers </p>";
            $error = true;
        }

        // Calculate the Numbers
        if (!$error){
            $value = 0;
            switch ($operator){
                case "add":
                    $value = $num01 + $num02;
                    break;
                case "subtract":
                    $value = $num01 - $num02;
                    break;
                case "multiply":
                    $value = $num01 * $num02;
                    break;   
                case "divide":
                    $value = $num01 / $num02;
                    break; 
                default:
                echo"<p> Something went wrong :( </p>";
            }

        echo"<p> Result = ". $value ."</p>";

        }

    }
    ?>
</body>
</html>