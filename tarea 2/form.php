<html>
<head>
    <title>Formulario en PHP7</title>
</head>

<body>

<?php 

    include('form_poo.php');
    $registro = new Form();
    $registro->nuevoRegistro();
    $datos = $registro->datos;
    $error = $registro->error;

?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name" value="<?php echo $datos['name'];?>">
    <span class="error">* <?php echo $error['name'];?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $datos['email'];?>">
    <span class="error">* <?php echo $error['email'];?></span>
    <br><br>
    Website: <input type="text" name="website" value="<?php echo $datos['website'];?>">
    <span class="error"><?php echo $error['website'];?></span>
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $datos['comment'];?></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($datos['gender']) && $datos['gender']=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($datos['gender']) && $datos['gender']=="male") echo "checked";?> value="male">Male
    <span class="error">* <?php echo $error['gender'];?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php

echo "<h2>Your Input:</h2>";
echo $datos['name'];
echo "<br>";
echo $datos['email'];
echo "<br>";
echo $datos['website'];
echo "<br>";
echo $datos['comment'];
echo "<br>";
echo $datos['gender'];
?>

<ul>
    <li><a href="form.php">Volver al Inicio</a></li>
</ul>
</body>
</html>
