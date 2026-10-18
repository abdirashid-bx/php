
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- Single Choice -->
    <form method="post">

        <select name="single">
            <option value="">Choose Residence</option>
            <option value="Muqdisho">Muqdisho</option>
            <option value="Hargeysa">Hargeysa</option>
            <option value="Kismayo">Kismayo</option>
            <option value="Marko">Marko</option>
        </select><br>

        <input type="submit" name="submit1" value="Register">

    </form>

    <?php
    if (isset($_POST['submit1'])) {
        if (!empty($_POST['single'])) {
            echo $_POST['single'];
        } else {
            echo "Please choose a residence";
        }
    }
    ?>

    <br><br>

    <!-- Multiple Choice -->
    <form method="post">

        <select name="multiple[]" multiple size="5">
            <option value="" disabled>Choose Residence</option>
            <option value="Muqdisho">Muqdisho</option>
            <option value="Hargeysa">Hargeysa</option>
            <option value="Kismayo">Kismayo</option>
            <option value="Marko">Marko</option>
        </select><br>

        <input type="submit" name="submit2" value="Register">

    </form>

    <?php
    if (isset($_POST['submit2'])) {
        if (!empty($_POST['multiple'])) {
            foreach ($_POST['multiple'] as $r) {
                echo "$r, ";
            }
        } else {
            echo "Please choose a residence";
        }
    }
    ?>

</body>
</html>