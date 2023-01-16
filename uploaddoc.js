console.log("start");
  
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";
  
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-analytics.js";
  
  import { getStorage, ref, uploadBytesResumable, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-storage.js";

  import { getFirestore, doc, updateDoc, getDoc, setDoc, collection, addDoc, serverTimestamp  } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-firestore.js"; 
  

  
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

  btns.forEach( function (i) {
  i.addEventListener('click', async function(e)    
    {  
if(this.id == "uploaddoc")
{
  console.log( "inside",col);
  document.getElementById('docform').onsubmit=function()
  {
    return false;
  };

var col = sessionStorage.getItem("Col");   //store value if store or clinic 
var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
console.log( "checkuser",col);
console.log("user_id",docu);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
var documents = "documents";
// Add a new document with a generated id


    console.log("button id", this.id);

  
// Create a storage reference from our storage service
// Create a child reference
const imagesRef = ref(storage, 'usertypes');
    // imagesRef now points to 'usertypes'
    
        var folderhead = 'usertypes/';
        var folderpath = folderhead.concat(col,"/",docu,"/","documents/");
        var doc1 = '#bc';
        var doc2 = '#mbp';
        var doc3 = '#bir';
        var doc4 = '#sss';
        var doc5 = '#spa';
        console.log("folderpath",folderpath);

var file1 = document.querySelector(doc1).files[0];
var file2 = document.querySelector(doc2).files[0];
var file3 = document.querySelector(doc3).files[0];
var file4 = document.querySelector(doc4).files[0];
var file5 = document.querySelector(doc5).files[0];
var name = new Date() +'-'+file1.name;
if (file1 && file2 && file3 && file4 && file5) {


const metadata1 = {
contentType: file1.type  //add size metadata 
};
const metadata2 = {
contentType: file2.type  //add size metadata
};
const metadata3 = {
contentType: file3.type  //add size metadata
};
const metadata4 = {
contentType: file4.type  //add size metadata
};
const metadata5 = {
contentType: file5.type  //add size metadata
};

}else {
  console.log("missing documents");
  window.alert("missing documents");
}
// Upload the file and metadata

const storageRef1 = ref(storage, folderpath + file1.name);
const storageRef2 = ref(storage, folderpath + file2.name);
const storageRef3 = ref(storage, folderpath + file3.name);
const storageRef4 = ref(storage, folderpath + file4.name);
const storageRef5 = ref(storage, folderpath + file5.name);
const uploadTask1 = uploadBytesResumable(storageRef1, file1, metadata1);
const uploadTask2 = uploadBytesResumable(storageRef2, file2, metadata2);
const uploadTask3 = uploadBytesResumable(storageRef3, file3, metadata3);
const uploadTask4 = uploadBytesResumable(storageRef4, file4, metadata4);
const uploadTask5 = uploadBytesResumable(storageRef5, file5, metadata5);

/////////////////////////////////////////////////////////////////////////////////////////////////////// uploadTask1
uploadTask1.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
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
        getDownloadURL(uploadTask1.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

          const data ={          
             bc:downloadURL
        };
        const docuRef = doc(db, col, docu, documents, "docufiles");
        await setDoc(docuRef, {   bc:downloadURL, status: 'PENDING' }, { merge: true });
        
          });
}
);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////uploadTask2
uploadTask2.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
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
        getDownloadURL(uploadTask2.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

          const data ={          
             mbp:downloadURL
        };
        const docuRef = doc(db, col, docu, documents, "docufiles");
        await setDoc(docuRef, {   mbp:downloadURL, status: 'PENDING' }, { merge: true });
        
          
          });
}
);//////////////////////////////////////////////////////////////////////////////////////////////////////uploadTask3
uploadTask3.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
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
        getDownloadURL(uploadTask3.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

          const data ={          
             bir:downloadURL
        };
        const docuRef = doc(db, col, docu, documents, "docufiles");
        await setDoc(docuRef, {  bir:downloadURL, status: 'PENDING' }, { merge: true });
        
          
          
          });
}
);/////////////////////////////////////////////////////////////////////////////////////////////////////////uploadTask4
uploadTask4.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
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
        getDownloadURL(uploadTask4.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

          const data ={          
             sss:downloadURL
        };
        const docuRef = doc(db, col, docu, documents, "docufiles");
        await setDoc(docuRef, {  sss:downloadURL, status: 'PENDING' }, { merge: true });
        
        

          
          
          });
}
);///////////////////////////////////////////////////////////////////////////////////////////////////////uploadTask5
uploadTask5.on('state_changed',
(snapshot) => {
// Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;  // limit the total bytes
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
        getDownloadURL(uploadTask5.snapshot.ref).then( async (downloadURL) => {
          console.log('File available at', downloadURL);

          const data ={          
             spa:downloadURL
        };

          const docuRef = doc(db, col, docu, documents, "docufiles");
          await setDoc(docuRef, { spa:downloadURL, status: 'PENDING' }, { merge: true });
          
          
          });
}
);


if (typeof file1 !== 'undefined' && typeof file2 !== 'undefined' &&typeof file3 !== 'undefined' &&typeof file4 !== 'undefined' && typeof file5 !== 'undefined') {
  console.alert('successfully sent the docucment');
  console.log('successfully sent the docucment');
} 


} 
})
});