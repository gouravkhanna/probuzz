<div id="midpanel">
<?php

$count = 1;
if (! empty ( $arrData )) {
    foreach ( @$arrData as $row ) {
        
        $pa = @$row ['buzz'] ['path'];
        $date = @strtotime ( $row ['buzz'] ['buzz_time'] );
        $buzzId=$row['buzz']['buzz_id'];
        echo '<div id=buzzdel' . $buzzId.'></div>';
        echo '<div id=buzz' . $buzzId.'>';
        echo '<div id="statusimg' . $count . '"class="statusimg">';
        echo "<a href='index.php?controller=friends&url=friendsProfile&friendId=" . $row ['buzz'] ['id'] . "' >";
        echo "<img class='round5' src='" .ROOTPATH. $pa . "' height='50px' width='50px'/></a></div>";
        echo '<div id="statusName' . $count . '"class="statusName"> <a href="   ">';
        echo $row ['buzz'] ['first_name'] . " " . $row ['buzz'] ['last_name'] . "</a>";
        echo "<span class='floatr marginr10 cursor1' onclick=buzzDelete('$buzzId')>X   </span>";
        echo "<span class='date' title='".date('H:i:A',$date)."'>" . date ( 'D-M-Y', $date ) . "</span></div>";
        echo '<div id="statusText' . $count . '"class="statusText">' . $row ['buzz'] ['buzztext'];
        echo "<a href='".ROOTPATH."status/buzz/".base64_encode($buzzId)."' class='floatr marginr10 cursor1' >link</a>";
        echo "</div><br>";
       
        echo "<div id='dvcomment" . $row ['buzz'] ['buzz_id'] . "' >";
        
        foreach ( $row ['comment'] as $value ) {
            $c = 1;
            echo "<br>";
            if (is_array ( $value )) {
                echo '<br><div id="cmmnt' . $c . '"class="comments"><span class="x">';
                echo "<img class='round5 imgcenterm' src='" .ROOTPATH. $value ['path'] . "' height='30px' width='30px'/>";
                echo "<a href='" . ROOTPATH . "index.php?controller=friends&url=friendsProfile&friendId=" . $value ['id'] . "' >";
                echo $value ['first_name'] . " " . $value ['last_name'];
                echo "</a>";
                echo "<span class='spancomment'> ";
                echo $value ['comment_text'];
                $timeAgo=time_elapsed ($value['comment_time']);
                if($timeAgo=="") {
                    $timeAgo="Just Now";
                }
                echo "</span><span class=floatr title='".date('d-M-Y',$value['comment_time'])."'>".$timeAgo."</span></div>";
                $c ++;
            }
        }
        
        echo "</div>";
        
        echo "<input type=hidden value=comment name=url />";
        echo "<input type=hidden value=status name=controller /><br>";
        echo "<input type=hidden value=" . $row ['buzz'] ['buzz_id'] . " id=buzz_id name=buzz_id >";
        
        echo '<br><input type="text" id="comment' . $row ['buzz'] ['buzz_id'] . '" name=comment_text
                   		  class="comment" 
 	                        		  placeholder="Post Comment..." />';
        echo '<input type="button" id="' . $row ['buzz'] ['buzz_id'] . '"

 	                       	value="Comment" name=submit onclick=setComment(this.id) class="submit"> ';
        
        echo "<hr>";
        $count ++;
        echo "</div>";
    }
} else {
    echo "NO Buzz To display";
}
?>
</div>
<script>
</script>