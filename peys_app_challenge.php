<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
</head>
<body>
    <h1>Peys App</h1>

    <form method="post">
        <label for="photoSize">Select Photo Size: </label>
        <input type="range" name="photoSize" id="photoSize"><br>
        <label for="borderColorPicker">Select Border Color:</label>
        <input type="color" name="borderColorPicker" id="borderColorPicker">
        <button type="submit" name="processButton">Process</button><br><br>

        <?php 
        if (isset($_POST['processButton'])) { 
            $selectedBorderColor = $_POST['borderColorPicker'];
            $selectedSize = $_POST['photoSize'];
        } 
        ?>
        <img src="emphraim.png" alt="" width="<?php echo empty($selectedSize) ? '20' 
        : $selectedSize; ?>%" height="<?php echo empty($selectedSize) ? '20' 
        : $selectedSize; ?>%" style="border:5px solid <?php echo empty($selectedBorderColor) ? '#000000' 
        : $selectedBorderColor; ?>;">
    </form>

</body>
</html>