<!DOCTYPE html>
<html>
<head>
    <title>Create Database Form Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #fff;
        }

        .container {
            max-width: 400px;
            margin: 60px auto;
            padding: 40px;
            background-color: #222;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input[type="text"] {
            width: 95%;
            padding: 10px;
            border: none;
            border-radius: 3px;
            background-color: #444;
            color: #fff;
            font-size: 16px;
        }

        .form-group button {
            border-radius: 7px;
            font-weight: bold;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            outline: none;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
        a{
            color: white;
            background-color: #007bff;
            padding: 10px 30px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 7px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Create Database Form</h1>
    <form action="/createDb" method="post">
        <div class="form-group">
            <input type="text" name="createDB" autocomplete="off" placeholder="Create DB name..." required>
        </div>
        <div class="form-group">
            <button type="submit">Create Database</button>
        </div>
        <a href="/">Back</a>
    </form>
</div>
</body>
</html>
