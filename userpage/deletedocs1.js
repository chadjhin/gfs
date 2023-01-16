console.log("start");
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";

  import { getFirestore, doc, deleteDoc} from "https://www.gstatic.com/firebasejs/9.9.2/firebase-firestore.js"; 
  
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



const btns = document.querySelectorAll('.btnn');

  btns.forEach( function (i) {
    i.addEventListener('click', async function(e)    
    {    
      e.preventDefault();
      if(this.id ==  "delete"){
        console.log("delete");
        var col = sessionStorage.getItem("Col");  
        var docu = sessionStorage.getItem("Docu");  // store value of user id which is username
        var prodid = sessionStorage.getItem("Prodid");
        var products = "products";

      await deleteDoc(doc(db, col, docu, products, prodid));
      $("#myModal2").modal();

      }
      else if(this.id == "deletepet"){
        console.log("deletepet");
        var col = sessionStorage.getItem("Col");  
        var docu = sessionStorage.getItem("Docu");  // store value of user id which is username
        var petid = sessionStorage.getItem("Petid");
        var pets = "pets";

      await deleteDoc(doc(db, col, docu, pets, petid));
      $("#myModalpet").modal();

      }
      else if(this.id == "deleteserv"){
        console.log("deleteserv");
        var col = sessionStorage.getItem("Col");  
        var docu = sessionStorage.getItem("Docu");  // store value of user id which is username
        var servid = sessionStorage.getItem("Servid");
        var services = "services";

      await deleteDoc(doc(db, col, docu, services, servid));
      $("#myModal3").modal();

      }
      else if(this.id == "deletemobileuser")
      {
        console.log("deletemobileuser");
        var col = sessionStorage.getItem("Col");  
        var docu = sessionStorage.getItem("Docu");  //value of user id which is email

      await deleteDoc(doc(db, col, docu));
      $("#myModalmobile").modal();

      }
      else if(this.id == "deletevet"){
        console.log("deletevet");
        var col = sessionStorage.getItem("Col");  
        var docu = sessionStorage.getItem("Docu");  // store value of user id which is username
        var vetid = sessionStorage.getItem("Vetid");
        var vets = "vets";

      await deleteDoc(doc(db, col, docu, vets, vetid));
      $("#myModal1v").modal();

      }
      
      else if(this.id == "deletereciept"){
        console.log("deletereciept"); 
        var col = sessionStorage.getItem("Col");  
        var docu = sessionStorage.getItem("Docu");  // store value of user id which is username
        var documentid = sessionStorage.getItem("Documentid");
        var subscriptionlist = "subscriptionlist";
        console.log("Col"+col+"Docu"+docu+"documentid"+documentid);
      await deleteDoc(doc(db, col, docu, subscriptionlist, documentid));
      $("#myModalreciept2").modal();

      }

      else if(this.id == "deletusereacc"){
        console.log("deletusereacc"); 
        var col = sessionStorage.getItem("Col");  
        var docu = sessionStorage.getItem("Docu");  // store value of user id which is username
        var documentid = sessionStorage.getItem("Documentid");
        var subscriptionlist = "subscriptionlist";
        console.log("Col"+col+"Docu"+docu+"documentid"+documentid);
      await deleteDoc(doc(db, col, docu, subscriptionlist, documentid));
      $("#myModalreciept2").modal();

      }
      else if(this.id == "deletedocss"){
        console.log("deletedocss"); 
        var col = sessionStorage.getItem("Col");  
        var docu = sessionStorage.getItem("Docu");  // store value of user id which is username
        await deleteDoc(doc(db, col, docu, 'documents', 'docufiles'));
        //const docRef = db.collection(col).doc(docu).collection('documents').doc('docufiles');
      //docRef.update({
        //status: 'DELETED'
      //});
      $("#myModaldoc").modal();

      }else if(this.id == "deletedoc22"){
        console.log("deletedoc22"); 
        var col = sessionStorage.getItem("Col");  
        console.log(col); 
        var docu = sessionStorage.getItem("Docu");console.log(docu);  // store value of user id which is username
        await deleteDoc(doc(db, col, docu, 'documents', 'docufiles'));
        //const docRef = db.collection(col).doc(docu).collection('documents').doc('docufiles');
      //docRef.update({
        //status: 'DELETED'
      //});
      $("#myModaldoc22").modal();

      }

    });

  });


