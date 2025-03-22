class Admin{
    constructor(email, password){
        this.email = email;
        this.password = password;
    }

    async login() {
        const email = document.getElementById("email-admin");
        const pass = document.getElementById("password-admin");

        let regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if(email.match(regex)){
           console.log("Valid Email"); 
        } else {
            alert("Invalid Email Address");
        }
    }

    logout(){

    }

    ViewUsers() {

    }

    Settings() {

    }

    async edit(fullName, gradeAndSection, lrn, adviser, email, nfckey) {
        try {
            const res = await fetch("../../database/Admin.database.php", {
                method : 'PUT',
                headers : {
                    'Content-Type' : 'application/json',
                },
                body : JSON.stringify({
                    fullName : fullName,
                    gradeAndSection : gradeAndSection,
                    lrn : lrn,
                    adviser : adviser,
                    email : email,
                    nfckey : nfckey,
                })
            });
            const response = res.json(); console.log(response);
        } catch (error) {
            console.log("Error : " , error);
        }
    }

    async delete() {
        try {
            const res = await fetch(`../../database/Admin.database.php`, {
                method : 'DELETE',
            });
            const response = res.text();
            console.log(response);
            alert('Deleted Successfully.');
        } catch (error) {
            console.log("Error : ", error);
        }
    }

}

document.addEventListener('DOMContentLoaded', () => { 
    const fullname = document.getElementById('fullname-input').value;
    const grade_section = document.getElementById('gradeSection-input').value;
    const lrn = document.getElementById('lrn-input').value;
    const adviser = document.getElementById('adviser-input').value;
    const email = document.getElementById('email-input').value;
    const nfckey = document.getElementById('nfckey-input').value;
    
    const Inputs = document.querySelectorAll('.edit-input');

    Inputs.forEach((input) => {
        input.style.display = 'none';
    })

    let admin = new Admin();
    
    //view user account
    document.getElementById('view-btn').addEventListener('click', () => {
        admin.ViewUsers();
    });
    
    // edit user account
    document.getElementById('edit-btn').addEventListener('click', () => {
        Inputs.forEach((input, key) => {
            input.style.display = 'block';
            //not done. Sunday night/dawn

        });
        document.querySelectorAll('.td').forEach((td) => {
            td.style.display = 'none';
        });
        
        admin.edit(fullname, grade_section, lrn, adviser, email, nfckey);
    });
    
    //delete user account
    document.getElementById('del-btn').addEventListener('click', () => {
        admin.delete();
    });


});