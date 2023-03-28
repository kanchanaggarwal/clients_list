<template>
    <div class="row">
         <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"clientList"}' class="btn btn-primary">Back</router-link>
    </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Contact</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                               <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label> Contact Type(primary/secondary/other contacts)</label>
                                    <input type="text" class="form-control" v-model="contact.type">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label> Name</label>
                                    <input type="text" class="form-control" v-model="contact.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>email id</label>
                                    <input type="text" class="form-control" v-model="contact.email">
                                </div>
                            </div>
                         
                               <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>phone</label>
                                    <input type="text" class="form-control" v-model="contact.phone">
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
    name:"add-contact",
    data(){
        return {
            contact:{
                type:"",
                name:"",
                email:"",
                phone:"",

            }
        }
    },
    methods:{
        async create(){
            await this.axios.post(`/api/contact/add/${this.$route.params.id}`,this.contact).then(response=>{
                this.$router.push({name:"clientList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>