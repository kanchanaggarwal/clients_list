<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"clientList"}' class="btn btn-primary">Back</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Client Contacts</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>contact name </th>
                                     <th>contact type </th>
                                    <th>email id</th>
                                    <th>Phone</th>
                                     <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="contactList.length > 0">
                                <tr v-for="(contactList,key) in contactList" :key="key">
                                    <td>{{ contactList.id }}</td>
                                    <td>{{ contactList.name }}</td>
                                     <td>{{ contactList.type }}</td>
                                    <td>{{ contactList.email }}</td>
                                    <td>{{ contactList.phone }}</td>
                                  
                                    <td>
                                        <router-link :to='{name:"contactEdit",params:{id:contactList.id}}' class="btn btn-warning">Edit</router-link>
                                        <button type="button" @click="deleteConatct(contactList.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No contacts Found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"contact-list",
    data(){
        return {
            contactList:[],
            contact:{
                id:this.$route.params.id
               
            }
        }
    },
    mounted(){
        this.getConatct()
    },
    methods:{
        showModal() {
        this.isModalVisible = true;
      },
        async getConatct(){
           
           await this.axios.get(`/api/${this.$route.params.id}/contact-list`).then(response=>{
           
                this.contactList = response.data
            }).catch(error=>{
                console.log(error)
                this.contactList = []
            })
        },
         
        deleteConatct(id){
            if(confirm("Are you sure to delete this category ?")){
                this.axios.delete(`/api/${id}/contact-delte`).then(response=>{
                    this.getConatct()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>