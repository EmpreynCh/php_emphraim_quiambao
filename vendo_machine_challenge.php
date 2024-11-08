<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
</head>
<body>

    
    
    <form method="post">
        <h1>Vendo Machine</h1>

        <fieldset>
            <legend>Products: </legend>
            <?php
        
                $beverages = [
                    'Coke' => 15,
                    'Sprite' => 20,
                    'Royal' => 20,
                    'Pepsi' => 15,
                    'Mountain Dew' => 20
                ];
        
             
                $sizeOptions = [
                    'Regular' => 0,
                    'Up-Size' => 5,
                    'Jumbo' => 10
                ];
                if (isset($beverages)) {
                    foreach ($beverages as $drink => $price) {
                        echo '<input type="checkbox" name="selectedDrinks[]" id="drink_' . $drink . '" value="' . $drink . '">';
                        echo '<label for="drink_' . $drink . '"> ' . $drink . ' - ₱' . $price . '</label><br>';
                    }
                }
            ?>
        </fieldset>

        <fieldset>
            <legend>Options: </legend>
            <label for="sizeSelection">Size</label>
            <select name="sizeSelection" id="sizeSelection">
                <?php 
                    foreach ($sizeOptions as $sizeName => $additionalCost) {
                        if ($sizeName != 'Regular') {
                            echo '<option value="' . $sizeName . '">' . $sizeName . ' (add ₱' . $additionalCost . ')</option>';
                        } else {
                            echo '<option value="' . $sizeName . '">' . $sizeName . '</option>';
                        }
                    }
                ?>
                <option value=""></option>
            </select>

            <label for="itemQuantity">Quantity</label>
            <input type="number" name="itemQuantity" id="itemQuantity" min="1" value="0">
            <button type="submit" name="checkoutButton">Check out</button>
        </fieldset>
    </form>

    <?php
        if (isset($_POST['checkoutButton'])) {
                $selectedItems = $_POST['selectedDrinks'];
                $chosenSize = $_POST['sizeSelection'];
                $itemCount = $_POST['itemQuantity'];
                $totalCost = 0;
                $totalItems = 0;
                ?>
                <hr>
                <h1>Purchase Summary: </h1>
                <ul>
                    <?php foreach ($selectedItems as $item) { ?>
                        <?php 
                            $costForItem = ($beverages[$item] + $sizeOptions[$chosenSize]) * $itemCount;
                            $totalCost += $costForItem;
                            $totalItems += $itemCount;
                        ?>
                        <li>
                            <?php echo $itemCount . ' piece(s) of ' . $item . ' amounting to ₱' . $costForItem; ?>
                        </li>
                    <?php } ?>
                </ul>
                <b>Total Number of Items: <?php echo $totalItems; ?></b><br>
                <b>Total Amount: ₱<?php echo $totalCost; ?></b>
    <?php
            
        }
    ?>

</body>
</html>