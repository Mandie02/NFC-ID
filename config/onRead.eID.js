// MOBILE NFC READER
class OnreadNFC {

  async NFCREADER(){ //mobile NFC reader
    if('NDEFReader' in window){
        document.getElementById('nfc-access').style.display = 'block';
        const ndef = new NDEFReader();
        try {
            await ndef.scan();
            ndef.addEventListener('reading', ({message, serialNumber }) => {
                console.log(message);
                console.log(serialNumber);
            })
        } catch (error) {
            document.getElementById('error').textContent += error;
        }
    } else {
        document.getElementsByClassName('nfc-scanner-error').style.display = 'block';
    }
  }

  async Read() {
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('nfc-id-card').addEventListener('focus', ( ))
    });
  }
}

document.addEventListener('DOMContentLoaded', () =>{
    const NFC = new OnreadNFC();
    NFC.NFCREADER();
});