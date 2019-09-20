<template>
<div>
    <!-- Grand Titre -->
    <div class="container Frame1 ">
     <div class="Frame11 column "> <a class="TitleStyle">#TECH_CHALLENGE</a> </div>
    </div>
    <!-- Fin Grand Titre -->
    
    <!-- Application -->
    <div class="container Frame2 ">
     <!-- Menu -->
     <div class="Frame22 column ">
     
     <!-- Option 1 -->
      <div class="Frame221 column " @click="GoToPage1()">
         <a class="TitleStyle ">
          <span class="FrameStyle2 glyphicon glyphicon-align-justify"></span>
        </a>
      </div>
      <!-- Fin Option 1 -->
      
      <!-- Option 2 -->
      <div class="Frame221 column " @click="GoToPage2()">
          <a class="TitleStyle ">
          <span class="	FrameStyle2 glyphicon glyphicon-plus"></span>
        </a>
      </div>
      <!-- Option 2 -->
      
      <!-- Option 3 -->
      <div class="Frame221 column " @click="GoToPage3()">
          <a class="TitleStyle ">
          <span class="FrameStyle2	glyphicon glyphicon-user"></span>
        </a>
      </div>
      <!-- Fin Option 3 -->
      
      <!-- Option 4 -->
      <div class="Frame221 column " @click="deconnexion()">
          <a class="TitleStyle ">
          <span class="FrameStyle2	glyphicon glyphicon-log-out"></span>
        </a>
      </div>
      <!-- Fin Option  -->  
     </div>
     <!-- Fin Menu -->
     
     <!-- Interface Application -->
     <div class="Frame21 column ">
     
     <!-- Page 1 de l'interface -->
       <div class="Frame211 column" v-if="PageNumber == 1">
          <div class="col-md-12 FrameStyle1">
           <a class="TitleStyle2">Nombre Elements Générés : +{{elements.length}} </a>
          </div>
          <div class="Frame2 Frame2211 FrameStyle1 ">
           <div v-infinite-scroll="RecupererElements" infinite-scroll-disabled="busy" infinite-scroll-distance="limit">
              <div v-for="(element, index) in elements" :key="index" class="list-group-item FrameStyle4" style="display: flex; " data-aos="slide-up" data-aos-offset="100" data-aos-easing="ease-out-back" >
                   <div class="col-md-12" >
                     <div class="col-md-1" @click="ShowPhoto(element)"><p>{{index+1}}</p></div>
                     <div class="col-md-3" @click="ShowPhoto(element)"><p>{{element.titre}}</p></div>
                     <div class="col-md-6" @click="ShowPhoto(element)"><p>{{element.description}}</p></div>
                     <div class="col-md-2" >
                       <a  type="button" class="btn btn-danger btn-lg" @click="SupprimerElement(element)"> <span class="FrameStyle2	glyphicon glyphicon-remove"></span> </a>
                     </div>
                   </div>
                </div>
            </div>
          </div>
       </div>
     <!-- Fin Page 1 de l'interface -->
     
     <!-- Page 2 de l'interface -->
       <div class="Frame211 column" v-if="PageNumber == 2">
         <form>
             <div class="col-md-12 FrameStyle1">
              <a class="TitleStyle2">Ajouter un Element</a>
             </div>
             <div class="Frame2211 FrameStyle1">
               <FilePond
                  name="test"
                  ref="pond"
                  :maxFiles="1"
                  labelIdle="Ajouter une image (1000x1000)"
                  allowMultiple="false"
                  acceptedFileTypes="image/jpeg, image/png"
                  v-bind:server="myServer"
                  v-bind:files="myFiles"
                  v-on:addfile="NouvelleImage"
                  imagePreviewHeight = "150"
                  imageCropAspectRatio="1:1"
                  />  
             </div>
             <div class="Frame2 Frame2211 FrameStyle1">
                <div class="Frame2212 column form-group FrameStyle1">
                  <input type="text" class=" form-control" placeholder="Titre" v-model="NewElement.titre"></input>
                </div>
                <div class="Frame2212 column form-group FrameStyle1">
                  <textarea type="text" class=" form-control" placeholder="Description" v-model="NewElement.description"></textarea>
                </div>
                <div class="col-md-12   ">
                <a type="button" class="btn btn-light btn-lg" @click="Effacer()"> Effacer</a>
                <a type="button" class="btn btn-success btn-lg"@click="AjouterElement()"> Valider</a>
                </div>       
             </div>
          </form>
       </div>
       <!-- Fin de Page 2 de l'interface -->
         
       <!-- Page 3 de l'interface -->  
       <div class="Frame211 FrameStyle1 column" v-if="PageNumber == 3">
         <form>
            <div style="padding-top:5%;">
               <a class="TitleStyle2" >Souhaitez vous changer votre mot de passe ? </a>
             </div>
             <div class="Frame2 Frame2211 FrameStyle1">
                <div class="Frame2212 column form-group FrameStyle1">
                   <input type="password" class=" form-control" placeholder="Nouveau mot de passe" v-model="UserInformation.nouveaumotdepasse"></input>
                </div>
                <div class="col-md-12">
                <a type="button" class="btn btn-light btn-lg" @click="SupprimerMotdepasse()"> Effacer</a>
                <a type="button" class="btn btn-success btn-lg"@click="ChangerPasse()"> Valider</a>
                </div>
             </div> 
         </form>
       </div>
        <!-- Fin de Page 3 de l'interface -->
    
     </div>
         <!-- Fin de l'Interface Application -->
    </div>
          <!-- Fin Application -->
 
           <!-- Donnés cachées -->
 <a class="hidden" style="display: none;">{{PageNumber}}{{scroll}}{{NewElement.photo}}{{NewElement.titre}}{{NewElement.description}}{{busy}}</a>
            <!-- Fin Donnés cachées -->
 
            <!-- Modal -->
         <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <img :src="PhotoElement()" class="img-responsive">
            </div>
          </div>
         </div>
             <!-- Fin Donnés cachées -->
