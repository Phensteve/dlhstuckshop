<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/dlhs1.jpg" type="image/x-icon">
    <script src="_files/kit.fontawesome.com_dfd5e51db2.js"></script>
    <style type="text/css">
    </style>
        <script>
        var message = "Don't even try to copy the page 😉😂😂😂😂";

        function cLick_All() { if (document.all) { alert(message); return false; } }
        function clickDis(e) {
            if
                (document.layers || (document.getElementById && !document.all)) {
                if (e.which == 2 || e.which == 3) { alert(message); return false; }
            }
        }
        if (document.layers) { document.captureEvents(Event.MOUSEDOWN); document.onmousedown = clickDis; }
        else { document.onmouseup = clickDis; document.oncontextmenu = cLick_All; }

        document.oncontextmenu = new Function("return false")
    </script>
</head>
