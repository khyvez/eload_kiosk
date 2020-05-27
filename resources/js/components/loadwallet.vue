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
                                    Loadwallet
                                  </a>
                    </div>
                    <div class="col-md-4 text-right">
                                 <img src="/image/loadwallet.png" style="width:100px; height:50px;" class="imgchoice" alt="">
                    </div>
                  </div>
               
                </div>
                <div id="collapseTwo" class="card-body collapse show" data-parent="#accordion" >
                 <div class="row">
                        <div class="col-md-5">
                       
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
                            <div class="form-group col-md-5">
                                <small><label for="">Amount</label></small>
                             <div class="input-group mb-3">
                        
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-coins   "></i> </i>  </span>
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
            network: 'loadwallet',
            loadtype:'regular',
         
            isLoading: false,
            fullPage: true,
            myValue: '',
            myValueTex: '',
          //  Giga Video 50', 'Giga Video 99', 'Giga Video 299', 'Giga Video 399', 'Giga Video 499
            myOptions: [
              {id: 'AT10', text: 'All Text 10'},
              {id: 'GVD50', text: 'Giga Video 50'},
              {id: 'GVD99', text: 'Giga Video 99'},
              {id: 'GVD299', text: 'Giga Video 299'},
               {id: 'GVT75', text: 'Giga Video+ 75'},
               {id: 'GGM50', text: 'Giga Games 50'},
               {id: 'GGM99', text: 'Giga Games 99'},
               {id: 'GIF50', text: 'Giga IG+FB 50'},
               {id: 'GIF99', text: 'Giga IG+FB 99'},
               {id: 'AOS20', text: 'All Out Surf 20'},
               {id: 'AOS30', text: 'All Out Surf 30'},
               {id: 'AOS50', text: 'All Out Surf 50'},
               {id: 'AOS99', text: 'All Out Surf 99'},
               {id: 'UCT30', text: 'UCT30'},
               {id: 'UCT50', text: 'UCT50'},
               {id: 'UCT100', text: 'UCT100'},
       
              
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
                        network: 'cignal'
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
          var kano = parseInt(this.load_amount)  + parseInt(10);

          if(this.contact.length != 0 && this.load_amount.length != 0){

              if(this.contact.length < 10){
          
                        Swal.fire(
                          'Error!',
                          'Invalid Account Number',
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
                                      loadtype: this.loadtype,
                                      menu_number: ''

                                      
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
        try1(){

          console.log(numb);
        },
            buyPromo(){

             

          if(this.contact.length != 0 && this.myValue.length != 0){

                var txt = this.myValueTex;
                  var numb = txt.match(/\d/g);
                  numb = numb.join("");
                var kano = parseInt(numb) + parseInt(10);
              if(this.contact.length < 8){
          
                        Swal.fire(
                          'Error!',
                          'Invalid Contact Number',
                          'error'
                        )
              }else{

                     Swal.fire({
                          title: 'Tama ba?',
                          html: 'Numero : ' + this.contact ,
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
                                  keyword: this.myValue,
                                  network: this.network,
                                  loadtype: 'promo'

                   
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
<style>
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 4px;
    height: 62px;
    padding: 15px;
    
}
.swal2-actions{
  display: inline !important;
}
</style>
