$(document)
        .ready(
                function() {

                    $("#editc").click(function() {
                        $("#bigmid").css("background-color", "lightgray");
                        $("#2").fadeTo("fast", 0.1);
                        $("#edit_contact").show();

                    });

                    $("#editf").click(function() {
                        $("#bigmid").css("background-color", "lightgray");
                        $("#2").fadeTo("fast", 0.1);
                        $("#edit_w").show();

                    });
                    $("#editb").click(function() {
                        $("#bigmid").css("background-color", "lightgray");
                        $("#2").fadeTo("fast", 0.1);
                        $("#edit_b").show();

                    });

                    $("#edite").click(function() {
                        $("#bigmid").css("background-color", "lightgray");
                        $("#2").fadeTo("fast", 0.1);
                        $("#edit_e").show();

                    });

                    $("#close").click(function() {
                        $("#edit_contact").hide();
                        $("#2").css("opacity", "5");
                        $("#bigmid").css("background-color", "white");

                    });
                    $("#close5").click(function() {
                        $("#new_contact").hide();
                        $("#2").css("opacity", "5");
                        $("#bigmid").css("background-color", "white");

                    });

                    $("#close6").click(function() {
                        $("#new_education").hide();
                        $("#2").css("opacity", "5");
                        $("#bigmid").css("background-color", "white");

                    });

                    $("#close1").click(function() {

                        $("#edit_i").hide();
                        $("#2").css("opacity", "1");
                        $("#bigmid").css("background-color", "white");

                    });

                    $("#close2").click(function() {

                        $("#edit_w").hide();
                        $("#2").css("opacity", "1");
                        $("#bigmid").css("background-color", "white");

                    });

                    $("#close3").click(function() {

                        $("#edit_e").hide();
                        $("#2").css("opacity", "1");
                        $("#bigmid").css("background-color", "white");

                    });

                    $("#close4").click(function() {

                        $("#edit_b").hide();
                        $("#2").css("opacity", "1");
                        $("#bigmid").css("background-color", "white");

                    });

                    $("#adde")
                            .click(
                                    function test() {
                                        $("#tb")
                                                .append(
                                                        "<br><b> Insitute </b><br><input type='text' ><br><b> Start Date</b><br><input type='text'  id='i'><br><b> End Date</b><br><input type='text' id='e'><br><b>University</b><br><input type='text' id='u' role='button'>");
                                        $("#i").datepicker({
                                            dateFormat : 'yy-mm-dd'
                                        });

                                        $("#e").datepicker({
                                            dateFormat : 'yy-mm-dd'
                                        });

                                    });
                $(".personal_datepicker").datepicker({
                        dateFormat : 'yy-mm-dd'
                });
                    //$("#dob").datepicker({
                    //    dateFormat : 'yy-mm-dd'
                    //});
                    //$("#start_date").datepicker({
                    //    dateFormat : 'yy-mm-dd'
                    //});
                    //$("#end_date").datepicker({
                    //    dateFormat : 'yy-mm-dd'
                    //});
                    //$("#istart").datepicker({
                    //    dateFormat : 'yy-mm-dd'
                    //});
                    //
                    //$("#iend").datepicker({
                    //    dateFormat : 'yy-mm-dd'
                    //});
                    $("#addEducation").click(function() {

                        $("#new_education").show();
                        $("#2").fadeTo("fast", 0.1);
                        $("#bigmid").css("background-color", "lightgray");
                    });

                    $("#addContact").click(function() {

                        $("#new_contact").show();
                        $("#2").fadeTo("fast", 0.1);
                        $("#bigmid").css("background-color", "lightgray");
                    });
// //////////////////////////////////////////////
// /////////////////RAHUL
                    $("#submitCon1").click(function () {
                        if(!$("#newinstitute").val()) {
                            setErrorMessage("#newinstitute","This Field Can't Be Empty.");
                            return false;
                        }
                        if(onlySpacesA("newinstitute")) {
                            setErrorMessage("#newinstitute","Only Spaces Not Allowed.");
                            return false;                            
                        }
                        if(!correctDate("newistart","Date Format Invalid(yyyy-mm-dd)")) {
                            return false;
                        }
                        if(!correctDate("newiend","Date Format Invalid(yyyy-mm-dd)")) {
                            return false;
                        }
                        var start=$("#newistart").val();
                        var end=$("#newiend").val();
                        if(!dateDifference(start,end)) {
                            setErrorMessage("#newiend","End Date Can't Be Less Than Start Date");
                            return false;
                        }
                        if(!$("#newuniversity").val()) {
                            setErrorMessage("#newuniversity","This Field Can't Be Empty.");
                            return false;
                        }
                        if(onlySpacesA("newuniversity")) {
                            setErrorMessage("#newuniversity","Only Spaces Not Allowed.");
                            return false;                            
                        }
                        return true;
                        
                    });
                    $("#submitCon2").click(function () {
                        if(isNaN($("#nepincode").val())) {
                            setErrorMessage("#nepincode","Only Numbers Allowed.");
                            return false;
                        }
                        if(onlySpacesA("necity","City Can't Be Empty.")==true) {
                            return false;
                        }
                        if(onlySpacesA("necountry","Country Can't Be Empty.")==true) {
                            return false;
                        }
                        return true;
                    });
                    $("#bInfo").click(function (){
                        if(!correctDate("dob","Date Format Invalid(yyyy-mm-dd)")) {
                            return false;
                        }
                        return true;
                    });

                    
                });
function validateEditEducation(id) {
    //var institute=$("#institute_"+id).val();
    if(!$("#institute_"+id).val()) {
        setErrorMessage("#institute_"+id,"This Field Can't Be Empty.");
        return false;
    }
    if(onlySpacesA("institute_"+id)) {
        setErrorMessage("#institute_"+id,"Only Spaces Not Allowed.");
        return false;                            
    }
    if(!correctDate("istart_"+id,"Date Format Invalid(yyyy-mm-dd)")) {
        return false;
    }
    if(!correctDate("iend_"+id,"Date Format Invalid(yyyy-mm-dd)")) {
        return false;
    }
    var start=$("#istart_"+id).val();
    var end=$("#iend_"+id).val();
    if(!dateDifference(start,end)) {
        setErrorMessage("#iend_"+id,"End Date Can't Be Less Than Start Date");
        return false;
    }
    if(!$("#university_"+id).val()) {
        setErrorMessage("#university_"+id,"This Field Can't Be Empty.");
        return false;
    }
    if(onlySpacesA("university_"+id)) {
        setErrorMessage("#university_"+id,"Only Spaces Not Allowed.");
        return false;                            
    }
    return true;
    
}
function validateEditAddress(id) {
    if(isNaN($("#epincode_"+id).val())) {
        setErrorMessage("#epincode_"+id,"Only Numbers Allowed.");
        return false;
    }
    if($("#epincode_"+id).val().length<5 || $("#epincode_"+id).val().length>7) {
        if($("#epincode_"+id).val().length!=0) {
            setErrorMessage("#epincode_"+id,"PinCode must be of 6 Digit")
            return false;
        }               
     }
    if(!$("#ecity_"+id).val()) {
        setErrorMessage("#ecity_"+id,"Can't Be Empty.");
        return false;
    }
    if(!$("#ecountry_"+id).val()) {
        setErrorMessage("#ecountry_"+id,"Can't Be Empty.");
        return false;
    }
    return true;
}
