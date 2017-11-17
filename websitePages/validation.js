
//variable declaration
var alpha=/^[A-Za-z]{3,20}$/
numchk=/^(\d{2,5})[-]?(\d{4,8})$/
ch = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
date= /^\d{1,2}\/\d{1,2}\/\d{4}$/;
obj
function checkForm() {


  
  if (Payform.cardNum.value == "") {  
      alert ("You must enter your Card Number");
      Payform.cardNum.focus(); 
      return false;
      }
   else
   if (Payform.sdMonth.value =="00"){
             alert("Please select your card Start date");
          Payform.sdMonth.focus();    
          return false;
          }
      else
      if (Payform.sdYear.value =="0"){
                alert("Please select your card Start date");
             Payform.sdYear.focus();    
             return false;
         }
      else
        if (Payform.edMonth.value =="00"){
                  alert("Please select your card Expiry date");
               Payform.edMonth.focus();    
               return false;
          }
       else
         if (Payform.edYear.value =="0"){
                   alert("Please select your card Expiry date");
                Payform.edYear.focus();    
                return false;
       }
    else
    if (Payform.nameCard.value == "") {  
    	alert ("You must enter your name");
            Payform.nameCard.focus(); 
            return false;
    	}
   else 
   if (!Payform.nameCard.value.match(alpha)){  
                                                     //! is used to stop the code ,if condition not fulfilled. It is a negative expression.
   	alert ("please enter a valid name");
   	Payform.nameCard.focus();
   	return false;
        }
   else

    if (Payform.txtFirstName.value == "") {  
	alert ("You must enter your first name");
        Payform.txtFirstName.focus(); 
        return false;
	}
   else 
    if (!Payform.txtFirstName.value.match(alpha)){  
                                                  //! is used to stop the code ,if condition not fulfilled. It is a negative expression.
	 alert ("please enter a valid name");
	 Payform.txtFirstName.focus();
	 return false;
         }
   else
    if (Payform.txtLastName.value == ""){            
        alert ("You must enter your last name");
        Payform.txtLastName.focus();
          return false;
        }
   else
    if (Payform.txtPhoneNumber.value ==""){ 
        alert ("Please enter your phone number"); 
	Payform.txtPhoneNumber.focus();       
	return false;
	}
   else   
		                 
   if (!Payform.txtPhoneNumber.value.match(numchk)){           
                                                                    //! ,if entered value doesnot meets the set criteria the program will stop here.
	 alert ("Please enter a valid phone number");
	 Payform.txtPhoneNumber.focus(); 
	 return false;
	 }
   else
   if (!Payform.txtEmailId.value.match(ch)){            
                                                                      
          alert ("Invalid email address");              
   	  Payform.txtEmailId.focus();
          return false;
   	  }
   else
   if (Payform.txtAddress.value ==""){ 
           alert ("Please enter your address"); 
   	Payform.txtAddress.focus();       
   	return false;
   	}
   
                   
	                  
                
    }



function trimLeft(aString)
{
  // Trim leading spaces from a string
  // Returns the trimmed string
  
  var length=aString.length;
  if (length == 0) return aString;

  var left=0;
  while ( left < length && aString.charAt(left) == ' ') left++;
  return aString.substring(left);
}

function trimRight(aString)
{
  // Trim trailing spaces from a string
  // Returns the trimmed string
  
  var length=aString.length;
  if (length == 0) return aString;

  var right= aString.length-1;
  while ( right >= 0 && aString.charAt(right) == ' ') right--;
  return aString.substring(0, right+1);
}

function trim(aString)
{
  // Trim leading and trailing spaces from a string
  // Returns the trimmed string
  
  var length=aString.length;
  if (length == 0) return aString;

  return trimLeft(trimRight(aString));
}

function isEmpty(aString)
{
  // Returns true if aString is null or consists entirely of spaces, false otherwise
  return trimLeft(aString) == "";
}

function isDigit(aChar)
{
  // Returns true if aChar is a decimal digit, false otherwise
  
  return aChar >= '0' && aChar <= '9';
}

function isDigits(aString)
{
  // Returns true if string consists entirely of decimal digits, false otherwise
  var i=0;
  var length = aString.length;
  if (length == 0) return false;
  while ( i<length && isDigit(aString.charAt(i)) ) i++;
  return i == length;
}

function isInteger(aString)
{
  // Returns true if aString is a decimal integer, false otherwise
  // Leading or trailing spaces are ignored

  var strTrimmed = trim(aString);
  if (strTrimmed.length == 0) return false;
  
  var firstChar = strTrimmed.charAt(0);
  if ( firstChar == '+' || firstChar == '-' ) strTrimmed = strTrimmed.substring(1);
  return isDigits(strTrimmed);
}

function isCardNo(aString)
{

  // Returns true if aString is a valid credit/debit card no
  // Works ok for Visa, Mastercard, Amex, Maestro, etc
  if ( ! isDigits(aString) ) return false;
  
  var checksum = 0;
  var last = aString.length - 1;

  for (i=last-1; i >= 0; i-=2)
  {
    value = Number(aString.charAt(i)) * 2;
    if ( value > 9 ) value -= 9;
    checksum += value;
  }
  
  for (i=last; i >= 0; i-=2)
  {    
    checksum += Number(aString.charAt(i));
  }
  return (checksum % 10) == 0;
}

function isNumber(aString)
{
  // Returns true if aString is a decimal number, false otherwise
  // See JavaScript documentation for isNaN
  
  var strTrimmed = trim(aString);
  if (strTrimmed.length == 0) return false;
  
  return ! isNaN(strTrimmed);
}


function toInteger(aString)
{
  // Converts aString to an integer
  // See JavaScript documentation for parseInt()
  
  return parseInt(aString);
}

function toFloat(aString)
{
  // Converts aString to a float
  // See JavaScript documentation for parseFloat()
  
  return parseFloat(aString);
}

function isEMail(aString)
{
  var regex = new RegExp("^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$", "i");
  return regex.test(aString);
  
}
