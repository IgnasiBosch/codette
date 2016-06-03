<!DOCTYPE html>
<html>
<head>
    <title>Codette</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
            font-weight: 100;
            font-family: 'Lato';
        }

        .problem {
            color: black !important;
            font-size: 153%;
            margin: auto;
            padding-top: 2%;
            padding-bottom: 5%;
            text-align: left;
            width: 75%;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        a:link, a:active, a:visited, a:hover {
            color: black;
            text-decoration: none;
        }

        .btn {
            margin: 0 0 20px;
            border: none;
            padding: 5px;
            cursor: pointer;
            color: #d2d2d2;
            background-color: #606060;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">{{ $language }}</div>
        <div class="problem">
            <button class="btn" onclick="javascript:location.reload()">Change Challenge</button>
            <br>
            <a href="{{ $url  }}" target="_blank">({{ $randomProblemNumber  }})</a>
            {!! $problem !!}
        </div>
    </div>
</div>
</body>
</html>
