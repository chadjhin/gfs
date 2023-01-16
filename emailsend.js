// Initialize Firebase

console.log("email start");
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";

import { sendEmailVerification} from "https://www.gstatic.com/firebasejs/9.9.2/firebase-auth.js";
const firebaseConfig = {
    apiKey: "AIzaSyCx_MTN7DUx0ijSV_vGtZ_pPvCbY9N3w08",
    authDomain: "petik-357402.firebaseapp.com",
    projectId: "petik-357402",
    storageBucket: "petik-357402.appspot.com",
    messagingSenderId: "361499100540",
    appId: "1:361499100540:web:af4233dd53e4bab0f750f9",
    measurementId: "G-GPSTS95XWC"
  };
  
const app = initializeApp(firebaseConfig);

const auth = getAuth(app);


sendEmailVerification(auth.currentUser)
  .then(() => {
    // Email verification sent!
    // ...
    window.alert("sent");
    
console.log("sent");
  });