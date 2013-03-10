
    <head>
        <link rel="stylesheet" type="text/css" href="style/proProfile.css" />

        <script type="text/javascript" src="js/proProfile.js"></script>
        <script>
            $(function() {
                $( "#accordion" ).accordion();
            });
        </script>
    </head>
    <div id="mid">
            <div id="accordion">
            <h3><?php echo BASIC_PROFILE;?></h3>
            <div>
                <form id="form1" onsubmit="return set(this.id)">
                    <table>
                        <tr>
                            <td><?php echo CAREER_OBJECTIVE;?></td>
                            <td><textarea name="career_objective" rows="2" cols="30"></textarea></td>
                        </tr>
                        <tr>
                            <td><?php echo COMPANY_NAME ;?></td>
                            <td><input type="text" name="company" maxlength="250"/></td>
                        </tr>
                        <tr>
                            <td><?php echo PRO_DESIGNATION; ?></td>
                            <td><input type="text" name="designation" maxlength="250"/></td>
                        </tr>
                        <tr>
                            <td><?php echo PROFICIENCY; ?> </td>
                            <td><textarea name="proficiency" rows="2" cols="30"></textarea></td>
                        </tr>
                        <tr>
                            <td><?php echo SKILLS; ?></td>
                            <td><textarea name="skills" rows="2" cols="30"></textarea></td>
                        </tr>
                        <tr>
                            <td><?php echo INFORMATION; ?></td>
                            <td><textarea name="information" rows="2" cols="30"></textarea></td>
                        </tr>
                        <tr>
                            <td class="proSubmit" colspan="2" >
                                <input type="submit" value="<?php echo SUBMIT;?>" />
                            </td>
                        </tr>
                    </table>
                </form>
       
            </div>
            <h3><?php echo QUALIFICATIONS; ?></h3>
            <div>
                <form id="form2" onsubmit="return set(this.id)">
                    <table>
                        <tr>
                            
                        </tr>
                        <tr>
                            <td>sdfasdf:</td>
                            <td><input type="text"/></td>
                        </tr>
                        <tr>
                            <td class="proSubmit" colspan="2" >
                                <input type="submit" value="<?php echo SUBMIT;?>"  />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <h3><?php echo RESUME; ?></h3>
            <div>
                <form action="class/processUpload.php" method="post" enctype="multipart/form-data" >
                    <table><label for="resume"><?php echo FILE;?></label>
                        <tr>
                            <td><input type="file" name="resume" id="file"></td>
                        </tr>
                        <tr>
                            <td class="proSubmit"><input type="submit" value="<?php echo SUBMIT;?>"></td>
                        </tr>
                    </table>
                </form>
              
            </div>
        </div>
</div>