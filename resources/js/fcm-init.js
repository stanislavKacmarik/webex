// Import and configure the Firebase SDK
// These scripts are made available when the app is served or deployed on Firebase Hosting
// If you do not serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup
// Firebase App (the core Firebase SDK) is always required and must be listed first
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

window.onload = function (e) {
    // subscribuj

    // Get Instance ID token. Initially this makes a network call, once retrieved
    // subsequent calls to getToken will return from cache.
    messaging.getToken().then((currentToken) => {
        if (currentToken) {
            document.getElementById('subscribe-btn').innerHTML = currentToken;
            console.log(currentToken);
            // sendTokenToServer(currentToken);
            // updateUIForPushEnabled(currentToken);
        } else {
            // Show permission request.
            console.log('No Instance ID token available. Request permission to generate one.');
            // Show permission UI.
            // updateUIForPushPermissionRequired();
            // setTokenSentToServer(false);
        }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
        // showToken('Error retrieving Instance ID token. ', err);
        // setTokenSentToServer(false);
    });
};

messaging.onMessage((payload) => {
    debugger;
    console.log('Message received. ', payload);
});
