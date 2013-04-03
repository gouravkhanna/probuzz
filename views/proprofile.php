<div class="fancybox">
	<div class="box">

	</div>
</div>

<div id="bigmid">
    <div class="fright">
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
        
        <div id="displayQual" class="wide">
         
        
        </div>
        <h3><?php echo CERTIFICATIONS; ?></h3>
        <div id="displayCertifications" class="wide">
            
        </div>
        <h3><?php echo EXPERIENCE; ?></h3>
        <div id="displayExperience" class="wide">
            
        </div>
        <h3><?php echo RESUME; ?></h3>
        <div class="wide">
            <div id="content">
                <form action="http://localhost/probuzz/trunk/class/upload.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
                         <p id="f1_upload_process" >Loading...<br/><img src="<?php echo ROOTPATH."data/rcs/loader.gif"?>" /><br/></p>
                         <p id="f1_upload_form" align="center"><br/>
                             <label>File:  
                                  <input name="myfile" type="file" size="30" />
                             </label>
                             <label>
                                 <input type="submit" name="submitBtn"  value="Upload" />
                             </label>
                         </p>
                         
                         <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                </form>
            </div>
          
        </div>
    </div>
</div>