<script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-messaging.js"></script>
<script src="/fcm/init.js"></script>
<script>
	const messaging = firebase.messaging();

	messaging.usePublicVapidKey('BE49BcmS7FEnrKhrDkOrmAYm5fspUSWEwdlMOUmD2Kxeu6ka07X1Zjyo8I5Ap5vc6zZviPoAOt6vtQExFUHXnWA');

	 messaging.getToken().then((currentToken) => {
      
      // alert(currentToken);
      var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	     // document.getElementById("demo").innerHTML = this.responseText;
	    }
	  };
	  xhttp.open("GET", "/functions/ajax/fcm.php?token="+currentToken, true);
	  xhttp.send();

    }).catch((err) => {
      console.log('An error occurred while retrieving token. ', err);
      // showToken('Error retrieving Instance ID token. ', err);
      // setTokenSentToServer(false);
    });
</script>