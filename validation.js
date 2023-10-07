function validate()
{

    var phnnum= document.getElementById('number').value;
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    var msg= document.getElementById('msg').value;
    if((phnnum.match(phoneno)) && msg!="")
    {
      return true;
        }
      else
        {
        alert("Invalid number or message is empty");
        //location.reload();
        return false;
        }
}
