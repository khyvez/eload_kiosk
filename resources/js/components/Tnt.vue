<template>
  <div>
    
    
<div style="    position: absolute;
    top: 20px;
    left: 30px;
    cursor: pointer;
    ">
  <a @click="home()"><i class="fas fa-4x text-white fa-arrow-circle-left    "></i></a>
</div>

    <div class="row">
       <div class="col">
        <div class="card-choice" style="width:100%;">
            <div class="row">
              <div class="col text-right">
        
              </div>
            </div>
            <div id="accordion" class="accordion">
                <div class="card-header  collapsed" aria-expanded="true" data-toggle="collapse" href="#collapseOne">
                  <div class="row">
                    <div class="col-md-8">
                  <a class="card-title ">
                                    Regular Load
                                  </a>
                    </div>
                    <div class="col-md-4 text-right">
                                 <img src="/image/tnt.png" style="width:100px; height:50px;" class="imgchoice" alt="">
                    </div>
                  </div>
               
                </div>
                <div id="collapseOne" class="card-body collapse show " data-parent="#accordion">
                   <div class="row">
                        <div class="col-md-5">
                       
              <small><label for="">Cellphone #</label></small>
                           

                      <div class="input-group mb-3">
                        
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-mobile    "></i></span>
                          </div>
                          <input v-model="contact"   placeholder="ex: 09290192929" class="form-control" @focus="show" data-layout="numeric"
        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
        type = "number"
        maxlength = "11"
/>
                 </div>
                   </div>
                            <div class="form-group col-md-5">
                                <small><label for="">Amount</label></small>

                                       <div class="input-group mb-3">
                       
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-coins    "></i></span>
                          </div>
                             <input v-model="load_amount" class="form-control" type="number" placeholder="ex: 50" @focus="show" data-layout="numeric" />
 
                                       </div>
 
                              </div>
                      
                              <input v-model="network" type="hidden" name="network" >
                              <input v-model="loadtype"  type="hidden" name="loadtype">
                       
                         
                           <div class="col py-5">
                                 <button @click="buyBtn()" type="submit" class="btn btn-lg btn-primary btn-block">Buy Load</button>
                           
                      </div>
                    </div> 
                
                    <div class="row">
                      <div class="col">
                             <vue-touch-keyboard :options="options" v-if="visible" :layout="layout" :cancel="hide" :accept="accept" :input="input" />

                      </div>
                    </div>
                </div>
              
                               <div class="card-header  collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    <a class="card-title ">
                      Promo
                    </a>
                </div>
                <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >
                    <div class="row">
                        <div class="col-md-5">
                          

                            <div class="form-group">
                                <small><label for="">Cellphone #</label></small>
                                  <div class="input-group mb-3">
                        
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-mobile    "></i> </i>  </span>
                          </div>
                          <input v-model="contact"   placeholder="ex: 09290192929" class="form-control" @focus="show" data-layout="numeric"
        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
        type = "number"
        maxlength = "11"
/>
                 </div>
                              </div>
                              </div>
                            <div class="col-md-5">
                                 <div class="form-group">
                                    <small><label for="">Promo</label></small>
                                         <Select2 v-model="myValue" :options="myOptions" :settings="{ settingOption: value, settingOption: value }" @change="myChangeEvent($event)" @select="mySelectEvent($event)" />
  
                          
                                 </div>

                        
                           
                             
                        </div>

                            <div class="col-md-2 py-5">
                                   <div class="form-group">
                                    <button @click="buyPromo()" class="btn btn-lg btn-primary btn-block">Buy Promo</button>
                                </div>
                        </div>
                    </div>
                 

                           <div class="row">
                      <div class="col">
                             <vue-touch-keyboard :options="options" v-if="visible" :layout="layout" :cancel="hide" :accept="accept" :input="input" />

                      </div>
                    </div>

                    </div>
           
            </div>
        </div>
    </div>

    </div>
    <div class="row">
      <div class="col">
     
      </div>
    </div>

  

    <div class="vld-parent">
        <loading :active.sync="isLoading" 
        :can-cancel="false" 
        :on-cancel="onCancel"
        :is-full-page="fullPage"></loading>
        
        </div>
  
  </div>
</template>
 
