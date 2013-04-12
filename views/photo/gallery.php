
<div id="bigmid">
	<div class='bluebutton'><span class='fontsize20 marginl10'>Gallery</span></div>
	
<script src="flex/jquery.flexslider-min.js"></script>
<link rel="stylesheet" href="flex/flexslider.css" type="text/css" media="screen" />
	<script type="text/javascript">
		$(window).load(function() {
			$('.flexslider').flexslider();
		});
	</script>
	<br> 
	<a href="<?php echo ROOTPATH."photo/newPhoto";?>" >Upload New Photos</a>
	<br><br>
	<div class="flexslider">
	    <ul class="slides">
	    <?php 
	    $i=0;
	    if(isset($arrData)) {
 	    foreach($arrData as $val ) {
            if($val['path']!="") {
	        echo "<li>";
	        echo "<img id='imggal' align='center' src='".$val['path']."' />";
	        echo "	<p class='flex-caption'>
	        <input type='button' id='". $val['id'] ."' onclick='loadPhotoComment(this.id)'value='Load Comments' >
	        </p>";
	         
	        echo "<div id='dvcomment" . $val ['id'] . "' >";
	         
	        foreach ( $val['comment'] as $value ) {
	            $c = 1; break;
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
	            echo "<input type=hidden value=" . $val ['id']  . " id=buzz_id name=buzz_id >";
	            
	            echo '<br><input type="text" id="comment' . $val ['id'] . '" name=comment_text
                   		  class="comment"
 	                        		  placeholder="Post Comment..." />';
	            echo '<input type="button" id="' . $val['id'] . '"
		value="Comment" name=submit onclick=setPhotoComment(this.id) class="submit"> ';
	            
	            echo "<br/><br/><br/><br/><br/><br/><br/><br/><hr>";
	        echo "</li>";
	        }
	    } 
	    } else {
        echo NRF;
    }
	    ?>
	    	<!-- <li>
	    		<img src="flex/demo-stuff/inacup_samoa.jpg" /><p class="flex-caption">Captions and cupcakes. Winning combination.</p>
	    	</li>
	    	<li>
	    		<a href="http://flex.madebymufffin.com"><img src="flex/demo-stuff/inacup_pumpkin.jpg" /></a>
	    	
	    	</li>
	    	<li>
	    		<img src="flex/demo-stuff/inacup_donut.jpg" />
	    	</li>
	    	<li>
	    		<img src="flex/demo-stuff/inacup_vanilla.jpg" />
	    	</li> -->
	    </ul>
	  </div>
</div>
