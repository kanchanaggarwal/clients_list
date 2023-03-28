<template>
   
    <div class="row">
     <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"clientList"}' class="btn btn-primary">Back</router-link>
    </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add client</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>client Name</label>
                                    <input type="text" class="form-control" v-model="client.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>address</label>
                                    <input type="text" class="form-control" v-model="client.address">
                                </div>
                            </div>
                               <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>phone</label>
                                    <input type="text" class="form-control" v-model="client.phone">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"add-client",
    data(){
        return {
            client:{
                name:"",
                address:"",
                phone:"",

            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('/api/client',this.client).then(response=>{
                this.$router.push({name:"clientList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>