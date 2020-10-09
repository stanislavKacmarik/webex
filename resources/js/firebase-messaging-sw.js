import * as firebase from "firebase/app";
import "firebase/messaging";

// Initialize the Firebase app in the service worker by passing in
// your app's Firebase config object.
// https://firebase.google.com/docs/web/setup#config-object
firebase.initializeApp({
    apiKey: "AIzaSyADOX1RMhE4_DHuns2KVg_PsYSo8vTOBnc",
    authDomain: "postoj-test.firebaseapp.com",
    databaseURL: "https://postoj-test.firebaseio.com",
    projectId: "postoj-test",
    storageBucket: "postoj-test.appspot.com",
    messagingSenderId: "163855958416",
    appId: "1:163855958416:web:61500d6211900f24f6f315"
});

const messaging = firebase.messaging();

messaging.usePublicVapidKey('BHxRHraCpwpapkQasThIBK5o3x1UMSK9EBrLEx3uVPaxN1xvK0HIlo7SiNgn0e096xWSvoJv3OWvIqJmqM9VfBQ')



messaging.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    const notificationTitle = 'Background Message Title';
    const notificationOptions = {
        body: 'Background Message body.',
        icon: '/firebase-logo.png'
    };

    return self.registration.showNotification(notificationTitle,
        notificationOptions);
});
