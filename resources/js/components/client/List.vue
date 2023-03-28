<template>
    <div class="row">

        <div class="form-group">
           <h3>Search </h3>
                <input  class ="form-control" type="text" v-model="keyword">
       </div>

        <div class="col-12 mb-2 mt-3 text-end">
            <router-link :to='{name:"clientAdd"}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Client</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>client</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>contact</th>
                                     <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="clients.length > 0">
                                <tr v-for="(client,key) in clients" :key="key">
                                    <td>{{ client.id }}</td>
                                    <td>{{ client.name }}</td>
                                    <td>{{ client.address }}</td>
                                    <td>{{ client.phone }}</td>
                                    <td> <router-link :to='{name:"contactList",params:{id:client.id}}' class="btn btn-primary">View Contact</router-link></td>
                                    <td>
                                        <router-link :to='{name:"clientEdit",params:{id:client.id}}' class="btn btn-warning">Edit</router-link>
                                        <button type="button" @click="deleteClient(client.id)" class="btn btn-danger">Delete</button>
                                        <router-link :to='{name:"contactAdd",params:{id:client.id}}' class="btn btn-success">Add Contact</router-link>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No clients Found.</td>
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
    name:"clients",
    data(){
        return {            
            keyword: null,
            clients:[],
            isModalVisible: false
        }
    },
     watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
    mounted(){
        this.getclients()
    },
    methods:{
        showModal() {
        this.isModalVisible = true;
      },
        getResults() {
            axios.get('/api/search', { params: { keyword: this.keyword } })
                .then(res => this.clients = res.data)
                .catch(error => {});
        },
        async getclients(){
            await this.axios.get('/api/client').then(response=>{
             
                this.clients = response.data
            }).catch(error=>{
                console.log(error)
                this.clients = []
            })
        },
        deleteClient(id){
            if(confirm("Are you sure to delete this category ?")){
                this.axios.delete(`/api/client/${id}`).then(response=>{
                    this.getclients()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>