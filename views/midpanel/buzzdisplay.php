<div id="buzzpanel"> 
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
        if( $row ['buzz'] ['id']==@$_SESSION['id']) {
            echo "<span class='floatr marginr10 cursor1' onclick=buzzDelete('$buzzId')>X   </span>";
        } else {
            echo "<span class='floatr marginr10 cursor1' onclick=markBuzzSpam('$buzzId')>
                  SPAM
                    </span>";
        }
        echo "<span class='date' title='".date('H:i:A',$date)."'>" . date ( 'D-M-Y', $date ) . "</span></div>";
        echo '<div id="statusText' . $count . '"class="statusText">' . $row ['buzz'] ['buzztext'];
        echo "<a href='".ROOTPATH."status/buzz/".base64_encode($buzzId)."' class='floatr marginr10 cursor1' >link</a>";
        echo "</div><br>";
        if($row['like']['user_like']>=1) {
            echo '<div id=buzzlike' . $buzzId.'>You & '.($row['like']['total_like']-1).' people like this</div>';
            $visble1="visiblen";
            $visble2="visibley";
        } else {
            echo '<div id=buzzlike' . $buzzId.'>'.$row['like']['total_like'].' people like this</div>';
            $visble2="visiblen";
            $visble1="visibley";
        }
        echo "<input type=button class=$visble2 id=buzzunlikebtn$buzzId onclick=buzzUnLike('$buzzId') value=UnLike>";
        echo "<button class=$visble1 id=buzzlikebtn$buzzId onclick=buzzLike('$buzzId') >Like</button>";
         
     //   echo "<button id=buzzUnlikebtn2' . $buzzId.' onclick=buzzUnLike('$buzzId') >UnLike</button>";
     //   echo "<button id=buzzlikebtn2' . $buzzId.' onclick=buzzLike('$buzzId') >Like</button>";
        echo "<div id='dvcomment" . $row ['buzz'] ['buzz_id'] . "' >";
       
        foreach ( $row ['comment'] as $value ) {
            $c = 1;
            echo "<br>";
            if (is_array ( $value )) {
                $commentId=$value['id'];
                echo '<div id=commentdel' . $commentId.'></div>';
                echo '<br><div id="cmmnt' . $commentId . '"class="comments"><span class="x">';
                echo "<img class='round5 imgcenterm' src='" .ROOTPATH. $value ['path'] . "' height='30px' width='30px'/>";
                echo "<a href='" . ROOTPATH . "index.php?controller=friends&url=friendsProfile&friendId=" . $value ['user_id'] . "' >";
                echo $value ['first_name'] . " " . $value ['last_name'];
                echo "</a>";
                echo "<span class='spancomment'> ";
                echo $value ['comment_text'];
                $timeAgo=time_elapsed ($value['comment_time']);
                if($timeAgo=="") {
                    $timeAgo="Just Now";
                }
                echo "</span><span class=floatr title='".date('d-M-Y',$value['comment_time'])."'>".$timeAgo."</span>";
                if( $value['user_id']==@$_SESSION['id']) {
                   
                    echo "<span class='floatr marginr10 cursor1' onclick=commentDelete('$commentId')>X   </span>";
                }
                echo "</div>";
                $c++;
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
    echo NO_BUZZ_TO_DISPLAY;
}

?>
</div>
