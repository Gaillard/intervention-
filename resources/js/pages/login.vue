<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
            <span class="text-center"> Connexion </span>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-6 offset-md">
                <form v-on:submit.prevent="onSubmit" method="POST">
                    <div class="alert alert-danger" v-if="errors.length">
                        <ul class="mb-0">
                            <li v-for="(error,index) in errors" :key="index">
                               {{
                                   error
                               }}
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label>CIN</label>
                        <input type="number" class="form-control" placeholder="Numero CIN..." v-model="CIN"  >
                    </div>
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" placeholder="Nom..." v-model="nom"  >
                    </div>
                    @csrf
                    <button class="btn btn-success">Connexion</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    name:"login",
    props:['app'],
    data(){
        return{
            CIN:"",
            nom:"",
            errors:[]
        }
    },
    methods:{
        onSubmit()
        {
            this.errors = [];
            if(!this.CIN){
                this.errors.push("CIN is required");
            }
            if(!this.nom){
                this.errors.push("nom is required");
            }
            if(!this.errors.length){
                const data={
                    CIN:this.CIN,
                    nom:this.nom
                }
                this.app.req
                .post("auth/login",data)
                .then(response => {
                    this.app.user=response.data;
                    this.$router.push('/');
                }).catch(error=>
                {
                    this.errors.push(error.response.data.error);
                }) ;
            }
        }
    }
}

</script>