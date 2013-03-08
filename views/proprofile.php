<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style/proProfile.css" />

        <script type="text/javascript" src="js/proProfile.js"></script>
        <script>
            $(function() {
                $( "#accordion" ).accordion();
            });
        </script>
    </head>
    <body >
        <div id="accordion">
            <h3><?php echo BASIC_PROFILE;?></h3>
            <div>
                <form id="form1" onsubmit="return set(this.id)">
                    <table>
                        <tr>
                            <td><?php echo CAREER_OBJECTIVE;?></td>
                            <td><textarea name="careerObjective" rows="1" cols="30"></textarea></td>
                        </tr>
                        <tr>
                            <td><?php echo COMPANY_NAME ;?></td>
                            <td><input type="text" name="company" maxlength="250"/></td>
                        </tr>
                        <tr>
                            <td><?php echo DESIGNATION; ?></td>
                            <td><input type="text" name="designation" maxlength="250"/></td>
                        </tr>
                        <tr>
                            <td><?php echo PROFICIENCY; ?> </td>
                            <td><textarea name="proficiency" rows="1" cols="30"></textarea></td>
                        </tr>
                        <tr>
                            <td><?php echo SKILLS; ?></td>
                            <td><textarea name="skills" rows="1" cols="30"></textarea></td>
                        </tr>
                        <tr>
                            <td><?php echo INFORMATION; ?></td>
                            <td><textarea name="information" rows="1" cols="30"></textarea></td>
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
                <form name="form2" onsubmit="return set(this.name)">
                    <table>
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
                
              
            </div>
        </div>
    </body>
</html>
