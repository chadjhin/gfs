// Initialize Firebase
console.log("email start");
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";

import { getAuth,sendSignInLinkToEmail, createUserWithEmailAndPassword,signInWithEmailAndPassword,sendEmailVerification} from "https://www.gstatic.com/firebasejs/9.15.0/firebase-auth.js";
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



var email = sessionStorage.getItem("email");  
var password = sessionStorage.getItem("password");


console.log(email);
console.log(password);
createUserWithEmailAndPassword(auth, email, password)
  .then((userCredential) => {
    // Signed in 
console.log("Signed");
    const user = userCredential.user;
    if(user!=null){
      console.log('Email verified'+user);

      
signin();

  }
  else if (user==null){
    console.log('empty'+user);
    window.alert("Empty Fields!");
    window.location.href = "/../gfs/signup.php.php?error email in use";
  }
  else{
      console.log('error 404'+user);
      window.alert("error 404!");
    window.location.href = "/../gfs/signup.php.php?error email in use";
  }
    // ...
  })
  .catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;
    console.log("not signed1:"+errorCode);
    console.log("not signed2:"+errorMessage);
    window.alert("Email Already in Use!");
    window.location.href = "/../gfs/signup.php.php?error email in use";
   
    // ..
  });


  function signin()
  {
    console.log('signin');
    signInWithEmailAndPassword(auth, email, password)
      .then((userCredential) => {
        // Signed in 
        const user = userCredential.user;
        if(user!=null){
          console.log('Email verified'+user);
    
          
    sendemail();
    
      }
      else if (user==null){
        console.log('empty'+user);
      }
      else{
          console.log('error 404'+user);
      }
        // ...
      })
      .catch((error) => {
        const errorCode = error.code;
        const errorMessage = error.message;
        console.log("not login1:"+errorCode);
      console.log("not login2:"+errorMessage);
      window.alert("error 404!");
    window.location.href = "/../gfs/signup.php.php?error email in use";
      });
  }

  function sendemail()
  {

    sendEmailVerification(auth.currentUser)
    .then(() => {
      // Email verification sent!
      // ...
      //link();
      console.log("Email verification sent:");
      window.alert("Email Verified!");
      
      //document.getElementById("loading-screen").style.display = "none";
      window.location.href = "userindex/index(orig).php?successful sign up";

    });
  }


  /*const actionCodeSettings = {
    // URL you want to redirect back to. The domain (www.example.com) for this
    // URL must be in the authorized domains list in the Firebase Console.
    url: 'http://localhost/gfs/index(orig).php',
    // This must be true.
    handleCodeInApp: true,
    iOS: {
      bundleId: 'http://localhost/gfs/index(orig).php'
    },
    android: {
      packageName: 'http://localhost/gfs/index(orig).php',
      installApp: true,
      minimumVersion: '12'
    },
    dynamicLinkDomain: 'https{0,1}:\/\/webpetik\.page\.link([\/#\?].*){0,1}$'
  };*/


  /*function link(){

sendSignInLinkToEmail(auth, email, actionCodeSettings)
  .then(() => {
    // The link was successfully sent. Inform the user.
    // Save the email locally so you don't need to ask the user for it again
    // if they open the link on the same device.
    console.log("The link was successfully sent. Inform the user."+errorCode);
    window.localStorage.setItem('emailForSignIn', email);
    window.location.href = "https://mail.google.com/";
    // ...
  })
  .catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;
    // ...
    console.log("not link:"+errorCode);
      console.log("not link:"+errorMessage);
      
  });
  }*/