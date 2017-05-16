<html>
    <head>
        <title>Speak</title>
    </head>
    <body>
        <?php
        if($words){
            $link=mysql_connect('ecsmysql','cs431s25','ixupeijo');
            mysql_select_db('cs431s25');
            $time=date(y).date(m).date(d).date(h).date(i).date(s);
            $str = "INSERT INTO Chat(chtime,user,words)values('$time','$user','$words')";
            mysql_query($str,$link);
        }
        //close connection
        mysql_close($link);
        ?>
        //message input form
        <form action ="speak.php" method="post">
        <input type="text" name="words" cols="20">
        <input type="submit" value="speak">
        </form>
    </body>
</html>
