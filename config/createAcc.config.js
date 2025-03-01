
class CreateAccount{
    constructor(email, last_name, first_name, lrn, grade_section, adviser, NFC_CARD_KEY){
        this.email = email;
        this.last_name = last_name;
        this.first_name = first_name;
        this.lrn = lrn;
        this.grade_section = grade_section;
        this.adviser = adviser;
        this.NFC_CARD_KEY = NFC_CARD_KEY;
    }

    // Pass to the database
    async submit() { 

        if(this.email === '' || this.last_name === '' || this.first_name === '' || this.lrn === '' || this.grade_section === '' || this.adviser === '' || this.NFC_CARD_KEY === '') {
            alert('Please Fill up all the fields.');
            return;
        }
        try {
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
                    NFC_CARD_KEY : this.NFC_CARD_KEY
                })
            });
            const responseText = await response.text();
            const content = responseText ? JSON.parse(responseText) : {};
            if (response.ok) {
                this.sendEmail(this.email, this.last_name, this.first_name);
                console.log('Succesfully sent', content);
            } else {
                console.log('Failed... :C', content);
            }
        } catch (error) {
            console.error(`Error: ${error}`); // error here: Email is not defined
        }
    }
       
    //Send Direct Email to the user once they create an account.
    sendEmail(email, last_name, first_name){ //smtpjs
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
    document.getElementById('register_form').addEventListener('keypress', async function(e) {
        if(e.key === "Enter"){            
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const last_name = document.getElementById('lastname').value;
            const lrn = document.getElementById('lrn').value;
            const first_name = document.getElementById('firstname').value;
            const grade_section = document.getElementById('grade-section').value;
            const adviser = document.getElementById('adviser').value;
            const NFC_CARD_KEY = document.getElementById('NFC').value;
            
            let regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if(email.match(regex)) {
                console.log('Valid Email Address.');
            } else {
                alert('Please Enter Valid Email.');
                return;
            }

            if(!email || !last_name|| !lrn || !first_name || !grade_section ||
                !adviser || !NFC_CARD_KEY) {
                    alert('Please fill up all the fields.');
                    return;
            }
            let User = new CreateAccount(email, last_name, first_name, lrn, grade_section, adviser, NFC_CARD_KEY);
            await User.submit();
            
            // msg greet
        }
    });    
});

