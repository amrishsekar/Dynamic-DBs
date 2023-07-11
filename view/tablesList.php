<!DOCTYPE html>
<html>
<head>
        <style>
            body {
                background-color: #292929;
                color: #ffffff;
                font-family: Arial, sans-serif;
            }

            .container {
                width: 400px;
                margin: 60px auto;
                padding: 20px;
                background-color: #333333;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            }

            h1 {
                text-align: center;
                margin-bottom: 20px;
            }

            form {
                margin-top: 20px;
            }

            select, button {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: none;
                border-radius: 5px;
            }

            select {
                background-color: #555555;
                color: #ffffff;
            }

            button {
                background-color: #4CAF50;
                color: #ffffff;
                cursor: pointer;
            }
            form div label{
                display: block;
                margin-bottom: 5px;
                font-size: 18px;
                font-weight: bold;
                color: #fff;
            }
            input{
                width: 95%;
                padding: 10px;
                border: none;
                border-radius: 3px;
                background-color: #555;
                color: #fff;
                font-size: 16px;
            }
        </style>
    <title>Row Insertion Page</title>
</head>
<body>
<div class="container">
    <h1>In Database <?= $_SESSION['dbname']; ?> select table to insert row</h1>
    <form action="/fetchColumns" method="post">
        <input type="text" name="dbname" value="<?= $_SESSION['dbname'] ?>" hidden>
        <div class="form-group">
            <select  name="tableName" id="dbname">
                <option value="common">Select Table</option>
                <?php foreach ($allTables as $list): ?>
                    <option value="<?= $list; ?>"><?= $list; ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" name="show">Show columns</button>
        </div>
    </form>
</div>

<div class="container">
<?php if (isset($_POST['show'])): ?>
<form action="/insertValue" method="post">
    <input type="text" name="dbname" value="<?= $_SESSION['dbname'] ?>" hidden>
    <input type="text" name="tableName" value="<?= $_SESSION['tableName'] ?>" hidden>
    <?php foreach ($allColumns as $column): ?>
    <div>
        <label><?= $column['Field'] ?></label>
        <input type="text" hidden name="col_name[]" value="<?= $column['Field'] ?>">
        <input name="col_value[]" type="text" placeholder="Enter details...">
    </div>
    <br>
    <?php endforeach; ?>
    <button type="submit">Add Row</button>
</form>
<?php endif; ?>
</div>
</body>
</html>


<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>Row Insertion Page</title>-->
<!--    <style>-->
<!--        body {-->
<!--            background-color: #292929;-->
<!--            color: #ffffff;-->
<!--            font-family: Arial, sans-serif;-->
<!--        }-->
<!---->
<!--        .container {-->
<!--            width: 400px;-->
<!--            margin: 0 auto;-->
<!--            padding: 20px;-->
<!--            background-color: #333333;-->
<!--            border-radius: 5px;-->
<!--            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);-->
<!--        }-->
<!---->
<!--        h1 {-->
<!--            text-align: center;-->
<!--            margin-bottom: 20px;-->
<!--        }-->
<!---->
<!--        form {-->
<!--            margin-top: 20px;-->
<!--        }-->
<!---->
<!--        select, button, input[type="text"] {-->
<!--            width: 100%;-->
<!--            padding: 10px;-->
<!--            margin-bottom: 10px;-->
<!--            border: none;-->
<!--            border-radius: 5px;-->
<!--        }-->
<!---->
<!--        select {-->
<!--            background-color: #555555;-->
<!--            color: #ffffff;-->
<!--        }-->
<!---->
<!--        button {-->
<!--            background-color: #4CAF50;-->
<!--            color: #ffffff;-->
<!--            cursor: pointer;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--<div class="container">-->
<!--    <h1>In Database --><?//= $_SESSION['dbname']; ?><!--, select a table to insert a row</h1>-->
<!--    <form action="/fetchColumns" method="post">-->
<!--        <input type="text" name="dbname" value="--><?//= $_SESSION['dbname'] ?><!--" hidden>-->
<!--        <div class="form-group">-->
<!--            <select name="tableName" id="dbname">-->
<!--                <option value="common">Select Table</option>-->
<!--                --><?php //foreach ($allTables as $list): ?>
<!--                    <option value="--><?//= $list; ?><!--">--><?//= $list; ?><!--</option>-->
<!--                --><?php //endforeach;?>
<!--            </select>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <button type="submit" name="show">Show columns</button>-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->
<!---->
<?php //if (isset($_POST['show'])): ?>
<!--    <form action="/insertValue" method="post">-->
<!--        <input type="text" name="dbname" value="--><?//= $_SESSION['dbname'] ?><!--">-->
<!--        <input type="text" name="tableName" value="--><?//= $_SESSION['tableName'] ?><!--">-->
<!--        --><?php //foreach ($allColumns as $column): ?>
<!--            <h4>--><?//= $column['Field'] ?><!--</h4>-->
<!--            <input type="text" hidden name="col_name[]" value="--><?//= $column['Field'] ?><!--">-->
<!--            <input name="col_value[]" type="text" placeholder="Enter details...">-->
<!--        --><?php //endforeach; ?>
<!--        <button type="submit">Add Row</button>-->
<!--    </form>-->
<?php //endif; ?>
<!--</body>-->
<!--</html>-->
