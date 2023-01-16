
console.log("start");
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";
  
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-analytics.js";
  
  import { getStorage, ref, uploadBytesResumable, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-storage.js";

  import { getFirestore, query, doc,where,onSnapshot,limit,orderBy, updateDoc, getDoc, setDoc, collection, addDoc, serverTimestamp  } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-firestore.js"; 
  
const firebaseConfig = {
  authDomain: "petik-357402.firebaseapp.com",
  projectId: "petik-357402",
  storageBucket: "petik-357402.appspot.com",
  messagingSenderId: "361499100540",
  appId: "1:361499100540:web:af4233dd53e4bab0f750f9",
  measurementId: "G-GPSTS95XWC"
};

const app = initializeApp(firebaseConfig);
const db = getFirestore(app);




const btns = document.querySelectorAll('.btn1');

  btns.forEach( function (i) {
  i.addEventListener('click', async function(e)    
    {    
      console.log("start function",this.id);
////////////////////////////////////////////////////////////////////////////////////////////////  send message  ///////////////////////////////////////////////////////////////////
if(this.id ==  "submitmsg"){
  console.log("inside statement", this.id);
  document.getElementById('messageform').onsubmit=function()
  {
    console.log (document.getElementById('usermsg').value);
    return false;
  };
var usermsg = document.getElementById('usermsg').value;

var col = "chatbox";
var docu = sessionStorage.getItem("Docu");  // store value of user id which is username
var reciever = sessionStorage.getItem("Reciever");
var vets="vets";
console.log( "checkuser",docu);
console.log("user_id",docu);
console.log("message",usermsg);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);

var id = reciever.concat(docu);
console.log("concat id", id);

            const docRef = await addDoc(collection(db, col, id, id), {
              isreadbyreciever: "false",
              isreadbysender: "false",
              recievername: reciever, //change to a variable referencing the user
              sendername: col,
              sentmessage: usermsg,
              timesent: serverTimestamp(),
            });
                
    console.log("created doc with id", docRef.id);
  
} //end of send chat


    });

  });




var i=0;
const q = query(collection(db, "chatbox",'chadjhin2','chadjhin2'),
         where('timesent', '!=', 'false'), orderBy("timesent", "desc"),limit(6));
         console.log("outside");
        
const unsubscribe = onSnapshot(q, (querySnapshot) => {var i=0;
  console.log("inside "); console.log("===========================================");  
  const mess = [];
  const tre=["demo1","demo2","demo3","demo4","demo5","demo6","demo7","demo8","demo9","demo10"];
  const tre2=["1","2","3","4","5","6","7","8","9","0"];
  querySnapshot.forEach((doc) => {
    console.log("count: i",i);
    mess.push(doc.data().name);
var sentmessage = doc.data()['sentmessage'];


//document.getElementById(tre[i]).innerHTML =  doc.data()['sentmessage'];

//document.getElementById("demo").innerHTML =  doc.data()['sentmessage'];

let time = doc.data()['timesent'].toMillis();

let date = new Date(time).toDateString()+' at '+new Date(time).toLocaleTimeString();

var date2 = date;

//document.getElementById(tre2[i]).innerHTML =  date;

//document.getElementById("1").innerHTML =  date;

//let date2 = new Date(doc.data()['timesent'].toDate());

//let fe = new Date( doc.data()['timesent'].seconds*1000 + doc.data()['timesent'].nanoseconds/1000000,);
//var date = fe.toDateString();
//var time=fe.toLocaleTimeString();
//console.log(tre[i]);  
//console.log("html id = ",tre[i]);  
console.log("message:",doc.data()['sentmessage']);   console.log("date: ",date);  

 i++;
 

    $.post("messagelist.php",
    {
      message: doc.data()['sentmessage'],
      date: date
    },
    function(data,status){
      alert("Data: " + data + "\nStatus: " + status);
    });



  });
var i =0;
  
console.log("===========================================");  
});
