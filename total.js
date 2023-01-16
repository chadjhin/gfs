console.log("start uploadverloadevent");
  
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";
  
  import { getStorage } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-storage.js";

  import { getFirestore, doc,  getDoc, collection, getCountFromServer} from "https://www.gstatic.com/firebasejs/9.9.2/firebase-firestore.js"; 
  
  
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

window.addEventListener('DOMContentLoaded',async function() {gettotal()});


async  function gettotal(){
    
    var col = sessionStorage.getItem("Col");   //store value if store or clinic 
    var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
    const db = getFirestore(app);


const coll = collection(db, col, docu, "vets");
const snapshot = await getCountFromServer(coll);
console.log('count: ', snapshot.data().count);
}
    
