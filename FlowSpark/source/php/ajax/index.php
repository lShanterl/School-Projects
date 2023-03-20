<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <style>
        body{
            margin: 0px;
        }
        .temp{
            width: 100%;
            height: 100vh;
            background-color: #181818;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            flex-direction: column;
        }
        .temp h1{
            color: white;
        }
        #content{
            color: white;
            font-size: 20px;
        }
        .text{
            color: white;
            font-size: 20px;
        }
    </style>

</head>
<body>
    <div class='temp'>
        <h1>SEARCH</h1>
        <input type="text" onkeyup="imu(this.value)" placeholder="live search">
        <div id="content">
            result...
        </div>
        <div class="text">

        </div>
    </div>
    <script type='text/javascript'>
        let content = document.getElementById('content');
        let text = document.querySelector('.text');

        function imu(x)
        {
            if (x.length == 0)
            {
                content.innerHTML = 'empty';
            }
            else{
                text.innerHTML = x;
                var XML = new XMLHttpRequest();
                
                XML.onreadystatechange = () =>
                {
                    if (XML.readyState == 4 && XML.status == 200)
                    {
                        content.innerHTML = XML.responseText;
                    }

                    XML.open('GET', 'search.php?q=' + x, true);
                    XML.send();
                }
            }
        }
    </script>
</body>
</html>