<?PHP
foreach ( @$arrData as $row ) {
    $c = 1;
    echo "<br>";
    foreach ( $row as $value ) {
    if (is_array ( $value )) {
                $commentId=base64_encode($value['id']);
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
}

?>