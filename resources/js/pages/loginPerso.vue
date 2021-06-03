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
                        <input type="number" class="form-control" placeholder="Numero CIN..." v-model="CIN" >
                    </div>
                    <div class="form-group">
                        <label>code</label>
                        <input type="password" class="form-control" placeholder="code..." v-model="code" >
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
    name:"loginPerso",
    props:['app'],
    data(){
        return{
            CIN:" ",
           code:" ",
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
            if(!this.code){
                this.errors.push("code is required");
            }
            if(!this.errors.length){
                const data={
                    CIN:this.CIN,
                    code:this.code
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