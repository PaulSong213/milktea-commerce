// Import the functions you need from the SDKs you need
import {
    initializeApp,
} from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";

// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyDIbZwMfPOJtktPmKRBgaxJwtv9u5CCBH0",
    authDomain: "romeocafe-8aca9.firebaseapp.com",
    projectId: "romeocafe-8aca9",
    storageBucket: "romeocafe-8aca9.appspot.com",
    messagingSenderId: "910594974143",
    appId: "1:910594974143:web:697f2b16ebf39609ec010a",
    databaseURL: "https://romeocafe-8aca9-default-rtdb.asia-southeast1.firebasedatabase.app/"
};

// Initialize Firebase
export const app = initializeApp(firebaseConfig);
