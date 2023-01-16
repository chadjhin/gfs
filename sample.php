<?php

/*require_once 'vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;
$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);
    # [START fs_add_doc_data_with_auto_id]
    # [START firestore_data_set_id_random_collection]
    /*$data = [
        'name' => 'Tokyo',
        'country' => 'Japan'
    ];
    $addedDocRef = $db->collection('usersample')->add($data);
    printf('Added document with ID: %s' . PHP_EOL, $addedDocRef->id());
    
    
//use Google\Cloud\Firestore\FirestoreClient;
require_once 'firestore.php';

$fs = new firestore(collection:'admin');
//$fs = new firestore(collection:'food'); // drop new doc food


//print_r($fs->getDocument(name: '3yBsyU7BYV4APf0vR4oD'));
//print_r($fs->newDocument('3yBsyU7BYV4APf0vR4oD',['adminpass' => 'admin12345']));
//$fs->getWhere(field: 'adminpass', operator: '=', value: 'admin123');
//print_r($fs->newUserCollection(name:'food', doc_name: 'meat'));
//print_r($fs->dropDocument(name:'meat'));
//print_r($fs->dropCollection(name: 'food'));
    
    
    */// Create the Cloud Firestore cli
   ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Firebase Lesson</title>
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <style>
        input[type="file"] {
    display: none;
}
  .custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
  </style>
    </head>
    <body>
    
    
    
            <label for="file-upload" class="custom-file-upload">
                  <i class="fa fa-image-upload"></i> Custom Upload
                  </label>
                  <input id="file-upload" type="file"/>
                <div class="text-center mt-5">
                    <img class="rounded" alt="..." id="display">
                  </div>
    
    
        <script type="module">
        // Import the functions you need from the SDKs you need
      import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";
      
      import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-analytics.js";
      
      import { getStorage, ref, uploadBytesResumable, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-storage.js";
    
      import { getFirestore, doc, updateDoc} from "https://www.gstatic.com/firebasejs/9.9.2/firebase-firestore.js"; 
      
      // https://firebase.google.com/docs/web/setup#available-libraries
    
      // Your web app's Firebase configuration
      // For Firebase JS SDK v7.20.0 and later, measurementId is optional
      const firebaseConfig = {
        apiKey: "AIzaSyCx_MTN7DUx0ijSV_vGtZ_pPvCbY9N3w08",
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
      
        const btn = document.querySelector('#file-upload');
    
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
    
        </script>
            
    </body>
    </html>
    



