
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";
  
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-analytics.js";
  
  import { getStorage, ref, uploadBytesResumable, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-storage.js";

  import { getFirestore, doc, updateDoc} from "https://www.gstatic.com/firebasejs/9.9.2/firebase-firestore.js"; 
  
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
  
    const btn = document.querySelector('#upload_btn');

    btn.addEventListener('click', function(e){
        e.preventDefault();

// Create a storage reference from our storage service
        // Create a child reference
const imagesRef = ref(storage, 'images');
// imagesRef now points to 'images'

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
const imageref = doc(db, "petstore", "chad"); //change the collention andn document to a session or php variable 
var file = document.querySelector('#image').files[0];
        var name = new Date() +'-'+file.name;

const metadata = {
  contentType: file.type
};

// Upload the file and metadata
const storageRef = ref(storage, 'images/' + file.name);
const uploadTask = uploadBytesResumable(storageRef, file, metadata);
uploadTask.on('state_changed',
  (snapshot) => {
    // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
    const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
    console.log('Upload is ' + progress + '% done');
    switch (snapshot.state) {
      case 'paused':
        console.log('Upload is paused');
        break;
      case 'running':
        console.log('Upload is running');
        break;
    }
  }, 
  (error) => {
    // A full list of error codes is available at
    // https://firebase.google.com/docs/storage/web/handle-errors
    switch (error.code) {
      case 'storage/unauthorized':
        // User doesn't have permission to access the object
        break;
      case 'storage/canceled':
        // User canceled the upload
        break;

      // ...

      case 'storage/unknown':
        // Unknown error occurred, inspect error.serverResponse
        break;
    }
  }, 
  () => {
    // Upload completed successfully, now we can get the download URL
    getDownloadURL(uploadTask.snapshot.ref).then( async (downloadURL) => {
      console.log('File available at', downloadURL);

      document.querySelector('#display').src = downloadURL;
      document.querySelector('#image').value = "";

      await updateDoc(imageref, {
        imagelink: downloadURL
        });


    });
  }
);

    })