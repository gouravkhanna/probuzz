<h1><?php echo APPLICANTS_FOR_JOB;?></h1>
<hr />
<div id=dvrsesbig class=marginl20>

<?php
if (! empty ( $arrData ) && ! empty ( $arrData ['0'] )) {
    foreach ( $arrData as $key => $val ) {
        if ($val ['id'] != "") {
            $res = "<a href='" . ROOTPATH . "index.php?controller=friends&url=friendsProfile&friendId=" . $val ['id'] . "' >";
            $res .= "<div id=dvres class=round20>";
            $res .= "<img class='imgcenter floatl round5 margin' src=" . ROOTPATH . $val ['path'] . " height=50 width=50 >";
            $res .= "<aside >" . $val ['first_name'] . "</aside><aside> " . $val ['last_name'] . "<aside></div>";
            $res .= "</a>";
            echo $res;
        }
    }
} else {
    echo NO_APPLICATION_RECIEVED;
}

?>
</div>