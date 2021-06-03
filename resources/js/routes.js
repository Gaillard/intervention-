import Home from './pages/Home.vue';
import Register from './pages/register.vue';
import Login from './pages/login.vue';
import LoginPerso from './pages/loginPerso.vue';
import Aide from './pages/Aide.vue';
import Demande from './pages/Demande.vue';
import Statistique from './pages/Statistique.vue';
export default[
   
    {
        path:'/register',
        component:Register,
        name:'register',
    },
    {
        path:'/login',
        component:Login,
        name:'login',
    },
    {
        path:'/loginPerso',
        component:LoginPerso,
        name:'loginPerso',
    },
    {
        path:'/aide',
        component:Aide,
        name:'Aide',
    },
    {
        path:'/Demande',
        component:Demande,
        name:'Demande',
    },
    {
        path:'/Statistique',
        component:Statistique,
        name:'Statistique',
    },

];
   