</div>
</template>

<script>
import vueFilePond from 'vue-filepond';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type'; // A réaintégrer manuellement si erreur 
import FilePondPluginImagePreview from 'filepond-plugin-image-preview'; // A réaintégrer manuellement si erreur 
import 'filepond/dist/filepond.min.css'; // A réaintégrer manuellement si erreur 
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'; // A réaintégrer manuellement si erreur 
import infiniteScroll from 'vue-infinite-scroll';
import AOS from 'aos';
import 'aos/dist/aos.css';


const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview);


    export default {
         //Components
         components: {
         FilePond,
         infiniteScroll,
        },
        // Fin Component
        
        //Data
        data:function() {  
            return {
               scrolledToBottom:false,
                limit: 8,
                busy: false,     
                myFiles:[],
                elements:[],
                elements2:[],
                PageNumber:'1',
                UserInformation:{
                 nouveaumotdepasse:'',
                },
                NewElement :{
                 id:'',
                 photo:'',
                 titre:'',
                 description:'',
                 },
                 myServer: {
                 process: (fieldName, file, metadata, load) => {
                  const formData = new FormData();
                  formData.append('file', file, file.name);
                  load(Date.now())  
                 },
                 },   
         }
        },
        //Fin Data
        
        //Method
        methods: {
             ShowPhoto: function (element) {
              this.NewElement.photo = element.photo;
               $('#myModal').modal('show');
              },
                 
             PhotoElement: function () {
              return '/PhotoElements/'+ this.NewElement.photo;
                },
                
            //Navigation    
              GoToPage1: function () {
                this.PageNumber = '1';
                },
                
              GoToPage2: function () {
                this.PageNumber = '2';
                },
                
              GoToPage3: function () {
                this.PageNumber = '3';
                },
             //Fin Navigation
             
             //Toastr
             elementadded: function() {
              toastr.success('Element Ajouté avec succès')
                },
                
             elementnotadded: function() {
               toastr.warning('Element non ajouté')
                },
                
                motdepassechange: function() {
              toastr.success('Mot de passe change avec succès')
                },
                
             motdepassenonchange: function() {
               toastr.warning('Opération échoué')
                },
                
              elementsupprime: function() {
              toastr.error('Element Supprimé')
                },
                
             elementnonsupprime: function() {
               toastr.warning('Element non supprimé')
                },
               //Fin Toastr 
                 
               //Functions opérationnelles  
               SupprimerMotdepasse: function () {
                 this.UserInformation.nouveaumotdepasse = '';
                },
                
               Effacer: function () {
                this.NewElement.titre = '';
                 this.NewElement.description = '';
                  this.NewElement.photo = '';
                },
                // Fin Functions opérationnelles
                
                //CRUD
               AjouterElement: function () {
                axios.post('/fhykdh6dF6degT5bbH230', this.NewElement)
                .then(() => {
               this.RecupererElementsUpdate();
                })
                .then(() => {
                    this.Effacer();
                    this.GoToPage1();
                    this.elementadded();
                })
               .catch(error => {
                    console.log('errors: ', error)
                     this.elementnotadded();
                })
             },
             
             
               RecupererElements: function () {
                this.busy = true;
                 axios.get('/JKFdc8zdHUjd669efJJBzd').then(response => {
                   const append = response.data.slice(
                     this.elements.length,
                     this.elements.length + this.limit
                   );
                   this.elements = this.elements.concat(append);
                   this.busy = false;
                 })
                .catch(error => {
                    console.log('errors: ', error);
                })
                },
                
                
                RecupererElementsUpdate: function () { 
                 axios.get('/JKFdc8zdHUjd669efJJBze') .then(response => {
                    this.elements = response.data;
                })
                .catch(error => {
                    console.log('errors: ', error);
                })
                },
                
                
                  SupprimerElement: function (element) {
                this.NewElement.id = element.id;
                axios.put('/zdzdzd899Fefef55ZDf63z', this.NewElement)
                .then(() => {
               this.RecupererElementsUpdate();
                })
              .then(() => {
                    this.elementsupprime();
                })
               .catch(error => {
                    console.log('errors: ', error)
                     this.elementnonsupprime();
                })
             },
             
               ChangerPasse: function () {
                axios.put('/kjdhh85GJJ36HGYDUD55eehK', this.UserInformation)
              .then(() => {
                   this.SupprimerMotdepasse();
                   this.GoToPage1();
                   this.motdepassechange();
                })
               .catch(error => {
                    console.log('errors: ', error)
                   this.motdepassenonchange();
                })
             },
           
                
                 NouvelleImage: function(fieldName, file) {
                    var ref = this
                    const reader = new FileReader();
                   reader.readAsDataURL(file.file); 
                   reader.onloadend = function() {
                   ref.NewElement.photo= reader.result;
                  }
                    },
                    //Fin CRUD
                 
                 
                 //Deconnexion
                   deconnexion: function () {
                axios.post('/logout')
                .then(function (response) {
                    window.location.replace('http://localhost:8000/');
                })
                .catch(error => {
                    console.log('errors: ', error);
                })
                },
                //Fin Deconnexion
        },

        computed: {
            
             scroll () {
                 var $this = this;
                     window.onscroll = function(ev) {
                     if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                       $this.RecupererElements();
                       }
                       };
                    },
                    
                  },

   
        filters: {},
        
        created: function () {
             this.RecupererElements();
             this.RecupererElementsUpdate();       
         },        
 }
