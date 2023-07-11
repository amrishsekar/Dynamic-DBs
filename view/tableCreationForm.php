<!DOCTYPE html>
<html>
<head>
    <title>Table Creation Page</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #1e1e1e;
            color: #fff;
        }
        .container {
            max-width: 600px;
            margin: 60px auto;
            padding: 20px 40px;
            background-color: #333;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;
            color: #fff;
        }
        h2{
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
        }

        .form-group .columnName,
        .form-group select {
            width: 47%;
            padding: 10px;
            border: none;
            border-radius: 3px;
            background-color: #555;
            color: #fff;
            font-size: 16px;
        }
        .form-group .dblists,
        .form-group .tableName{
            width: 520px;
            padding: 10px;
            border: none;
            border-radius: 3px;
            background-color: #555;
            color: #fff;
            font-size: 16px;
        }
        .add-more, .back {
            color: #fff;
            cursor: pointer;
            background-color: #007bff;
            padding: 10px 30px;
            text-decoration: none;
            border-radius: 7px;
        }
        .form-group button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 3px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .other-btn{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .inputAndSelect{
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Table Creation Page</h1>
    <div class="form-group">
        <form action="/createTable" method="post">
            <h2>Select Database</h2>
            <select  class="dblists" name="dbname" id="dbname">
                <option value="common">Select Database</option>
                <?php foreach ($allDatabases as $list): ?>
                    <option value="<?= $list->Database; ?>"><?= $list->Database; ?></option>
                <?php endforeach;?>
            </select>
            <br>
            <h2>Table Name</h2>
            <input type="text" name="tableName" class="tableName" placeholder="Enter Table name...">

            <h2>Add Columns</h2>
            <div class="listOfColumnInputs">
                <div class="inputAndSelect">
                    <input type="text" name="columnName[]" class="columnName" placeholder="Enter Column name...">
                    <select name="datatype[]">
                        <option value="int">INT</option>
                        <option value="varchar(255)">VARCHAR(255)</option>
                        <option value="timestamp">timestamp</option>
                    </select>
                </div>
            </div>
            <button type="submit">Create Table</button>
            <br>
            <div class="other-btn">
                <p class="add-more" onclick="addInput()">Add one more Column...!</p>
                <a class="back" href="/">Back</a>
            </div>
        </form>
    </div>
</div>

<script>
    function addInput() {
        const listOfInputs = document.querySelector(".listOfColumnInputs");

        let div = document.createElement('div');
        div.classList.add("inputAndSelect");
        div.innerHTML = `
            <input type="text" name="columnName[]" class="columnName" placeholder="Enter Column name...">
            <select name="datatype[]">
                <option value="int">INT</option>
                <option value="varchar(255)">VARCHAR(255)</option>
                <option value="timestamp">timestamp</option>
            </select>
        `;

        listOfInputs.appendChild(div);
    }
</script>
</body>
</html>

