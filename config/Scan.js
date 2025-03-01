document.addEventListener('DOMContentLoaded', function() {
    const nfcInput = document.getElementById('nfcInput');
    const userFullName = document.getElementById('user-fullname');
    const userLrn = document.getElementById('user-lrn');
    const userGradeSection = document.getElementById('user-grade-section');
    const userAdviser = document.getElementById('user-adviser');

    nfcInput.addEventListener('keypress', async function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const nfcKey = nfcInput.value.trim();

            if (!nfcKey) {
                alert('Please enter an NFC key.');
                return;
            }

            try {
                const response = await fetch(`../../database/db.php?nfc_key=${nfcKey}`);
                const data = await response.json();

                if (data.error) {
                    alert(data.error);
                } else {
                    const user = data[0];
                    userFullName.textContent = `${user.firstname} ${user.lastname}`;
                    userLrn.textContent = user.lrn;
                    userGradeSection.textContent = user.gradeSection;
                    userAdviser.textContent = user.adviser;
                }
            } catch (error) {
                console.error('Error fetching data:', error);
                alert('Error fetching data');
            }
        }
        clearInputField(nfcInput);
    });

    function clearInputField(target) {
        if(target.value === target) {
            target.value = "";
        }
    }
});