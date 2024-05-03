<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .box {
            position: absolute;
            top: -5%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #72e434a8;
            padding: 8px;
            display: flex;
            align-items: center;
            border-radius: 500px;
            pointer-events: none;
            transition: 0.2s;
            z-index: 9999999;
        }

        .box .image {
            background-color: #fff;
            padding: 10px 12px;
            border-radius: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .box .image img {
            width: 15px;
            height: 15px;
        }

        .box .message {
            font-size: 0vw;
            margin: 0px 0px;
            color: #000;
            transition: 0.2s;
            font-family: Arial, Helvetica, sans-serif;
        }

        .click {
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 10px;
            color: #000;
            background-color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .container .click:active {
            background-color: #e2e2e2;
        }
    </style>

</head>

<body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>

</html>