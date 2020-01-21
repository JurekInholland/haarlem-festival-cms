<style>
#ticketform {
  display: flex;
  flex-flow: column;
  flex-wrap: wrap;
}
#ticketform section {
  flex-basis: 100%;
  /* margin: 0 10px; */
  display: flex;
  flex-flow: row;
}

#ticketform section:last-of-type {
  margin-bottom: 1rem;
}
#ticketid {
  width: 100%;
  margin-right: 10px; 
  max-width: 500px;

}

#ticketform section input[type="submit"] {
  width: 150px;
}
#ticketform input {
  max-height: 38px;
}
#scanner {
  display: block;
  position: absolute;
  top: 340px;
  max-width: 100%;
  padding-right: 1.1rem;
}
</style>

<h1>Scan tickets</h1>


<p id="feedback">Please scan ticket QR code or enter ticket id manually.</p>
<section id="scanarea">
<form action="/admin/scanSubmit" method="POST" id="ticketform" class="form">
  <section>
      <input class="form-control" name="ticketid" type="text" id="ticketid" placeholder="Ticket ID">
      <input type="submit" name="btnSubmit" class="btn btn-primary scan-submit">
  </section>
</form>

<div class="qrscanner" id="scanner">
</div>
</section>
<script type="text/javascript" src="/js/jsQRScanner/jsqrscanner.nocache.js"></script>

<script type="text/javascript">
    function onQRCodeScanned(scannedText)
    {
      var feedback = document.getElementById("feedback");
      var scannerParent = document.getElementById("scanner");

      // console.log(scannedText);
      if (scannedText.startsWith("The request is not allowed")) {
        feedback.innerHTML = "Please grant the website camera access or enter the ticket id manually.";
        scannerParent.style="opacity: 0;"

      
      } else if (scannedText.startsWith("Requested device not found")) {
        feedback.innerHTML = "Please visit this page on a device that has a camera or enter the ticket id manually."
       

      } else {

        var ticketId = document.getElementById("ticketid");
        var form = document.getElementById("ticketform");

        let result = scannedText.split('/').pop();

        ticketId.value = result;
        form.submit();
      }
    }

    
   

    function provideVideoQQ()
    {
        return navigator.mediaDevices.enumerateDevices()
        .then(function(devices) {
            var exCameras = [];
            devices.forEach(function(device) {
            if (device.kind === 'videoinput') {
              exCameras.push(device.deviceId)
            }
         });
            
            return Promise.resolve(exCameras);
        }).then(function(ids){
            if(ids.length === 0)
            {
              return Promise.reject('Could not find a webcam');
            }
            
            return navigator.mediaDevices.getUserMedia({
                video: {
                  'optional': [{
                    'sourceId': ids.length === 1 ? ids[0] : ids[1]//this way QQ browser opens the rear camera
                    }]
                }
            });        
        });                
    }
    
    //this function will be called when JsQRScanner is ready to use
    function JsQRScannerReady()
    {
        //create a new scanner passing to it a callback function that will be invoked when
        //the scanner succesfully scan a QR code
        var jbScanner = new JsQRScanner(onQRCodeScanned);
        //var jbScanner = new JsQRScanner(onQRCodeScanned, provideVideo);
        //reduce the size of analyzed image to increase performance on mobile devices
        jbScanner.setSnapImageMaxSize(300);
    	var scannerParentElement = document.getElementById("scanner");
    	if(scannerParentElement)
    	{
    	    //append the jbScanner to an existing DOM element
        jbScanner.appendTo(scannerParentElement);
        
        
    	}        
    }
  
  </script> 
