
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
        if(this.email === '' || this.last_name === '' || this.first_name === '' || this.lrn === '' || this.grade_section === '' || this.adviser === '' || this.NFC_CARD_KEY === ''){    
            alert('Please fill up all the fields.');
            return;
        }

        try {
            const response = await fetch('../database/db.php', {
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
            const content = await response.json();
            if (response.ok) {
                this.sendEmail(this.email, this.last_name, this.first_name);
                console.log('Succesfully sent', content);
            } else {
                console.log('Failed... :C', content);
            }
        } catch (error) {
            console.log(`Error: ${error}`); // error here: Email is not defined
        }
    }
       

    //Send Direct Email to the user once they create an account.
    sendEmail(email, last_name, first_name){
        Email.send({
            Host : "smtp.gmail.com",
            Username : "yoshikagek304@gmail.com", // i forgot how to use the ENV file to keep account secure.
            Password : "4D9FD21A0A16AE8415AF665787D6BF2E5DE9",
            To : email,
            From : "yoshikagek304@gmail.com",
            Subject : "Account Created",
            Body : `${last_name + " " + first_name}, Your account has been created. Thank you for using our system.`,
        }).then(
          message => alert("mail sent successfully")
        );
    }
}

document.addEventListener('DOMContentLoaded', () =>{
    document.getElementById('register_form').addEventListener('keypress', async function(e) {
        if(e.key === 'Enter'){
            e.preventDefault();
        
            const email = document.getElementById('email').value;
            const last_name = document.getElementById('lastname').value;
            const lrn = document.getElementById('lrn').value;
            const first_name = document.getElementById('firstname').value;
            const grade_section = document.getElementById('grade-section').value;
            const adviser = document.getElementById('adviser').value;
            const NFC_CARD_KEY = document.getElementById('NFC').value;
        
            const User = new CreateAccount(email, last_name, first_name, lrn, grade_section, adviser, NFC_CARD_KEY);
            await User.submit();
        }
    });
});


class ReadNFC{
    constructor(NFC_CARD_KEY){
        this.NFC_CARD_KEY = NFC_CARD_KEY;
    }
}