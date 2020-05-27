<template>
  <div>
      <div class="row ">
                    <div class="col text-center">
                        <h1 class="text-header">Select your network provider</h1>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <a @click="openISP('smart')">
                                <div class="card choice">
                                   <img src="/image/smart.png" class="imgchoice" alt="">
                                </div>
                            </a>
                    </div>
                    <div class="col-md-4">
                            <a @click="openISP('tnt')">
                                <div class="card choice">
                                   <img src="/image/tnt.png" class="imgchoice" alt="">
                                </div>
                            </a>
                    </div>
                    <div class="col-md-4">
                            <a @click="openISP('globe')">
                                <div class="card choice">
                                   <img src="/image/globe.png" class="imgchoice" alt="">
                                </div>
                            </a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <h3 class="text-white">Cable Load</h3>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 ">
                        <a @click="openISP('cignal')">
                                <div class="card choice2">
                                   <img src="/image/cignal.png" class="imgchoice" alt="">
                                </div>
                            </a>
                    </div>
                      <div class="col-md-3 ">
                        <a @click="openISP('satlite')">
                                <div class="card choice2">
                                   <img src="/image/satlite.png" class="imgchoice" alt="">
                                </div>
                            </a>
                    </div>
                        <div class="col-md-3 ">
                        <a @click="openISP('soon')">
                                <div class="card choice2">
                                   <img src="/image/cigna2l.png" class="imgchoice" alt="">
                                </div>
                            </a>
                    </div>
                          <div class="col-md-3 ">
                        <a @click="openISP('loadwallet')">
                                <div class="card choice2 ">
                                          <img src="/image/loadwallet.png" class="imgchoice" alt="">
                                </div>
                            </a>
                    </div>
                </div>

                <div class="row mt-5 text-center">
                    <div class="col">
                        <marquee class="text-center" behavior="" direction="up"> <h3 class="text-white">WEBZON VARIETY STORE  &   WEBZON CYBER CAFE</h3> </marquee>
                    </div>
                </div>
    </div>

</template>

<script>

export default {
        mounted() {
            console.log('Component mounted.')
        },

methods: {
    openISP(isp){
        if(isp == "smart"){
            window.location.href = '/smart';
        }
        else if(isp == "tnt"){
                window.location.href = '/tnt';
        }else if(isp == "globe"){
                  window.location.href = '/globe';
        }
        else if(isp == "cignal"){
                  window.location.href = '/cignal';
        }
           else if(isp == "satlite"){
                  window.location.href = '/satlite';
        }
        else if(isp == "loadwallet"){
                  window.location.href = '/loadwallet';
        }
          else if(isp == "soon"){
                 Swal.fire(
                          'Soon!',
                          'Coming Soon!',
                          'info'
                        )
        }
    }
    
    }
}

</script>