
    <head>
        <link rel="stylesheet" type="text/css" href="style/proProfile.css" />

        <script type="text/javascript" src="js/proProfile.js"></script>
        <script>
            $(function() {
                $( "#accordion" ).accordion();
            });
        </script>
    </head>
    <div id="bigmid">
        <div class="alignright">
                <a href="index.php?controller=proprofile&url=home">BACK</a>
        </div>
        <div id="accordion">
            <h3><?php echo BASIC_PROFILE;?></h3>
            <div class="wide">
                <form id="form1" >
                    <table>
                        <tr>
                            <td><?php echo CAREER_OBJECTIVE;?></td>
                            <td>
                                <textarea name="career_objective"  rows="3" cols="60"><?php echo $arrData['professional_profile']['career_objective'];
                                ?></textarea>
                            </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td><?php echo COMPANY_NAME ;?></td>
                            <td><input type="text" value="<?php echo $arrData['professional_profile']['company']; ?>" name="company" maxlength="250"/></td>
                        </tr>
                        <tr>
                            <td><?php echo PRO_DESIGNATION; ?></td>
                            <td><input type="text" value="<?php echo $arrData['professional_profile']['designation']; ?>" name="designation" maxlength="250"/></td>
                        </tr>
                        <tr>
                            <td><?php echo PROFICIENCY; ?> </td>
                            <td>
                                <textarea name="proficiency" rows="3" cols="60"><?php echo $arrData['professional_profile']['proficiency'];
                                ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo SKILLS; ?></td>
                            <td>
                                <textarea name="skills" rows="3" cols="60"><?php echo $arrData['professional_profile']['skills'];
                                ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo INFORMATION; ?></td>
                            <td>
                                <textarea name="information" rows="3" cols="60"><?php echo $arrData['professional_profile']['information'];
                                ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="proSubmit" colspan="2" >
                                <input type="button" onclick="set('form1')" value="Update" />
                            </td>
                        </tr>
                    </table>
             
                </form>
       
            </div>
            <h3><?php echo QUALIFICATIONS; ?></h3>
            <div class="wide">
                <form id="form2" >
                <?php
                $qual=$arrData['qualification'];
                 //echo "<pre>";
                 //print_r($qual);
                ?>
                    <table>
                        <caption><?php echo strtoupper("Add New Qualification");?></caption>
                        <tr>
                           <td><?php echo strtoupper("Class/Degree/Diploma :"); ?></td>
                           <td><input type="text" name="class"/></td>
                        </tr></div>
                        <tr>
                            <td><?php echo strtoupper("Qualification Type :");?></td>
                            <td>
                                <select name="qualification_type">
                                    <option ><?php echo strtoupper("Select");?></option>
                                    <option><?php echo strtoupper("Under Graduation");?></option>
                                    <option><?php echo strtoupper("Graduation");?></option>
                                    <option><?php echo strtoupper("Post Graduation");?></option>
                                    <option><?php echo strtoupper("Diploma");?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo strtoupper("School/Institute :");?></td>
                            <td><input type="text" name="institute"/></td>
                        </tr>
                        <tr>
                            <td><?php echo strtoupper("Board/University :");?></td>
                            <td><input type="text" name ="university"/></td>
                        </tr>
                        <tr>
                            <td><?php echo strtoupper("Start Year :");?></td>
                            <td><input type="text" name="start_year"/></td>
                        </tr>
                        <tr>
                            <td><?php echo strtoupper("End Year :");?></td>
                            <td><input type="text" name="end_year"/></td>
                        </tr>
                        <tr>
                            <td><?php echo strtoupper("Percentage :");?></td>
                            <td><input type="text" name="percentage"/></td>
                        </tr>
                        <tr>
                            <td><?php echo strtoupper("Major Subjects :");?></td>
                            <td><textarea name="subject_studied" rows="3" cols="60"></textarea></td>
                        </tr>
                        <tr>
                            <td><?php echo strtoupper("Field :");?></td>
                            <td><input type="text" name="field"/></td>
                        </tr>
                        <tr>
                            <td class="proSubmit" colspan="2" >
                                <input type="button" value="<?php echo SUBMIT;?>" onclick="insertQual('form2')" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <h3><?php echo RESUME; ?></h3>
            <div class="wide">
                <form id="form3" onsubmit="return uploadResume(this.id)" enctype="multipart/form-data" >
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