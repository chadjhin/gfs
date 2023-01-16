
console.log("start");
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";

  import { getFirestore,doc,getDoc, query,where,onSnapshot,limit,orderBy,startAfter, collection, addDoc, getDocs, serverTimestamp  } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-firestore.js"; 
  
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

var col = "messages";
var docu = sessionStorage.getItem("Docu");  // store value of user  which is username
var receiver = sessionStorage.getItem("Receiver");


const checkEmpty = document.querySelector('#usermsg');
const btns = document.querySelectorAll('.btn1');

  btns.forEach( function (i) {
    i.addEventListener('click', async function(e)    
    {    
      
      e.preventDefault();
      if (checkEmpty.value && // if exist AND
    checkEmpty.value.length > 0 && // if value have one charecter at least
    checkEmpty.value.trim().length > 0 // if value is not just spaces
  ) {
      console.log("start function",this.id);
////////////////////////////////////////////////////////////////////////////////////////////////  send message  ///////////////////////////////////////////////////////////////////
if(this.id ==  "submitmsg"){
  console.log("inside statement of submitmsg", this.id);
  document.getElementById('messageform').onsubmit=function()
  {
    console.log (document.getElementById('usermsg').value);
    return false;
  };
var usermsg = document.getElementById('usermsg').value;
var textinput = document.getElementById('usermsg');
console.log( "checkuser",docu);
console.log("user_id",docu);
console.log("message",usermsg);

// Initialize Cloud Firestore and get a reference to the service
const db = getFirestore(app);

/*var date = new Date();
var dateStr =
date.getFullYear() + ":" +("00" + (date.getMonth() + 1)).slice(-2) + ":" +
  ("00" + date.getDate()).slice(-2) + ":" +
  
  ("00" + date.getHours()).slice(-2) + ":" +
  ("00" + date.getMinutes()).slice(-2) + ":" +
  ("00" + date.getSeconds()).slice(-2);
console.log(dateStr);*/

let date = new Date(); // Current date and time

// Get the year, month, day, hours, minutes, and seconds
let year = date.getFullYear();
let month = ("00" + (date.getMonth() + 1)).slice(-2);//date.getMonth() + 1; // January is 0
let day =("00" + date.getDate()).slice(-2);//date.getDate();
let hours = ("00" + date.getHours()).slice(-2);//date.getHours();
let minutes = ("00" + date.getMinutes()).slice(-2);//date.getMinutes();
let seconds = ("00" + date.getSeconds()).slice(-2);//date.getSeconds();

// Convert hours to 12-hour clock format
let amPm = "AM";
if (hours >= 12) {
  amPm = "PM";
  hours -= 12;
  if (hours === 0) {
    hours = 12;
  }
}
console.log(`${year}-${month}-${day} ${hours}:${minutes}:${seconds} ${amPm}`);
var dateStr =year + ":" + month + ":" + day + ":" + hours + ":" + minutes+ ":" + seconds;

            const docRef = await addDoc(collection(db, "Petlover", docu, col, receiver, "chats"), {
              id: docu,
              receiver: docu, //change to a variable referencing the user
              sender: receiver,
              message: usermsg,
              timestamp: dateStr,
            });
                
    console.log("created doc with id", docRef.id);
    textinput.value = '';  

    const docRef2 = doc(db, "Petlover",  docu, col, receiver);
    const docSnap = await getDoc(docRef2);
    if (docSnap.exists()) {
      var dp = docSnap.data()['pp'];
    } else {
      // doc.data() will be undefined in this case
      console.log("No such document!");
    }const docRef22 = doc(db, "Petlover",  docu);
    const docSnap22 = await getDoc(docRef22);
    if (docSnap22.exists()) {
      var dp2 = docSnap22.data()['ppUrl']; console.log(dp2);
    } else {
      // doc.data() will be undefined in this case
      console.log("No such document!"); console.log(dp2);
    }

    var i=0;
    const q = query(collection(db,  "Petlover", docu, col, receiver, "chats"),
             where('timestamp', '!=', 'false'), orderBy("timestamp", "desc"),limit(6));
             console.log("outside2");
             const getdocu = await getDocs(q);

            var lastVisible = getdocu.docs[getdocu.docs.length-1];
            console.log("last", lastVisible);


    const unsubscribe = onSnapshot(q, (querySnapshot) => {var i=0;
      console.log("inside "); console.log("===========================================");  
      const mess = [];
      const tre=["demo1","demo2","demo3","demo4","demo5","demo6"];
      const tre2= ["1","2","3","4","5","6"];
      
      const demo2 = ["demo11","demo22","demo33","demo44","demo55","demo66"];
      const display = ["display0","display1","display2","display3","display4","display5"];
      querySnapshot.forEach((doc) => {
        console.log("count: i",i);
        mess.push(doc.data().name);
    
        if(doc.data()['sender']==docu)
        {
    
          document.getElementById(tre[i]).style.float = "right";
          document.getElementById(display[i]).style.float = "right";
          document.getElementById(display[i]).style.marginLeft = "10px";
          document.getElementById(tre2[i]).style.left = "0";
          document.getElementById(demo2[i]).style.display = "";
          document.getElementById(demo2[i]).style.backgroundColor = "#4EE2EC";
          document.getElementById(tre[i]).innerHTML =  doc.data()['message'];
          
          document.getElementById(display[i]).src = dp2;

          
          //let time = doc.data()['timestamp'];
          
          //let date = new Date(time.seconds*1000);
    
          document.getElementById(tre2[i]).innerHTML =  doc.data()['timestamp'];
          
          
          console.log(" ONCLICK you html id / sendername / message / time",tre[i], doc.data()['sender'],doc.data()['message'], doc.data()['timestamp']); 
    
        }
    
        else if (doc.data()['sender']!=docu){
          
      document.getElementById(tre[i]).style.float = "left";
      document.getElementById(display[i]).style.float = "left";
      document.getElementById(display[i]).style.marginRight = "10px";
      document.getElementById(tre2[i]).style.right = "0";
      document.getElementById(tre2[i]).style.left = "";
      document.getElementById(demo2[i]).style.display = "";
      document.getElementById(tre[i]).innerHTML =  doc.data()['sentmessage'];
      document.getElementById(demo2[i]).style.backgroundColor = "#5FFB17";
      document.getElementById(display[i]).src = dp;
          let time = doc.data()['timestamp'];
    
    
          document.getElementById(tre2[i]).innerHTML =  time;
          
          console.log(" ONCLICK them html id / sendername / message / time",tre[i], doc.data()['sender'],doc.data()['message'], time); 
        }
    
    
    //document.getElementById("1").innerHTML =  date;
    
    //let date2 = new Date(doc.data()['timesent'].toDate());
    
    //let fe = new Date( doc.data()['timesent'].seconds*1000 + doc.data()['timesent'].nanoseconds/1000000,);
    //var date = fe.toDateString();
    //var time=fe.toLocaleTimeString();
    //console.log(tre[i]);  
    
     i++;
    
     //sessionStorage.setItem(message[i],doc.data()['sentmessage']);
    
    
      });
    
    
    var i =0;
      
    console.log("===========================================");  
    });

    //unsubscribe2();
    
} 
}
else{alert("empty text message");}//end of send chat


    });

  });

  const docRef2 = doc(db, "Petlover",  docu, col, receiver);
    const docSnap = await getDoc(docRef2);
    if (docSnap.exists()) {
      var dp = docSnap.data()['pp'];
    } else {
      var dp  = '../assets/img/default-avatar.png';
    }
    const docRef22 = doc(db, "Petlover",  docu);
    const docSnap22 = await getDoc(docRef22);
    if (docSnap22.exists()) {
      var dp2 = docSnap22.data()['ppUrl']; console.log(dp2);
    } else {
      var dp2  = '../assets/img/default-avatar.png';
      console.log(dp2);
    }

