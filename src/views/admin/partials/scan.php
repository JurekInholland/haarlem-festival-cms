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


<script>
function openQRCamera(node) {
  var reader = new FileReader();
  reader.onload = function() {
    node.value = "";
    qrcode.callback = function(res) {
      if(res instanceof Error) {
        alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
      } else {
        node.parentNode.previousElementSibling.value = res;
      }
    };
    qrcode.decode(reader.result);
  };
  reader.readAsDataURL(node.files[0]);
}
</script>

<h1>Scan tickets</h1>

<p>Please scan ticket QR code or enter ticket id manually.</p>

<form action="">
    <input class="qrcode-text" name="ticketid" type="text" placeholder="Ticket ID">
    <label class="qrcode-text-btn" for="ticketid">
        <input type=file accept="image/*" capture=environment onchange="openQRCamera(this);" tabindex=-1>
    </label>
</form>