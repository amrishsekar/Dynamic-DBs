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

<?php if (isset($_POST['show'])): ?>

<div class="container">
<form action="/insertValue" method="post">
    <input type="text" name="dbname" value="<?= $_SESSION['dbname'] ?>" hidden>
    <input type="text" name="tableName" value="<?= $_SESSION['tableName'] ?>" hidden>
    <?php foreach ($allColumns as $column): ?>
    <div>
        <label><?= $column['Field'] ?></label>
        <input type="text" name="col_name[]" value="<?= $column['Field'] ?>" hidden>
        <input name="col_value[]" autocomplete="off" type="text" placeholder="Enter details..." required>
    </div>
    <br>
    <?php endforeach; ?>
    <button type="submit">Add Row</button>
</form>
</div>
<?php endif; ?>

</body>
</html>