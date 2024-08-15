<?php
$output="";
$cookie_name1 = "val";
$cookie_value1 = "";
$cookie_name2 = "op";
$cookie_value2 = "";
$cookie_name3 = "output";

if (isset($_POST['val'])) {
    $num = $_POST['input'] . $_POST['val'];
} else {
    $num = "";
}

if (isset($_POST['op'])) {
    $cookie_value1 = $_POST['input'];
    setcookie($cookie_name1, $cookie_value1, time() + (86400 * 30));

    $cookie_value2 = $_POST['op'];
    setcookie($cookie_name2, $cookie_value2, time() + (86400 * 30));
    $num = "";
    $output = $cookie_value1 . $cookie_value2;
    setcookie($cookie_name3,$output,time() + (86400 * 30));
}

if (isset($_POST['result'])) {
    $num = $_POST['input'];
    $output = $_COOKIE['output'] . $num ."=";
    switch ($_COOKIE['op']) {
        case '+':
            $result = floatval($_COOKIE['val']) + $num;
            break;
        case '-':
            $result = floatval($_COOKIE['val']) - $num;
            break;
        case '*':
            $result = floatval($_COOKIE['val']) * $num;
            break;
        case '/':
            if ($num != 0) {
                $result = floatval($_COOKIE['val']) / $num;
            } else {
                echo "Error: Division by zero";
                $result = 0;
            }
            break;
        case '%':
            if ($num != 0) {
                $result = (floatval($_COOKIE['val']) / $num) * 100;
            } else {
                echo "Error: Division by zero";
                $result = 0;
            }
            break;
        default:
            echo "Error: Invalid operator";
            $result = 0;
    }
    $num = $result;
}

if(isset($_POST['seq']))
    {
        $num = $_POST['input'];
        $result = pow($num, 2);
        $output = "sqr($num) =";
        $num = $result;
        
    }
    
if(isset($_POST['root']))
{
    $num = $_POST['input'];
    if ($num != 0) {
        $result = pow($num, 1 / 2);
    } else {
        echo "Error: Root of zero";
        $result = 0;
    }
    $output = "sqrt($num) =";
    $num = $result;
}

if(isset($_POST['1byx']))
{
    $num = $_POST['input'];
    if ($num != 0) {
        $result = 1 / $num;
    } else {
        echo "Error: Division by zero";
        $result = 0;
    }
    $output = "1/$num =";
    $num = $result;
}

if(isset($_POST['sign']))
    { $num = $_POST['input'];
        $result = $num * -1;
        $num = $result;
    }

if (isset($_POST['delete'])) {
    $num = substr($_POST['input'], 0, -1);
}

if (isset($_POST['clear'])) {
    $num = "";
}

if (isset($_POST['allclear'])) {
    $num = "";
    $output = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="calstyle.css">
</head>
<body>
    <div class="calculator">
    <form action="calculator.php" method="post">
        <div class="calarea">
                <input type="text" name="output" id="top" autocomplete="off" disabled value="<?php echo $output ?>"><br>
                <input type="text" name="input" id="bottom" autocomplete="off" value="<?php echo $num ?>">
        </div>
        <div class="input">
                <button type="submit" name="percent" class="button"  value="%">%</button>
                <button type="submit" name="allclear" class="button" >CE</button>
                <button type="submit" name="clear" class="button"  >C</button>
                <button type="submit" name="delete" class="button"  >&#x232B;</button>
                <button type="submit" name="1byx"class="button"  >1/x</button>
                <button type="submit" name="seq" class="button"  >x<sup>2</sup></button>
                <button type="submit" name="root" class="button" ><sup>2</sup>&#8730;x</button>
                <button type="submit" name="op" class="button" value="/">&divide;</button>
                <button type="submit" name="val" class="button" value="7">7</button>
                <button type="submit" name="val" class="button" value="8">8</button>
                <button type="submit" name="val" class="button" value="9">9</button>
                <button type="submit" name="op" class="button" value="*">&times;</button>
                <button type="submit" name="val" class="button" value="6">6</button>
                <button type="submit" name="val" class="button"  value="4">4</button>
                <button type="submit" name="val" class="button" value="5">5</button>
                <button type="submit" name="op" class="button" value="-">-</button>
                <button type="submit" name="val" class="button" value="1">1</button>
                <button type="submit" name="val" class="button" value="2">2</button>
                <button type="submit" name="val" class="button" value="3">3</button>
                <button type="submit" name="op" class="button" value="+" >+</button>
                <button type="submit" name="sign" class="button" >+/-</button>
                <button type="submit" name="val" class="button" value="0">0</button>
                <button type="submit" name="val" class="button" value=".">.</button>
                <button type="submit" name="result" class="button">=</button>
        </div>
        </form>
    </div>
</body>
</html>