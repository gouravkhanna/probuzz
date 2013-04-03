
<?php

echo "<div id=dvresbig >";
echo "<hr/>Based on User Name <hr/>";
if (! empty ( $arrData )) {
    foreach ( $arrData ["username"] as $key => $val ) {
        if ($val ['id'] != "") {
            $res = "<a href='" . ROOTPATH . "index.php?controller=friends&url=friendsProfile&friendId=" . $val ['id'] . "' >";
            $res .= "<div id=dvres class=round20>";
            $res .= "<img class='imgcenter floatl round5 margin' src=" . ROOTPATH . $val ['path'] . " height=50 width=50 >";
            $res .= "<aside >" . $val ['first_name'] . "</aside><aside> " . $val ['last_name'] . "<aside></div>";
            $res .= "</a>";
            echo $res;
        }
    }
}
echo "</div>";
echo "<div id=dvresbig >";
echo "<hr/>Based on Name <hr/>";
    if (! empty ( $arrData )) {
    foreach ( $arrData ["name"] as $key => $val ) {
        if ($val ['id'] != "") {
            $res = "<a href='" . ROOTPATH . "index.php?controller=friends&url=friendsProfile&friendId=" . $val ['id'] . "' >";
            $res .= "<div id=dvres class=round20>";
            $res .= "<img class='imgcenter floatl round5' src=" . ROOTPATH . $val ['path'] . " height=50 width=50 >";
            $res .= "<aside >" . $val ['first_name'] . "</aside>";
            $res .= "<aside> " . $val ['last_name'] . "<aside></div>";
            $res .= "</a>";
            echo $res;
        }
    }
}
echo "</div>";
echo "<div id=dvresbig >";
echo "<hr/>Based on Company <hr/>";
if (! empty ( $arrData )) {
    foreach ( $arrData ["company"] as $key => $val ) {
        if ($val ['id'] != "") {
            $res = "<a href='" . ROOTPATH . "index.php?controller=corporatecontroller&url=showProfile&corpId=" . $val ['id'] . "' >";
            $res .= "<div id=dvres class=round20>";
            $res .= "<img class='imgcenter floatl round5' src=" . ROOTPATH . $val ['path'] . " height=50 width=50 >";
            $res .= "<aside >" . $val ['company_name'] . "</aside>";
            $res .= "<aside class=calign> " . $val ['company_alias'] . "<aside></div>";
            $res .= "</a>";
            echo $res;
        }
    }
    echo "</div>";
}
?>

