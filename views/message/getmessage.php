<div id="messagebox">

<?php
// ffunction return time diffrence from current time

echo "<pre>";
// print_r($arrData);
if (! empty ( $arrData ) && ! empty ( $arrData ['0'] )) {
    $friend_id = @$_SESSION ['friend_idm'];
    $arrData=array_reverse($arrData);
    echo "<input type='hidden' id='friendz' value='$friend_id' >";
    foreach ( $arrData as $val ) {
        if (! empty ( $val )) {
           
            echo "<div id='message1'>";
            if($val['id']==$_SESSION['id']) {
                echo "<img class='imgcenter floatl round5' src='" . ROOTPATH . $val ['path'] . "' height=40 width=40 >";
            } else {
                echo "<img class='imgcenter floatr round5' src='" . ROOTPATH . $val ['path'] . "' height=40 width=40 >";
            }
            if($val['id']==$_SESSION['id']) {
            echo "<aside id='msghead' class=floatl>";
            echo $val ['first_name'] ." ". $val ['last_name'];
            echo "<aside>".time_elapsed ( $val ['message_time'] )."</aside>";
            echo "</aside>";
            echo "<aside id='msgcontent' class='msgcontent-left'>";
            echo $val ['message'];
            echo "</aside>";
            echo "</div>";
            } else {
                echo "<aside id='msghead' class=floatr>";
                echo $val ['first_name'] ." ". $val ['last_name'];
                echo "<aside>".time_elapsed ( $val ['message_time'] )."</aside>";
                echo "</aside>";
                echo "<aside id='msgcontent' class='msgcontent-right' >";
                echo $val ['message'];
                echo "</aside>";
                echo "</div>";
            }
           
        }
    }
} else {
    echo NO_MESSEGES;
}

?>


</div>