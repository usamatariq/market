function validateRegEx(regex,input)
 			{
 				if(!regex.test(input)) 
 				{
 					return false;
 				}
 				else
 				{ 
 					return true;
 
 				}
 			}
		function validateNonEmpty(inputField)
 			{
 				return validateRegEx(/^.{1,30}$/,inputField);
 			}	
			
		function validateDate(inputField)
 			{
 				return validateRegEx(/^\d\d-\d\d-\d\d\d\d$/,inputField);
 			}	
			
 		function validateUser(inputField)
 			{
 				return validateRegEx(/^.{4,20}$/,inputField);
 			}
			
 		function validatePassword(inputField)
 			{
 				return validateRegEx(/^(?=.*\d)(?=.*\w)(?!.*\s).{8,12}$/,inputField);
 			}
			
		function validateEmail(inputField) 
			{ 	
				
				return validateRegEx(/^[\w\.-_\+]+@[\w-]+(\.\w{2,3})+$/,
				inputField);
			}
			
		function validateTitle(inputField)
 			{
 				return validateRegEx(/^.{10,20}/,inputField);
 			}		
		
		function validateNumber(inputField)
 			{
 				return validateRegEx(/^\d{2,10}$/,inputField);
 			}	
		
		function validateDescription(inputField)
 			{
 				return validateRegEx(/^.{10,20}/,inputField);
 			}		
		
			
 		function validateZipCode(inputField)
 			{
 				
 				return validateRegEx(/^\d{5}$/,inputField);
 			}
			
			
 
 
       function validateDate(inputField) {
	   
         return validateRegEx(/^\d{2}-\d{2}-\d{4}$/,
           inputField);
       }
 
       function validatePhone(inputField) {
 
         return validateRegEx(/^\d{3}-\d{3}-\d{4}$/,
           inputField);
       }
	
		
		