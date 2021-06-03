<template>
    <div class="container">
        <div class="card">
            <div class="card-header">Inscription</div>
        </div>
        <div class="card-body">
            <div class="col-md-6 offset-md">
                <form v-on:submit.prevent="onSubmit" metho="POST">
                    <div class="alert alert-danger" v-if="errors.length">
                        <ul class="mb-0">
                            <li v-for="(error,index) in errors" :key="index">
                               {{
                                   error
                               }}
                            </li>
                        </ul>
                    </div>
                    <div class="form-group" method="POST">
                        <label>CIN</label>
                        <input type="number" class="form-control" placeholder="Numero CIN..." v-model="CIN" >
                    </div>
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" placeholder="Nom..." v-model="nom" >
                    </div>
                    <div class="form-group">
                        <label>Prenom</label>
                        <input type="text" class="form-control" placeholder="Prenom..." v-model="prenom" >
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control"  v-model="role" value="client">
                    </div>
                    @csrf
                    <button class="btn btn-success">Enregister</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    name:"register",
    props:['app'],
    data(){
        return{
            CIN:"",
            nom:"",
            prenom:"",
            role:"client",
            errors:[]
        };
    },
    methods:{
        onSubmit()
        {
            this.errors = [];
            if(!this.CIN){
                this.errors.push("CIN est obligatoire");
            }
            if(!this.nom){
                this.errors.push("nom est obliagatoire");
            }
            if(!this.errors.length){
                const data={
                    CIN:this.CIN,
                    nom:this.nom,
                    prenom:this.prenom
                }
                this.app.req
                    .post("auth/register",data)
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