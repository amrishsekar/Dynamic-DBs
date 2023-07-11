<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: #fff;
        }

        .container {
            max-width: 600px;
            margin: 60px auto;
            padding: 40px;
            background-color: #333;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group button {
            width: 100%;
            font-weight: bold;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 7px;
            color: #fff;
            font-size: 16px;
            outline: none;
            cursor: pointer;
        }
        .row{
            background-color: #222;
            color: white;
            padding: 25px 30px 1px 30px;
            border-radius: 5px;
        }
        .form-group select {
            outline: none;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 7px;
            background-color: #555;
            color: #fff;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Welcome to the Home Page</h1>
    <div class="form-group">
        <form action="/dbForm" method="post">
            <button type="submit">Create Database</button>
        </form>
    </div>
    <div class="form-group">
        <form action="/tableForm" method="post">
            <button type="submit">Create Table</button>
        </form>
    </div>
    <div class="row form-group">
        <form action="/viewTables" method="post">

            <div class="form-group">
                <select  name="dbname" id="dbname">
                    <option value="common">Select Database</option>
                    <?php foreach ($allDatabases as $list): ?>
                        <option value="<?= $list->Database; ?>"><?= $list->Database; ?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">View Tables</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
