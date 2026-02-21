<!DOCTYPE html>
<html>
<head>
    <title>RealEstateHomes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background: #f2f2f2;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
        }

        nav a {
            text-decoration: none;
            margin-left: 15px;
            color: black;
        }

        .content {
            padding: 40px 30px;
        }

        footer {
            background: #f2f2f2;
            text-align: center;
            padding: 10px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    @include('user.top')

    <div class="content">
        <h2>About page</h2>
        <p>
            We help you find affordable and quality homes. 
            Contact us to explore available properties and get expert guidance.
        </p>
    </div>

    <footer>
        © {{ date('Y') }} RealEstateHomes
    </footer>

</body>
</html>
