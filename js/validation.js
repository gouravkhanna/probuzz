// JavaScript Document





















function aa(i) 			//To Check Whether the Number is Alpha NUmeric oR not (return True if it is)
   {
	var k=1;
	for(var j=0;j<i.length;j++)
		{
			if( (i.charAt(j) >= 0 && i.charAt(j)<=9) || (i.charAt(j)>='a' && i.charAt(j)<='z') || (i.charAt(j)>='A' && i.charAt(j)<='Z') )
				{
					k=0;
				}
			else
				{
					k=1;
					return false;
				}
		}
		if(k==0)
		{
		return true;
		}
		
   }
   function aonly(i) 				//To Check Whether the Number is Alphabat oR not (return True if it is)
   {
	var k=1;
	for(var j=0;j<i.length;j++)
		{
			if((i.charAt(j)>='a' && i.charAt(j)<='z') ||(i.charAt(j)>='A' && i.charAt(j)<='Z')  )
				{
					k=0;
				}
			else
				{
					k=1;
					return false;
				}
		}
		if(k==0)
		{
		return true;
		}
		
   } 
   function anum(i)			//to Check Whether the Number is NUmeric oR not (return True if it is)
   {
	var k=1;
	for(var j=0;j<i.length;j++)
		{
			if((i.charAt(j)>=1 && i.charAt(j)<=9) )
				{
					k=0;
				}
			else
				{
					k=1;
					return false;
				}
		}
		if(k==0)
		{
		return true;
		}
		
   } 
   function d620(i)
   {
	   ulen=i.length;
	   if(!(ulen>5&&ulen<21))
		{
			return false;
		}
	   else
	   {
		   return true;
	   }
   }
	function valid()					//To validate the form..will be called on submit
	{
		
		var msg="";
		var uname = document.getElementById('user_name').value;
		var ulen=uname.length;
			if(uname!="" )//&& aa(uname) )
					{
						if(!d620(uname))
						{
							msg+="\n*User Name Must be of 6 to 20 digit ";					
						}
									
					}
			else
				{
					msg+=" \n*User Name Must be Alpha Numeric & must Not Be Empty";
				}
			
		var p1 = document.getElementById('password').value;
		var p2 = document.getElementById('password').value;
		
			if(p1==p2)
			{
			//	if(aa(p1))
			//		{
						if(!d620(p1))
							{
								msg+="\n*Password Must be of 6 to 20 digit ";	
							}
			//		}
				else
					{
							msg+=" \n*Password Must be Alpha Numeric & must Not Be Empty";
					}
			}
			else
			{
					msg+="\n*Password Not Match";
			}
		
	
	
	if(msg=="") // if all validation are passed
	{
			alert("yo");
	}
	else //if there are validation error in page
	{
			alert("Error In page are"+msg);
			return false;
	}
	
	}