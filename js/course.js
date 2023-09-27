const courseb = () =>{
    const c_name = document.getElementById("course").value;
    const descrip = document.getElementById("cdescription").value;

    // course validation
    if (!isNaN(c_name)) {
        course_error.innerHTML = "**Please! enter the Alphabates**";
        return false
    }
    else{
        document.getElementById("course_error").innerHTML="";
    }

    // course validation
    if (!isNaN(descrip)) {
        description_error.innerHTML = "**Please! enter the Alphabates not using number**";
        return false
    }
    else if (descrip.length <= 10){
        description_error.innerHTML = "**Please! Description length should be greater than 10.**";
        return false
    }
    else{
        document.getElementById("description_error").innerHTML="";
    }
}