var i=0;
const q = query(collection(db,  "Petlover", docu, col, receiver, "chats"),
         where('timestamp', '!=', 'false'), orderBy("timestamp", "desc"),limit(6));
         console.log(docu);
         console.log(col);
         console.log(receiver);
         console.log("outside");
        
         const getdocu = await getDocs(q);

         var lastVisible = getdocu.docs[getdocu.docs.length-1];
         console.log("last", lastVisible);
const unsubscribe2 = onSnapshot(q, (querySnapshot) => {var i=0;
  console.log("inside "); console.log("===========================================");  
  const mess = [];
  const tre=["demo1","demo2","demo3","demo4","demo5","demo6","demo7","demo8","demo9","demo10"];
  const tre2=["1","2","3","4","5","6","7","8","9","0"];
  
  const display = ["display0","display1","display2","display3","display4","display5"];
  const demo2 = ["demo11","demo22","demo33","demo44","demo55","demo66"];
  querySnapshot.forEach((doc) => {
    console.log("count: i",i);
    mess.push(doc.data().name);

    if(doc.data()['sender']==docu)
    {
      document.getElementById(display[i]).style.float = "right";
      document.getElementById(display[i]).style.marginLeft = "10px";
      document.getElementById(tre[i]).style.float = "right";
      document.getElementById(tre2[i]).style.left = "0";
      document.getElementById(demo2[i]).style.display = "";
      document.getElementById(demo2[i]).style.backgroundColor = "#4EE2EC";
      document.getElementById(tre[i]).innerHTML =  doc.data()['message'];
      document.getElementById(display[i]).src = dp2;
      let time = doc.data()['timestamp'];


      document.getElementById(tre2[i]).innerHTML = time;

      
      console.log("ONLOAD you html id / sendername / message / time",tre[i], doc.data()['sender'],doc.data()['message'], time); 

    }

    else if (doc.data()['sender']!=docu){

      
      document.getElementById(display[i]).style.float = "left";
      document.getElementById(display[i]).style.marginRight = "10px";
      document.getElementById(tre[i]).style.float = "left";
      document.getElementById(tre2[i]).style.right = "0";
      document.getElementById(tre2[i]).style.left = "";
      document.getElementById(demo2[i]).style.display = "";
      document.getElementById(tre[i]).innerHTML =  doc.data()['message'];
      document.getElementById(demo2[i]).style.backgroundColor = "#5FFB17";
      document.getElementById(display[i]).src = dp;
      let time = doc.data()['timestamp'];


      document.getElementById(tre2[i]).innerHTML =  time;
      
      console.log("ONLOAD them html id / sendername / message / time",tre[i], doc.data()['sender'],doc.data()['message'], time); 
    }


//document.getElementById("1").innerHTML =  date;

//let date2 = new Date(doc.data()['timesent'].toDate());

//let fe = new Date( doc.data()['timesent'].seconds*1000 + doc.data()['timesent'].nanoseconds/1000000,);
//var date = fe.toDateString();
//var time=fe.toLocaleTimeString();
//console.log(tre[i]);  

 i++;

 //sessionStorage.setItem(message[i],doc.data()['sentmessage']);


  });


var i =0;
  
console.log("===========================================");  
});





