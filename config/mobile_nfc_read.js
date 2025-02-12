// MOBILE NFC READER
/*
document.getElementById('scan').addEventListener('click', async () => {
    try {
        const ndef = new NDEFReader();
        await ndef.scan();
        
        ndef.addEventListener('readingerror', () => {
            alert('Try again.');
        });

        ndef.addEventListener("reading", ({message , serialNumber}) => {
            console.log(`Records: (${message.record.length})`);
            document.getElementById('serial_number').textContent += `Serial Number : (${serialNumber})`;
        });
    } catch (error) {
        console.log(error);
        alert('Sorry, your device is not supported of NFC.');
    }
});
*/
document.addEventListener('DOMContentLoaded', async () => {
    const ndef = new NDEFReader();
    const nfcperms = await navigator.permissions.query({ name : 'nfc' });
    if (nfcperms.state === 'granted') {
        await read();
    }
});