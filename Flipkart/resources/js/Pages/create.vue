<template>
 <div class="p-2 bg-gray">
        <h3 class="text-blue-500 text-center">Dhanesh groccery system</h3>
        <div class="p-5">
          
                <div class="w-full">
                    <label class="rounded text-blue-500">Role</label>
                    <select v-model="Role" class="w-full mt-1.5 px-5 py-2.5 text-sm font-normal text-gray-800 border border-gray-200 rounded-lg">
                        <option selected value="">Select One</option>
                        <option v-for="item in optionRole" :value="item.id" :key="item.id" >{{item.name}}</option>
                    </select>
                </div>
                  <div class="w-full">
                    <label class="rounded text-blue-500">Worker</label>
                    <select v-model="Worker" class="w-full mt-1.5 px-5 py-2.5 text-sm font-normal text-gray-800 border border-gray-200 rounded-lg">
                        <option selected value="">Select One</option>
                        <option v-for="item in optionWorker" :value="item.id" :key="item.id">{{item.worker_name}}</option>
                    </select>
                </div>
                <div style="padding-top:30px; padding-left:100px;">
                <button  @click.prevent="submit"  class="bg-blue-500 item-center rounded bg-cover border-2 p-1  text-white">SUBMIT </button>
                </div>
        </div>
    </div>
    </template>
<script>
  
  export default{
      name:'create',
       data(){
            return{
                optionWorker:[],
                optionRole:[],
                Worker:'',
                Role:'',
                
               
            }
        },
        methods:{
            getRole(){
         axios.get('/api/dhanesh/').then(response => {
             if(response.status === 200) {                 //ye apni roles ke data ko la rhi hai
                 this.optionRole = response.data.data
             }
         })
            },
           getWorker(){
                axios.get('/api/dhaneshji/'+this.Role).then(response => {
                    if(response.status === 200) {
                        this.optionWorker = response.data.data  //woker data ko la rhi hai api
                    }
                })
           
        
       },
            submit(){
                const payload ={
                     role_name:this.Role,
                    worker_name:this.Worker,
                }
                //ye kis liye hai 
                axios.post('/api/product/create', payload).then(response =>{
                    if(response.status === 200){
                        this.$inertia.get('result');
                    }

                }).catch((error) => {
                    console.log(error.response)
                    if(error.response.status === 422) {
                        this.error_message = error.response.data.message;
                        this.errors = error.response.data.errors
                        console.log(this.errors.product_name[0])
                    }
                })
            }
        },
        created(){
            this.getRole();
            // this.getModel();
        },
        watch:{
    //    'multiselect_example':{
    //         handler:'getModel'
    //    },
        'Role':{
            handler:'getWorker'
        
        }   }

  

  }
</script>