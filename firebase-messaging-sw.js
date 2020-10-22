// Import and configure the Firebase SDK
// These scripts are made available when the app is served or deployed on Firebase Hosting
// If you do not serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup
// importScripts('https://www.gstatic.com/firebasejs/7.15.5/firebase-app.js');
// importScripts('https://www.gstatic.com/firebasejs/7.15.5/firebase-messaging.js');
// importScripts('/fcm/init.js');

// const messaging = firebase.messaging();


 // * Here is is the code snippet to initialize Firebase Messaging in the Service
 // * Worker when your app is not hosted on Firebase Hosting.
 // [START initialize_firebase_in_sw]
 // Give the service worker access to Firebase Messaging.
 // Note that you can only use Firebase Messaging here, other Firebase libraries
 // are not available in the service worker.
 importScripts('https://www.gstatic.com/firebasejs/7.15.0/firebase-app.js');
 importScripts('https://www.gstatic.com/firebasejs/7.15.0/firebase-messaging.js');
 // Initialize the Firebase app in the service worker by passing in
 // your app's Firebase config object.
 // https://firebase.google.com/docs/web/setup#config-object
 firebase.initializeApp({
   apiKey: "AIzaSyBWdj6XsVSvNlQO4CJMf1NnNH3LlkZt9EQ",
    authDomain: "vieclam12h-e8d8e.firebaseapp.com",
    databaseURL: "https://vieclam12h-e8d8e.firebaseio.com",
    projectId: "vieclam12h-e8d8e",
    storageBucket: "vieclam12h-e8d8e.appspot.com",
    messagingSenderId: "291517942394",
    appId: "1:291517942394:web:300c11e9359d82b94c49c3",
    measurementId: "G-KM8JHGGEXV"
 });
 // Retrieve an instance of Firebase Messaging so that it can handle background
 // messages.
 const messaging = firebase.messaging();
 // [END initialize_firebase_in_sw]
 
// console.log('tuan');

// If you would like to customize notifications that are received in the
// background (Web app is closed or not in browser focus) then you should
// implement this optional method.
// [START background_handler]
// messaging.setBackgroundMessageHandler(function(payload) {
//   // console.log('[firebase-messaging-sw.js] Received background message ', payload);
//   console.log('run');
//   // Customize notification here
//   const notificationTitle = 'Background Message Title';
//   const notificationOptions = {
//     body: 'Background Message body.',
//     click_action: 'http://localhost:30321/'
//   };

//   return self.registration.showNotification(notificationTitle,
//     notificationOptions);
// });
// [END background_handler]




self.addEventListener('notificationclick', function(event) {
    console.log('SW: Clicked notification', event)

    let data = event.notification.data

    event.notification.close()

    self.clients.openWindow(event.notification.data.url)
  })

  self.addEventListener('push', event => {
    let data = {}

    if (event.data) {
      data = event.data.json()
    }

    console.log('SW: Push received', data.data)
    var notifi = JSON.parse(data.data.notification);
    // console.log('notifi', notifi);
    data.notification = notifi;

    if (data.notification && data.notification.title) {
      self.registration.showNotification(data.notification.title, {
        body: data.notification.body,
        icon: 'https://vieclam12h.vn/images/vieclam/vieclam.jpg',
        data: {
                url: "/"
            }
      })
    } else {
      console.log('SW: No notification payload, not showing notification')
    }
  })