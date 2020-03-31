<template>
  <div>
      <div class="row p-5">
                    <div class="col text-center">
                        <h1 class="text-header">Select your network provider</h1>
                    </div>
                </div>
                <div class="row">
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
    }
    
    }
}

</script>