<script>
  import VueTouchKeyboard from "vue-touch-keyboard";
  import style from "vue-touch-keyboard/dist/vue-touch-keyboard.css"; // load default style
  import Loading from 'vue-loading-overlay';
    // Import stylesheet
    import 'vue-loading-overlay/dist/vue-loading.css';

  Vue.use(VueTouchKeyboard);
  export default {
    created() {
      this.fetchPromo();
      setInterval(function () {
		      this.fetchStatus();
		 }.bind(this), 500);

    },
  data() {
      return {
            isStatus: false,
            contact: '',
            load_amount: '',
            network: 'tnt',
            loadtype:'regular',
        
            isLoading: false,
            fullPage: true,
            myValue: '',
            myValueTex: '',
            myOptions: [
              {id: '21', text: 'Go Allnet 30'},
              {id: '22', text: 'Go Allnet 50'},
              {id: '23', text: 'GO Unli 20'},
              {id: '24', text: 'Go Unli 25'},
               {id: '25', text: 'Go Unli 30'},
               {id: '26', text: 'Go Unli 50'},
               {id: '27', text: 'Go Unli 95'},
               {id: '31', text: 'GoSurf 15'},
               {id: '32', text: 'GoSurf 30'},
               {id: '33', text: 'GoSurf 50'},
               {id: '34', text: 'GoSakto 70'},
               {id: '35', text: 'GoSakto 90'},
               {id: '313', text: 'GoWatch 99'},
           
       
              
              ],
            visible: false,
            layout: "normal",
            input: null,
            options: {
              useKbEvents: false,
              preventClickEvent: false
            }
    }
  },
  components:{
    Loading
  },
 
    methods: {
      doAjax() {
                this.isLoading = true;
                // simulate AJAX
                setTimeout(() => {
                  this.isLoading = false
                },5000)
            },
            onCancel() {
              console.log('User cancelled the loader.')
            },
                   home(){
                 window.location.href = '/';
            },
            fetchPromo(){
      
              axios.get('/smartpromo',  {params: {
                        network: 'tnt'
                    }
                    }).then((res) => {
                    this.myOptions = res.data;
                    console.log(res);
                });
              

             
        },
        fetchStatus() {
     
              if(this.isStatus){
                axios.get('/getStatus').then((res) => {
                  if(res.data == "OK"){
                          Swal.fire(
                          'Success!',
                          'Thank you for loading!',
                          'success'
                        ).then( function(){
                        window.location.href = '/';
                        });
                    this.isStatus = false;
                  
                  }
                  else if(res.data == "Error"){
                        Swal.fire(
                          'Error!',
                          'Loading Failed',
                          'error'
                        ).then( function(){
                        window.location.href = '/';
                        });
                    this.isStatus = false;
                  }

                }).bind(this);
              }
		    },
        buyBtn(){
                   var kano = parseInt(this.load_amount)  + parseInt(2);
          if(this.contact.length != 0 && this.load_amount.length != 0){

              if(this.contact.length < 11){
          
                        Swal.fire(
                          'Error!',
                          'Invalid Contact Number',
                          'error'
                        )
              }else{

                 Swal.fire({
                          title: 'Tama ba?',
                          html: 'Numero : ' + this.contact + '<br> Bayadan : ' + kano,
                          type: 'question',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: '<i class="fas text-warning fa-thumbs-up    "></i> Yes, I load mo na',
                          cancelButtonText: '<i class="fas fa-times    "></i> Mali',
               
                        }).then( (result) =>{
                          if(result.value){
                                axios.post('/smartload', {
                                    contact: this.contact,
                                    load_amount: this.load_amount,
                                    keyword: this.keyword,
                                    network: this.network,
                                    loadtype: this.loadtype

                                    
                                  });
                                  this.isStatus = true;
                                  this.isLoading = true;
                                         this.isLoading = true;
                          }
                        });
              }
          }else{
               Swal.fire(
                          'Error!',
                          'Fill all fields!',
                          'error'
                        )
          }

       
        },
         buyPromo(){

             

          if(this.contact.length != 0 && this.myValue.length != 0){

                var txt = this.myValueTex;
                  var numb = txt.match(/\d/g);
                  numb = numb.join("");
                var kano = parseInt(numb) + parseInt(2);
              if(this.contact.length < 11){
          
                        Swal.fire(
                          'Error!',
                          'Invalid Contact Number',
                          'error'
                        )
              }else{

                  Swal.fire({
                          title: 'Tama ba?',
                          html: 'Numero : ' + this.contact + '<br> Bayadan : ' + kano,
                          type: 'question',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: '<i class="fas text-warning fa-thumbs-up    "></i> Yes, I load mo na',
                          cancelButtonText: '<i class="fas fa-times    "></i> Mali',
               
                        }).then( (result) =>{
                          if(result.value){
                              axios.post('/smartload', {
                                  contact: this.contact,
                                  load_amount: numb,
                                  keyword: this.myValueTex,
                                  network: this.network,
                                  loadtype: 'promo',
                                  menu_number: this.myValue

                                  
                                });
                                this.isStatus = true;
                                this.isLoading = true;
                             }
                        });
              }
          }else{
               Swal.fire(
                          'Error!',
                          'Fill all fields!',
                          'error'
                        )
          }

       
        },
        accept(text) {
          alert("Input text: " + text);
          this.hide();
        },
 
        show(e) {
          this.input = e.target;
          this.layout = e.target.dataset.layout;
 
          if (!this.visible)
            this.visible = true
        },
 
        hide() {
          this.visible = false;
        },
         myChangeEvent(val){
            console.log(val);
        },
        mySelectEvent({id, text}){
            console.log({id, text})
            this.myValueTex = text;
        }
    }
  }


</script> 

