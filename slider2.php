<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .scrolling_text1 {
            height: 30px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
            background-color: #ede4ff;
        }

        /* .text {
            font-size: 2vw;
            font-weight: 700;
            text-transform: uppercase;
            color: #3A1240;
        } */

        .text1 span {
            margin: 0 40px;
        }

        @keyframes animate_text {
            from {
                transform: translate3d(0, 0, 0);
            }

            to {
                transform: translate3d(-100%, 0, 0);
            }
        }

        .text1 {
            font-size: 15px;
            font-weight: 700;
            text-transform: uppercase;
            color: #3A1240;
            animation: animate_text 45s linear infinite;
            /* The animation property */
        }
        .slideContent{
            display: flex;
            align-items: center;
            justify-content: center;
            
        }
    </style>
</head>

<body class="slideContent col-12">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="scrolling_text1 col-11">
        <div class="text1">
            <span>&#128293; Black Friday Sale  25% OFF</span>
            <span>&#128293; Black Friday Sale  25% OFF</span>
            <span>&#128293; Black Friday Sale  25% OFF</span>
            <span>&#128293; Black Friday Sale  25% OFF</span>
            <span>&#128293; Black Friday Sale  25% OFF</span>
        </div>
        <div class="text1">
            <span>&#128293; Black Friday Sale  25% OFF</span>
            <span>&#128293; Black Friday Sale  25% OFF</span>
            <span>&#128293; Black Friday Sale  25% OFF</span>
            <span>&#128293; Black Friday Sale  25% OFF</span>
            <span>&#128293; Black Friday Sale  25% OFF</span>
        </div>
    </div>
    </div>
    
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>