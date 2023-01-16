console.log("start");
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

  const btns = document.querySelectorAll('.btn1');


  btns.forEach(function (i) {
  i.addEventListener('click', function(e)    
    {e.preventDefault();

      console.log(this.id);

// Create a storage reference from our storage service
        // Create a child reference
        if(this.id == "upload_btn")
        {

          const imagesRef = ref(storage, 'images');
          //console.log("btn up");
        }
        else if(this.id ==  "upload_btn2")
        {
          const imagesRef = ref(storage, 'bgimages');
        }
// imagesRef now points to 'images'

//var col = <?php echo json_encode($_SESSION['checkuser']); ?>;
//var docu = <?php echo $_SESSION['user_id']; ?>;

var col = sessionStorage.getItem("Col");   //store value if store or clinic 
var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
console.log( "checkuser",col);
console.log("user_id",docu);


// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
const imageref = doc(db, col, docu); //change the collention andn document to a session or php variable 

if(this.id == "upload_btn")
  {

    var folder = 'images/';
    var imgid = '#image';
    console.log("folder",folder);
    console.log("imgid",imgid);
  }
else if(this.id ==  "upload_btn2")
  {
    
    var folder = 'bgimages/';
    var imgid = '#image2';
    console.log("folder",folder);
    console.log("imgid",imgid);
  }


var file = document.querySelector(imgid).files[0];
        var name = new Date() +'-'+file.name;

const metadata = {
  contentType: file.type
};
console.log("out");
// Upload the file and metadata

  
const storageRef = ref(storage, folder + file.name);
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

      if(this.id == "upload_btn")
        {
          document.querySelector('#display').src = downloadURL;
          //document.querySelector('#image').value = "";
          await updateDoc(imageref, {
          imagelink: downloadURL
          });
        }
      else if(this.id ==  "upload_btn2")
        {
          document.querySelector('#display2').src = downloadURL;
          //document.querySelector('#image').value = "";

          await updateDoc(imageref, {
          bgimagelink: downloadURL
          });
        }
      /*document.querySelector('#display').src = downloadURL;
        document.querySelector('#image').value = "";

      await updateDoc(imageref, {
        imagelink: downloadURL
        });*/


    });
  }
);

    })
  });
