<?php
if (isset($_POST['submit']))
{
   myfnc();
}
function myfnc()
{
    echo "Hello world" ;
}
?>
<form action="#" method="post">
<input type="submit" name="submit" value="submit">
</form>