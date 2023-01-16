console.log("start uploadverloadevent");
  
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";
  
  import { getStorage } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-storage.js";

  import { getFirestore, doc,  getDoc, } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-firestore.js"; 
  

  
  // https://firebase.google.com/docs/web/setup#available-libraries
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    authDomain: "petik-357402.firebaseapp.com",
    projectId: "petik-357402",
    storageBucket: "petik-357402.appspot.com",
    messagingSenderId: "361499100540",
    appId: "1:361499100540:web:af4233dd53e4bab0f750f9",
    measurementId: "G-GPSTS95XWC"
  };
  
   // Initialize Firebase
const app = initializeApp(firebaseConfig);
// Initialize Cloud Storage and get a reference to the service
const storage = getStorage(app);

window.addEventListener('DOMContentLoaded',async function() {checksched()});
async  function checksched(){
  var col = sessionStorage.getItem("Col");   //store value if store or clinic 
var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
var vetid = sessionStorage.getItem("Vetid");
const db = getFirestore(app);
getDoc(doc(db, col, docu,"vets",vetid)).then(docSnap => {
  if (docSnap.exists()) {
    console.log("Document data:", docSnap.data());
    if(docSnap.data()['Sunday']!="")
    {
      console.log("Document data:", docSnap.data()['Sunday']);
      document.querySelector("[name='Sundaytime']").type ="show";
      document.getElementById("Sunday").checked=true;
    }
    if(docSnap.data()['Monday']!="")
    {
      console.log("Document data:", docSnap.data()['Monday']);
      document.querySelector("[name='Mondayt']").type ="show";
      document.getElementById("Monday").checked=true;
    }
    if(docSnap.data()['Tuesday']!="")
    {
      console.log("Document data:", docSnap.data()['Tuesday']);
      document.querySelector("[name='Tuesdaytime']").type ="show";
      document.getElementById("Tuesday").checked=true;
    }
    if(docSnap.data()['Wednesday']!="")
    {
      console.log("Document data:", docSnap.data()['Wednesday']);
      document.querySelector("[name='Wednesdaytime']").type ="show";
      document.getElementById("Wednesday").checked=true;
    }
    if(docSnap.data()['Thursday']!="")
    {
      console.log("Document data:", docSnap.data()['Thursday']);
      document.querySelector("[name='Thursdaytime']").type ="show";
      document.getElementById("Thursday").checked=true;
    }
    if(docSnap.data()['Friday']!="")
    {
      console.log("Document data:", docSnap.data()['Friday']);
      document.querySelector("[name='Fridaytime']").type ="show";
      document.getElementById("Friday").checked=true;
    }
    if(docSnap.data()['Saturday']!="")
    {
      console.log("Document data:", docSnap.data()['Saturday']);
      document.querySelector("[name='Saturdaytime']").type ="show";
      document.getElementById("Saturday").checked=true;
    }
  } else {
    console.log("No such document!");
  }
});
  }
