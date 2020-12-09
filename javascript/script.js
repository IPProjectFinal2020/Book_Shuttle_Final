function validate() {
    var uname = document.registration.Uname;
    var pass =  document.registration.pass;
    var repass =  document.registration.repass;
    var city =  document.registration.city;
    var uerror = document.getElementById("userError");
    var perror = document.getElementById("passError");
    var reperror = document.getElementById("repassError");
    var cerror = document.getElementById("cityError");
    if (uname.value.trim() == "")
    {
        uerror.style.display="block";
        return false;
    } 
    else if(pass.value.trim()==""){
        perror.style.display="block";
        return false;
    }
    else if(repass.value.trim()==""){
        reperror.style.display="block";
        return false;
    }
    else if(pass.value.trim()==""){
        cityerror.style.display="block";
        return false;
    }
    else if(pass.value!=repass.value){
        reperror.style.display="block";
        return false;
    }
    
             
    alert("Form successfully submitted");
    return true;
        }
