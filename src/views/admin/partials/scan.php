<style>
.qrcode-text-btn {
  display: inline-block;
  height: 2rem;
  width: 2rem;
  background: url("/img/qr-code.svg") 50% 50% no-repeat;
  background-size: contain;
  cursor: pointer;
}

.qrcode-text-btn > input[type=file] {
  position: absolute;
  overflow: hidden;
  width: 1px;
  height: 1px;
  opacity: 0;
}

.qrcode-text {
  padding-right: 1.7em;
  margin-right: 0;
  vertical-align: middle;
}

.qrcode-text + .qrcode-text-btn {
  width: 1.7em;
  margin-left: -1.9rem;
  vertical-align: middle;
}
</style>


<h1>Scan tickets</h1>

<p>Please scan ticket QR code or enter ticket id manually.</p>

<form action="">
    <input class="qrcode-text" name="ticketid" type="text" placeholder="Ticket ID">
    <label class="qrcode-text-btn" for="ticketid">
        <input type=file accept="image/*" capture=environment onchange="openQRCamera(this);" tabindex=-1>
    </label>
</form>