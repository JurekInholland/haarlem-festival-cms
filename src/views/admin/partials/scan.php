<style>
.qrcode-text-btn {
  display: inline-block;
  height: 2rem;
  width: 2rem;
  background: url("/img/qr-code.svg") 50% 50% no-repeat;
  background-size: contain;


}

.qrcode-text-btn > input[type=file] {
  position: absolute;
  overflow: hidden;
  width: 2rem;
  height: 2rem;
  opacity: 0;


}

.qrcode-text {
  padding-right: 1.7em;
  margin-right: 0;
  vertical-align: middle;
}

.qrcode-text + .qrcode-text-btn {
  width: 1.7em;
  /* margin-left: -1.9rem; */
  vertical-align: middle;
}
</style>
<video id="vid"></video>
<script type="module">
    let videoElem = document.getElementById("vid");
    import QrScanner from '/js/qr-scanner-min.js';
    QrScanner.WORKER_PATH = '/js/qr-scanner-worker-min.js';
    const qrScanner = new QrScanner(videoElem, result => console.log('decoded qr code:', result));


    // do something with QrScanner
</script>

<h1>Scan tickets</h1>

<p>Please scan ticket QR code or enter ticket id manually.</p>

<form action="">
    <input class="qrcode-text" name="ticketid" type="text" placeholder="Ticket ID">
    <label class="qrcode-text-btn" for="ticketid">
        <input type=file accept="image/*" capture=environment onchange="openQRCamera(this);" tabindex=-1>
    </label>
</form>