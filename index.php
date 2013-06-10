<?php
/*
 * @author Raymond Byczko
 * @file toolboxhtml5/index.php
 * @start_date 2013
 * @purpose This is the main file indicating various things done
 * in the toolboxhtml5.  This is a setting to explore html5 etc.
 */
?>
<html>
<title>toolboxhtml5</title>
<head>
</head>
<body>
<style type="text/css">
div#redbox {
width: 100px;
height: 20px;
background: -webkit-linear-gradient(left, red, yellow 20%, yellow 80%, red);
background: linear-gradient(to right, red, yellow 20%, yellow 80%, red)
}

div#blackbox {
width: 100px;
height: 20px;
background: -webkit-linear-gradient(left, black, white 20%, white 80%, black);
background: linear-gradient(to right, black, white 20%, white 80%, black)
}

div#purplebox {
width: 100px;
height: 20px;
background: -webkit-linear-gradient(left, purple, red 20%, red 80%, purple);
background: linear-gradient(to right, purple, red 20%, red 80%, purple)
}


div#greenbox {
width: 100px;
height: 20px;
background: -webkit-linear-gradient(left, green, red 20%, red 80%, purple);
background: linear-gradient(to right, green, red 20%, red 80%, purple)
}

div#rainbow {
width: 100px;
height: 20px;
background: -webkit-linear-gradient(left, green, red 20%, yellow 60%, white 80%, purple);
background: linear-gradient(to right, green, red 20%, yellow 60%, white 80%, purple)
}

div#testharnessa {
width: 100px;
height: 20px;
background: -webkit-linear-gradient(left, green, red 10%, yellow 20%, white 80%, purple);
background: linear-gradient(to right, green, red 10%, yellow 20%, white 80%, purple)
}

</style>
</head>
<body>
<div id=redbox style="position: absolute; left: 150px; top: 50px" onclick="window.location='cssfun/unusual.php';">
</div>
<div id=blackbox style="position: absolute; left: 150px; top: 90px" onclick="window.location='cssfun/thingsradial.php';">
</div>
<div id=purplebox style="position: absolute; left: 150px; top: 130px" onclick="window.location='cssfun/borderradial.php';">
</div>
<div id=greenbox style="position: absolute; left: 150px; top: 170px" onclick="window.location='cssfun/movedcenterradial.php';">
</div>
<div id=rainbow style="position: absolute; left: 150px; top: 210px" onclick="window.location='cssfun/rainbow.php';">
</div>
<div id=testharnessa style="position: absolute; left: 150px; top: 250px" onclick="window.location='cssfun/tha_radiallib.php';">
</div>
</body>
</html>
