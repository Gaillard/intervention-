<template>
    <div class="container-fluide">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <router-link class="navbar-brand" to="/Aide">Aide</router-link>
        <router-link class="navbar-brand" to="/Demande">Demande</router-link>
        <router-link class="navbar-brand" to="/Statistique">Statistique</router-link>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    <ul class="navbar-nav ml-auto">
           <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{app.user?app.user.name:"compte"}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <div v-if="!app.user">
                <router-link to="/login" class="dropdown-item" >se connecter</router-link>
                <router-link to="/loginPerso" class="dropdown-item">loginPerso</router-link>
                <router-link to="/register" class="dropdown-item">S'inscrire</router-link>
          </div>
          <a v-else @click="logout" href="javascript::" class="dropdown-item">logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
    </div>
</template>
<script>
export default{
    name:"navbar",
    props:["app"],
    data(){
        return{};
    },
    methods:{
        logout(){
            this.app.req.post("auth/logout").then(()=>{
                this.app.user=null;  
                this.$router.push("/login");
            });
        }
    }
}
</script>
