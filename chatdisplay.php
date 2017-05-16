<html>

<head>
    <title>Dispaly Messages</title>
    <meta http-equiv="refresh" content="5;url=display.php"> </head>

<body>
    <?php
        $link = mysql_connect('ecsmysql','cs431s25','ixupeijo');
        mysql_select_db('cs431s25',$link);
        $str="select * from chat ORDER BY chtime";

$result=mysql_query($str, $link);

$rows=mysql_num_rows($result);

//get the latest 15 messages

@mysql_data_seek($resut,$rows-15);

//if the number of messages<15, get all of the messages

if ($rows<15) $l=$rows; else $l=15; for ($i=1;$i<=$l; $i++) {
list($chtime, $nick, $words)=mysql_fetch_row($result);
echo $chtime; echo " "; echo $nick; echo":" ; echo $words; echo " ";
}
//delete the old messages(only keep the newest 20 only)
@mysql_data_seek($result,$rows-20);
list($limtime)=mysql_fetch_row($result);
$str="DELETE FROM chat WHERE chtime<'$limtime'";
$result=mysql_query($str,$link_ID);
    //close the connection
    mysql_close($link);

    ?>
</body>

</html>
