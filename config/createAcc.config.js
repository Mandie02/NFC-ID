class CreateAccount{ //Student Register Form
    constructor(email, last_name, first_name, lrn, grade_section, adviser, NFC_CARD_KEY, img_profile){
        this.email = email;
        this.last_name = last_name;
        this.first_name = first_name;
        this.lrn = lrn;
        this.grade_section = grade_section;
        this.adviser = adviser;
        this.NFC_CARD_KEY = NFC_CARD_KEY;
        this.img_profile = img_profile;
    }

    async ImageBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => {
                resolve(reader.result);
            }
            reader.onerror = (error) => {reject(error)};
            reader.readAsDataURL(file);
        });
    }

    
    // Pass to the database
    async submit() {    
        if(this.email === '' || this.last_name === '' || this.first_name === '' || this.lrn === '' || this.grade_section === '' || this.adviser === '' || this.NFC_CARD_KEY === '') {
            alert('Please Fill up all the fields.');
            return;
        }
        try {

            const imgFile = document.getElementById('img-id').files[0];
            if(imgFile === "") {
                alert('Please Select and image');
                return;
            }
            
            const b64img = await this.ImageBase64(imgFile);

            /*
                Fetch data using the POST method to upload all the collected
                data from the input fields and store it into the db.php 
            */
            const response = await fetch("../../database/db.php", {
                method : 'POST',
                headers : {
                    'Content-Type' : 'application/json',
                },
                body : JSON.stringify({
                    email : this.email,
                    last_name : this.last_name,
                    first_name : this.first_name,
                    lrn : this.lrn,
                    grade_section : this.grade_section,
                    adviser : this.adviser,
                    NFC_CARD_KEY : this.NFC_CARD_KEY,
                    img_profile: b64img
                })
            });
            const responseText = await response.text();
            console.log('response txt: ', responseText);
            const content = responseText ? JSON.parse(responseText) : {};
            if (response.ok) {
                this.sendEmail(this.email, this.last_name, this.first_name);
                console.log('Succesfully sent', content);
            } else {
                console.log('Failed... :C', content);
            }
        } catch (error) {
            console.log(`Error: ${error}`);
        }
    }
       
    //Send Direct Email to the user once they create an account.
    sendEmail(email, last_name, first_name){ //emailjs
        let templateParameter = {
            from_name: "LAGRO NFC-ID",
            to_name : `${first_name}`, 
            header : `WELCOME S.M.A.R.T. LAGRONIANS`,
            body: ` Thank you ${last_name}  ${first_name} for using LAGRO NFC-ID.`,
            to_email: email // Pass the user email
        };
        emailjs.send('service_s9mkmff', 'template_eu47o4k', templateParameter)
        .then((res) => {
            alert("Email Sent Successfully!", res);
        })
        .catch((err) => {
            console.error("Error Sending Email:", err);
        });
    }
}

/* REGISTER FORM */
document.addEventListener('DOMContentLoaded', () => {
    function clearInputFields() {
        const inputs = document.querySelectorAll('.input');
        inputs.forEach(input => {
            input.value = "";
        });
    }

    document.getElementById('register_form').addEventListener('keypress', async function(e) {
        if(e.key === "Enter"){            
            e.preventDefault();
            
            const input_img = document.getElementById('img-id').value;
            const email = document.getElementById('email').value;
            const last_name = document.getElementById('lastname').value;
            const lrn = document.getElementById('lrn').value;
            const first_name = document.getElementById('firstname').value;
            const grade_section = document.getElementById('grade-section').value;
            const adviser = document.getElementById('adviser').value;
            const NFC_CARD_KEY = document.getElementById('NFC').value;
            
            /* Email Validation */
            let regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if(email.match(regex)) {
                console.log('Valid Email Address.');
            } else {
                alert('Please Enter Valid Email.');
                return;
            }

            /*  Check if all the input fields are not empty.
                It helps to prevent sending an empty or null input to the database. 
            */
            if(!email || !last_name|| !lrn || !first_name || !grade_section ||
                !adviser || !NFC_CARD_KEY) {
                    alert('Please fill up all the fields.');
                    return;
            }
            let User = new CreateAccount(email, last_name, first_name, lrn, grade_section, adviser, NFC_CARD_KEY, input_img);
            await User.submit();
            clearInputFields();
        }        
    });        
});




