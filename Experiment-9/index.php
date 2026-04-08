<?php
$result = "";
$table = [];

if(isset($_POST['action'])){

    $num1 = $_POST['num1'] ?? 0;
    $num2 = $_POST['num2'] ?? 0;
    $action = $_POST['action'];

    switch($action){

        case "add":
            $result = "Result: " . ($num1 + $num2);
            break;

        case "sub":
            $result = "Result: " . ($num1 - $num2);
            break;

        case "mul":
            $result = "Result: " . ($num1 * $num2);
            break;

        case "div":
            if($num2 != 0){
                $result = "Result: " . ($num1 / $num2);
            } else {
                $result = "❌ Cannot divide by zero!";
            }
            break;

        case "square":
            $result = "Square of $num1 = " . ($num1 * $num1);
            break;

        case "cube":
            $result = "Cube of $num1 = " . ($num1 * $num1 * $num1);
            break;

        case "table":
            for($i = 1; $i <= 10; $i++){
                $table[] = "$num1 x $i = " . ($num1 * $i);
            }
            break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Smart Calculator</title>

<style>
body{
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg,#1e3c72,#2a5298);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.box{
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(15px);
    padding:30px;
    border-radius:15px;
    box-shadow:0 15px 30px rgba(0,0,0,0.3);
    text-align:center;
    width:360px;
    color:white;
    transition:0.3s;
}

.box:hover{
    transform: scale(1.02);
}

.top-bar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:10px;
}

h2{
    margin:0;
    font-size:20px;
}

input{
    padding:12px;
    width:85%;
    margin:8px;
    border:none;
    border-radius:8px;
    outline:none;
}

button{
    padding:10px;
    margin:5px;
    border:none;
    color:white;
    cursor:pointer;
    border-radius:6px;
    transition:0.3s;
}

button:hover{
    transform: scale(1.05);
}

.btn-add{background:#28a745;}
.btn-sub{background:#dc3545;}
.btn-mul{background:#007bff;}
.btn-div{background:#ffc107;color:black;}
.btn-extra{background:#6f42c1;}
.btn-table{background:#17a2b8;}

.btn-clear{
    background:#ff4d4d;
    padding:8px 12px;
    font-size:12px;
}

.result{
    margin-top:20px;
    text-align:left;
    background: rgba(255,255,255,0.1);
    padding:10px;
    border-radius:8px;
    min-height:40px;
}
</style>

</head>

<body>

<div class="box">

<!-- TOP BAR -->
<div class="top-bar">
    <h2>✨ Smart Calculator</h2>
    <button type="button" class="btn-clear" onclick="clearOutput()">Clear</button>
</div>

<form method="POST">

<input type="number" name="num1" placeholder="Enter first number" required><br>
<input type="number" name="num2" placeholder="Enter second number (optional)"><br>

<button class="btn-add" name="action" value="add">Add</button>
<button class="btn-sub" name="action" value="sub">Subtract</button>
<button class="btn-mul" name="action" value="mul">Multiply</button>
<button class="btn-div" name="action" value="div">Divide</button><br>

<button class="btn-extra" name="action" value="square">Square</button>
<button class="btn-extra" name="action" value="cube">Cube</button><br>

<button class="btn-table" name="action" value="table">Table</button>

</form>

<div class="result" id="resultBox">

<?php
if($result != ""){
    echo "<h3>$result</h3>";
}

if(!empty($table)){
    echo "<h3>Multiplication Table:</h3>";
    foreach($table as $row){
        echo $row . "<br>";
    }
}
?>

</div>

</div>

<script>
function clearOutput() {
    document.querySelector('input[name="num1"]').value = "";
    document.querySelector('input[name="num2"]').value = "";
    document.getElementById("resultBox").innerHTML = "";
    document.querySelector('input[name="num1"]').focus();
}
</script>

</body>
</html>