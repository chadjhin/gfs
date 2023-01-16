
console.log("start");
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";

  import { getFirestore, query,where,onSnapshot,limit,orderBy,startAfter, collection, addDoc, getDocs, serverTimestamp  } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-firestore.js"; 
  
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

var col = "chatbox";
var docu = sessionStorage.getItem("Docu");  // store value of user id which is username
var reciever = sessionStorage.getItem("Reciever");


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
  console.log("inside statement", this.id);
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

var id = reciever.concat(docu);
console.log("concat id", id);

            const docRef = await addDoc(collection(db, col, id, id), {
              isreadbyreciever: "false",
              isreadbysender: "false",
              recievername: reciever, //change to a variable referencing the user
              sendername: docu,
              sentmessage: usermsg,
              timesent: serverTimestamp(),
            });
                
    console.log("created doc with id", docRef.id);
    textinput.value = '';  

    var i=0;
    const q = query(collection(db, "chatbox",'chadjhin2','chadjhin2'),
             where('timesent', '!=', 'false'), orderBy("timesent", "desc"),limit(6));
             console.log("outside");
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
    
        if(doc.data()['sendername']==docu)
        {
    
          document.getElementById(tre[i]).style.float = "right";
          document.getElementById(display[i]).style.float = "right";
          document.getElementById(display[i]).style.marginLeft = "10px";
          document.getElementById(tre2[i]).style.left = "0";
          document.getElementById(demo2[i]).style.display = "";
          document.getElementById(demo2[i]).style.backgroundColor = "#4EE2EC";
          document.getElementById(tre[i]).innerHTML =  doc.data()['sentmessage'];
          
          let time = doc.data()['timesent'].toMillis();
    
          let date = new Date(time).toDateString()+' at '+new Date(time).toLocaleTimeString();
    
    
          document.getElementById(tre2[i]).innerHTML =  date;
    
          
          console.log(" ONCLICK you html id / sendername / message / date",tre[i], doc.data()['sendername'],doc.data()['sentmessage'], date); 
    
        }
    
        else if (doc.data()['sendername']!=docu){
          
      document.getElementById(tre[i]).style.float = "left";
      document.getElementById(display[i]).style.float = "left";
      document.getElementById(display[i]).style.marginRight = "10px";
      document.getElementById(tre2[i]).style.right = "0";
      document.getElementById(tre2[i]).style.left = "";
      document.getElementById(demo2[i]).style.display = "";
      document.getElementById(tre[i]).innerHTML =  doc.data()['sentmessage'];
      document.getElementById(demo2[i]).style.backgroundColor = "#5FFB17";
          
          let time = doc.data()['timesent'].toMillis();
    
          let date = new Date(time).toDateString()+' at '+new Date(time).toLocaleTimeString();
    
    
          document.getElementById(tre2[i]).innerHTML =  date;
          
          console.log(" ONCLICK them html id / sendername / message / date",tre[i], doc.data()['sendername'],doc.data()['sentmessage'], date); 
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



    
var i=0;
const q = query(collection(db, "chatbox",'chadjhin2','chadjhin2'),
         where('timesent', '!=', 'false'), orderBy("timesent", "desc"),limit(6));
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

    if(doc.data()['sendername']==docu)
    {
      document.getElementById(display[i]).style.float = "right";
      document.getElementById(display[i]).style.marginLeft = "10px";
      document.getElementById(tre[i]).style.float = "right";
      document.getElementById(tre2[i]).style.left = "0";
      document.getElementById(demo2[i]).style.display = "";
      document.getElementById(demo2[i]).style.backgroundColor = "#4EE2EC";
      document.getElementById(tre[i]).innerHTML =  doc.data()['sentmessage'];
      
      let time = doc.data()['timesent'].toMillis();

      let date = new Date(time).toDateString()+' at '+new Date(time).toLocaleTimeString();


      document.getElementById(tre2[i]).innerHTML = date;

      
      console.log("ONLOAD you html id / sendername / message / date",tre[i], doc.data()['sendername'],doc.data()['sentmessage'], date); 

    }

    else if (doc.data()['sendername']!=docu){

      
      document.getElementById(display[i]).style.float = "left";
      document.getElementById(display[i]).style.marginRight = "10px";
      document.getElementById(tre[i]).style.float = "left";
      document.getElementById(tre2[i]).style.right = "0";
      document.getElementById(tre2[i]).style.left = "";
      document.getElementById(demo2[i]).style.display = "";
      document.getElementById(tre[i]).innerHTML =  doc.data()['sentmessage'];
      document.getElementById(demo2[i]).style.backgroundColor = "#5FFB17";

      let time = doc.data()['timesent'].toMillis();

      let date = new Date(time).toDateString()+' at '+new Date(time).toLocaleTimeString();


      document.getElementById(tre2[i]).innerHTML =  date;
      
      console.log("ONLOAD them html id / sendername / message / date",tre[i], doc.data()['sendername'],doc.data()['sentmessage'], date); 
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
        var i=0;
        const q = query(collection(db, "chatbox",'chadjhin2','chadjhin2'),
                 where('timesent', '!=', 'false'), orderBy("timesent", "desc"),startAfter(lastVisible),limit(6));
                 console.log("outside");
                
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

            
    document.getElementById(tre[i]).innerHTML =  "";
    document.getElementById(tre2[i]).innerHTML = "";

            if(doc.data()['sendername']==docu)
            {
              document.getElementById(display[i]).style.float = "right";
              document.getElementById(display[i]).style.marginLeft = "10px";
              document.getElementById(tre[i]).style.float = "right";
              document.getElementById(tre2[i]).style.left = "0";
              document.getElementById(demo2[i]).style.display = "";
              document.getElementById(demo2[i]).style.backgroundColor = "#4EE2EC";
              document.getElementById(tre[i]).innerHTML =  doc.data()['sentmessage'];
              
              let time = doc.data()['timesent'].toMillis();
        
              let date = new Date(time).toDateString()+' at '+new Date(time).toLocaleTimeString();
        
        
              document.getElementById(tre2[i]).innerHTML = date;
        
              
              console.log("ONLOAD you html id / sendername / message / date",tre[i], doc.data()['sendername'],doc.data()['sentmessage'], date); 
        
            }
        
            else if (doc.data()['sendername']!=docu){
        
              
              document.getElementById(display[i]).style.float = "left";
              document.getElementById(display[i]).style.marginRight = "10px";
              document.getElementById(tre[i]).style.float = "left";
              document.getElementById(tre2[i]).style.right = "0";
              document.getElementById(tre2[i]).style.left = "";
              document.getElementById(demo2[i]).style.display = "";
              document.getElementById(tre[i]).innerHTML =  doc.data()['sentmessage'];
              document.getElementById(demo2[i]).style.backgroundColor = "#5FFB17";
        
              let time = doc.data()['timesent'].toMillis();
        
              let date = new Date(time).toDateString()+' at '+new Date(time).toLocaleTimeString();
        
        
              document.getElementById(tre2[i]).innerHTML =  date;
              
              console.log("ONLOAD them html id / sendername / message / date",tre[i], doc.data()['sendername'],doc.data()['sentmessage'], date); 
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

    
  

