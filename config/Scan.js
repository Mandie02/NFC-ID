document.addEventListener('DOMContentLoaded', function() {
    const nfcInput = document.getElementById('nfcInput');
    const userProfile = document.getElementById('nfc-image');
    const userFullName = document.getElementById('user-fullname');
    const userLrn = document.getElementById('user-lrn');
    const userGradeSection = document.getElementById('user-grade-section');
    const userAdviser = document.getElementById('user-adviser');

    nfcInput.addEventListener('keypress', async function(e) {

        function clearInputFields(inpf) {
            inpf.value = "";
        }

        if (e.key === 'Enter') {
            e.preventDefault();
            const nfcKey = nfcInput.value.trim();

            if (!nfcKey) {
                alert('Please enter an NFC key.');
                return;
            }

            try {
                const response = await fetch(`../../pages/E-ID/E-ID.config.php?nfc_key=${nfcKey}`);
                const data = await response.json();

                if (data.error) {
                    alert(data.error);
                } else {
                    const user = data[0];
                    if(user.user_img) {
                        userProfile.src = user.user_img;
                    } else {
                        console.log('Using Default image.')
                        userProfile.src = "../../image/logo.png";
                    }
                    
                    userFullName.textContent = `${user.firstname} ${user.lastname}`;
                    userLrn.textContent = user.lrn;
                    userGradeSection.textContent = user.gradeSection;
                    userAdviser.textContent = user.adviser;
                }
            } catch (error) {
                console.error('Error fetching data:', error);
                alert('Error fetching data');
            }
            clearInputFields(nfcInput);
        }
    });
});