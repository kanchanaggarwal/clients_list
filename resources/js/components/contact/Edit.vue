<template>
    <div class="row">
         <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"clientList"}' class="btn btn-primary">Back</router-link>
    </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Client Conatct </h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                              <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label> Contact Type(primary/secondary/other contacts)</label>
                                    <input type="text" class="form-control" v-model="contact.type">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                        <label>client Name</label>
                                        <input type="text" class="form-control" v-model="contact.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>address</label>
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
                                <button type="submit" class="btn btn-primary">Update</button>
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
    name:"update-contact",
    data(){
        return {
            contact:{
                 type:"",
                name:"",
                email:"",
                phone:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showContact()
    },
    methods:{
        async showContact(){
            await this.axios.get(`/api/${this.$route.params.id}/contact-show`).then(response=>{
                console.log(response.data);
                const {type, name, email, phone} = response.data
                this.contact.type = type
                this.contact.name = name
                this.contact.email = email
                this.contact.phone = phone
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/contact-update/${this.$route.params.id}`,this.contact).then(response=>{
                this.$router.push({name:"clientList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>