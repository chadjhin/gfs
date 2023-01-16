console.log("start");
  
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";
  
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-analytics.js";
  
  import { getStorage, ref, uploadBytesResumable, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-storage.js";

  import { getFirestore, doc, updateDoc, getDoc, setDoc} from "https://www.gstatic.com/firebasejs/9.9.2/firebase-firestore.js"; 
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
    {    
      
      console.log("start function",this.id);



      document.getElementById('myform').onsubmit=function(){

        console.log (document.getElementById('Name').value);
        e.preventDefault();
       // return false;
      };
      var addedDocRef = document.getElementById('Name').value;
      var col = sessionStorage.getItem("Col");   //store value if store or clinic 
      var docu = sessionStorage.getItem("Docu");  //store value of user id which is username
      //var addedDocRef = sessionStorage.getItem("AddedDocRef");
      var products="products";
      console.log( "checkuser",col);
      console.log("user_id",docu);
      console.log("product name",addedDocRef);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);
const imageref = doc(db, col, docu); //change the collention andn document to a session or php variable 
const imageref2 = doc(db, col, docu, products, addedDocRef);
      /*if(this.id ==  "uploadprod")
      {
        console.log(this.id);
        $('#uploadprod').click(function(){
          console.log("inside",this.id);

          var form = $('#uploadprod').closest('form');
          var data = form.serialize();
          var URL = form.attr('action');

          $.ajax({
            url: URL,
            data: data,
            method: 'POST'
          }).then(function(){
            console.log('clicked');
            console.log(this.id);
          });
        });
      }*/
      
      if(this.id ==  "uploadprod"){

        console.log("button id", this.id);
        

        


        //e.preventDefault();
      


// Create a storage reference from our storage service
        // Create a child reference
        if(this.id == "upload_btn")
        {

          const imagesRef = ref(storage, 'usertypes');
          console.log(this.id);
        }
        else if(this.id ==  "upload_btn2")
        {
          const imagesRef = ref(storage, 'usertypes');
          console.log(this.id);
        }
        else if(this.id ==  "uploadprod")
        {
          const imagesRef = ref(storage, 'usertypes');
            var folderhead = 'usertypes/';
            var folderpath = folderhead.concat(col,"/",docu,"/","bgimages/");
            var imgid = '#prodimg';
            console.log("folder",folderpath);
            console.log("imgid",imgid);
            console.log(this.id);
            console.log("addedDocRef",addedDocRef);
        }

        
// imagesRef now points to 'images'




if(this.id == "upload_btn")
  {

    var folderhead = 'usertypes/';
    var folderpath = folderhead.concat(folderhead,col,"/",docu,"/","bgimages/");
    var imgid = '#image';
    console.log("folder",folderpath);
    console.log("imgid",imgid);
    console.log(this.id);
  }
else if(this.id ==  "upload_btn2")
  {
    
    var folder = 'bgimages/';
    var imgid = '#image2';
    console.log("folder",folder);
    console.log("imgid",imgid);
    console.log(this.id);
  }

var file = document.querySelector(imgid).files[0];
        var name = new Date() +'-'+file.name;

const metadata = {
  contentType: file.type //change to image.type
};
// Upload the file and metadata

  
const storageRef = ref(storage, folderpath + file.name);
const uploadTask = uploadBytesResumable(storageRef, file, metadata);
uploadTask.on('state_changed',
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
        else if(this.id ==  "uploadprod")
        {
          const docRef = imageref2;
          const docSnap = await getDoc(docRef);

          if (docSnap.exists()) {
            
            console.log("document takin!");
            e.preventDefault();
            return;
          } else {
            document.getElementById('myform').onsubmit=function(){

              $('form[name=form1]').submit();
             
             // return false;
            };
            // doc.data() will be undefined in this case
            document.querySelector('#display3').src = downloadURL;
          //document.querySelector('#image').value = "";

          await setDoc(imageref2, {
          prodimglink: downloadURL
          });

          console.log("savedprod",this.id);
          }
          
        }
      /*document.querySelector('#display').src = downloadURL;
        document.querySelector('#image').value = "";

      await updateDoc(imageref, {
        imagelink: downloadURL
        });*/


    });
  }
);
    }
    })
  });