const btns2 = document.querySelectorAll('.olderbtn2');

btns2.forEach( function (i) {
    i.addEventListener('click', async function(e)    
    {    
      
      e.preventDefault();
      


      if(this.id ==  "oldermessage")
      {


        const docRef2 = doc(db, "Petlover",  docu, col, receiver);
        const docSnap = await getDoc(docRef2);
        if (docSnap.exists()) {
          var dp = docSnap.data()['pp'];
        } else {
          var dp  = '../assets/img/default-avatar.png';
        }
        const docRef22 = doc(db, "Petlover",  docu);
        const docSnap22 = await getDoc(docRef22);
        if (docSnap22.exists()) {
          var dp2 = docSnap22.data()['ppUrl']; console.log(dp2);
        } else {
          var dp2  = '../assets/img/default-avatar.png';
          console.log(dp2);
        }

        var i=0;
        const q = query(collection(db,  "Petlover", docu, col, receiver, "chats"),
                 where('timestamp', '!=', 'false'), orderBy("timestamp", "desc"),startAfter(lastVisible),limit(6));
                 console.log("outside");
                
        const unsubscribe2 = onSnapshot(q, (querySnapshot) => {var i=0;
          console.log("inside"); console.log("===========================================");  
          const mess = [];
          const tre=["demo1","demo2","demo3","demo4","demo5","demo6","demo7","demo8","demo9","demo10"];
          const tre2=["1","2","3","4","5","6","7","8","9","0"];
          
          const display = ["display0","display1","display2","display3","display4","display5"];
          const demo2 = ["demo11","demo22","demo33","demo44","demo55","demo66"];
          querySnapshot.forEach((doc) => {
            console.log("count: i",i);
            mess.push(doc.data().name);

            
    document.getElementById(tre[i]).innerHTML =  "";
    document.getElementById(tre2[i]).innerHTML = "";

            if(doc.data()['sender']==docu)
            {
              document.getElementById(display[i]).style.float = "right";
              document.getElementById(display[i]).style.marginLeft = "10px";
              document.getElementById(tre[i]).style.float = "right";
              document.getElementById(tre2[i]).style.left = "0";
              document.getElementById(demo2[i]).style.display = "";
              document.getElementById(demo2[i]).style.backgroundColor = "#4EE2EC";
              document.getElementById(tre[i]).innerHTML =  doc.data()['message'];
              document.getElementById(display[i]).src = dp2;
              let time = doc.data()['timestamp'];
        
        
              document.getElementById(tre2[i]).innerHTML = time;
        
              
              console.log("ONLOAD you html id / sendername / message / date",tre[i], doc.data()['sender'],doc.data()['message'], time); 
        
            }
        
            else if (doc.data()['sender']!=docu){
        
              
              document.getElementById(display[i]).style.float = "left";
              document.getElementById(display[i]).style.marginRight = "10px";
              document.getElementById(tre[i]).style.float = "left";
              document.getElementById(tre2[i]).style.right = "0";
              document.getElementById(tre2[i]).style.left = "";
              document.getElementById(demo2[i]).style.display = "";
              document.getElementById(tre[i]).innerHTML =  doc.data()['message'];
              document.getElementById(demo2[i]).style.backgroundColor = "#5FFB17";
              document.getElementById(display[i]).src = dp;
              let time = doc.data()['timestamp'];
        
        
              document.getElementById(tre2[i]).innerHTML =  time;
              
              console.log("ONLOAD them html id / sendername / message / time",tre[i], doc.data()['sender'],doc.data()['message'], time); 
            }
        
        
        //document.getElementById("1").innerHTML =  date;
        
        //let date2 = new Date(doc.data()['timesent'].toDate());
        
        //let fe = new Date( doc.data()['timesent'].seconds*1000 + doc.data()['timesent'].nanoseconds/1000000,);
        //var date = fe.toDateString();
        //var time=fe.toLocaleTimeString();
        //console.log(tre[i]);  
        
         i++;
        
         //sessionStorage.setItem(message[i],doc.data()['sentmessage']);
        
        
          });
          var c=i;
          for(c;i<=6;c++)
          {
          document.getElementById(tre[c]).innerHTML =  "";
          document.getElementById(tre2[c]).innerHTML = "";

          
          document.getElementById(display[c]).style.float = "";
          document.getElementById(display[c]).style.marginRight = "";
          document.getElementById(tre[c]).style.float = "";
          document.getElementById(tre2[c]).style.right = "";
          document.getElementById(tre2[c]).style.left = "";
          document.getElementById(demo2[c]).style.display = "none";
          document.getElementById(demo2[c]).style.backgroundColor = "";
          }
        var i =0;
          
        console.log("===========================================");  
        });
      
      }  // end of older message

    });

  });

    
  