AOS.init();
</script>

<style>
    
 .sticky {
  position: fixed;
  top: 0;
}

.column {
  --width: 0; 
  
  background-color: #1a2e56;
  border: #1a2e56 0px solid;
  border-radius: 0px;
  padding: 0px;
  flex-basis: calc(var(--width) / var(--columns) * 100%);
}
.Frame1 {
  --columns: 12; 
  margin: 0 auto;
  margin-top: 2%;
  display: flex;
  flex-wrap: wrap;
  padding:0 !important;
 
}


.Frame11 {
  --width: 12;
  height: 7rem;
  text-align: center;

}

.Frame2 {
  --columns: 12;
  
  margin: 0 auto;
  margin-top: 4%;
  display: flex;
  flex-wrap: wrap;
  padding:0 !important;
 
}


.Frame21 {
  --width: 10.9;
  background-color:#f6f5f5;
  padding: 5%;
  margin-left:0.3%
}

.Frame22 {
  --width: 1;
  
  margin-right:0.3%;
}

.Frame211 {
  --width: 1;
   background-color:#f6f5f5;
  
 
}

.Frame221 {
  --width: 1;
  background-color:#d15f18;
  margin-bottom:10.5%;
  height: 8rem !important;
  margin-right:0.3%;
  text-align: center;
}

.Frame2211 {
  --width: 1;
     display: inline;
  margin:7.5%;

}

.Frame2212 {
  --width: 12;
 

}

.TitleStyle {
    color: #fff !important;
    font-size: 4rem;
    text-align: center;
    text-transform: uppercase;
    font-weight: 800;
}

.TitleStyle2 {
    color: black !important;
    font-size: 2.5rem;
    text-align: center;
    text-transform: uppercase;
    font-weight: 800;
}

.FrameStyle1 {
 padding:0;
  text-align: center;
}

.FrameStyle2 {
margin-top:17%;

}

.FrameStyle3 {
    width: 100%;
    
}
.FrameStyle4:hover {
  background-color: #d15f18;
  color:#fff;
}
.FrameStyle4 {
 font-size: 11px;
    color: black;
    font-weight: 600;
text-align: justify;
  width: 100%;
  background-color: #f6f5f5;
}
.content {
  --width: 10.8;
   margin-right: 1%;
}

.cardview {
  --width: 1.08;
  margin:0.5%;
  height: 8rem;
  margin-bottom: 1%;
}

.filepond--drop-label {
    background-color: #1a2e56;
    color:#fff;
}   
</style>

