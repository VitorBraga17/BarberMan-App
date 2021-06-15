<template>
  <ion-page>

    <ion-header class="ion-no-border">
      <ion-toolbar color = "primary" class = "ion-text-center">
        <ion-title>BarberMan App</ion-title>
      </ion-toolbar>      
      <titulo-pagina margin-left>Barbeiros Disponíveis</titulo-pagina>
    </ion-header>
      <ion-content class="ion-padding">
           
      <div class = "painel-barbeiros ion-margin-top ion-text-center">
           <img src="assets/images/barberMan.jpg" alt="nada aqui" class="barbeiro-avatar">
           <h3>Thiago Silva</h3> 
           <img src="assets/images/pngkey.png" alt="nada aqui" class="estrelas">
           <div >
            <h4>"Barbeiro muito agradável!"</h4> 
            <h6 class="ion-text-end" style="margin-right: 15px;">Matheus R.</h6>
           </div>
      </div>


       <div>   
          <ion-item>
            <ion-label> <p>Escolha o Dia</p>  </ion-label>
            <ion-datetime
            v-model="agendamento.data"
            display-timezone="utc"
            month-short-names="Jan, Fev, Mar, Abr, Mai, Jun, Jul, Ago, Set, Out, Nov, Dez"
            done-text="OK"
            cancel-text="Cancelar"
            picker-format="DD MMM YYYY"
            display-format="DD/MM/YYYY" 
            >
            </ion-datetime>
          <ion-icon :icon= "calendar" slot="end"></ion-icon>
          </ion-item>
        </div>

        <div>
            <ion-item>
              <ion-label><p>Escolha o Horário</p></ion-label>
              <ion-icon :icon= "time" slot="end"></ion-icon>
              <ion-datetime v-model="agendamento.horario"
              done-text="OK"
              cancel-text="Cancelar" 
              display-format="HH:mm" minute-values="0,15,30,45"></ion-datetime>
           </ion-item>
        </div>
        
        <div class="center">
          <ion-button @click="reservar()">
            <h2>Reservar</h2>
          </ion-button>
        </div>




      </ion-content>

  </ion-page>
</template>

<script>  
import {IonPage,IonHeader,IonToolbar,IonTitle,IonContent,IonButton,
IonItem,IonLabel,IonDatetime,IonIcon} from '@ionic/vue';
import {addOutline,search,calendar,time} from 'ionicons/icons';
import TituloPagina from '../components/TituloPagina';
import { axiosHttp } from '../tools/axios';


export default {
  name: 'Barbeiros',

  props: {
    id: {
      type: Number,
      default: 0
    },
    nomeserv: {
      type: String,
      default: ""
    } 
  },

  components: {
    IonPage,IonHeader,IonToolbar,IonTitle,IonContent,IonButton,
    IonItem,IonLabel,IonDatetime,TituloPagina,IonIcon
  },

  data(){
    return{
      agendamento: {
        id: 0,
        data: null,
        horario: '',
        corte: ""
      }
    }
  },

  
  ionViewWillEnter() {
      this.carregarHorarios();
  },

  methods: { 


    carregarHorarios(){
      if (this.id != 0) {
        axiosHttp.get('appbarber.php', {params: { op: 'read', id: this.id }})
          .then((resp) => {
            if(resp.data.sucesso) {
              this.agendamento = resp.data.cortes[0];
            }
          });
      }
    },

    mostrar(){
      console.log(this.id);
    },

    reservar(){
      if (this.id == 0){
        this.agendamento.corte = this.nomeserv;
        this.agendamento.horario = (this.agendamento.horario.substr(11, 5));
      }
      this.agendamento.data = (this.agendamento.data.split('T'))[0];
      this.agendamento.horario = (this.agendamento.horario.substr(0, 5));

      let form = new FormData();
       if(this.id !=0){
        this.agendamento.id = this.id;
      }
      if(isNaN(this.id)){
        this.agendamento.id = 0;
      }
      for (let i in this.agendamento) {
        form.append(i, this.agendamento[i]);
      }
     
       axiosHttp.post('appbarber.php', form, { params: { op: this.agendamento.id != 0 ? 'update' : 'create'}})
        .then((resp) => {
          if (resp.data.sucesso) {
            this.$router.replace('/Home');
          } else {
            console.log(resp.data.mensagem);
          }
        });
      }


  },

  setup()
    {
    return {
      addOutline,search,calendar,time
    }
  }
}
</script>

<style scoped>
.titulo{
  font-weight: bolder;
}

.painel-barbeiros{
  height: 300px;
  background: var(--ion-color-secondary);
  border-radius: 16px 16px 16px 16px;
  margin: 0px 30px 0px 30px;
}

.barbeiro-avatar{
  display: block;
  padding-top: 10px;
  margin-left: auto;
  margin-right: auto;
  width: 110px;
  height: 120px;
  border-radius: 100px 100px 100px 100px;
  object-fit: cover;
}
.estrelas{
  display: block;
  margin-left: auto;
  margin-right: auto;
  object-fit: cover;
}

.botao-DiaHorario{
  width: 200px;
  height: 40px;
  margin: 5px;
}

.center{
  display: flex;
  align-items: center;
  justify-content: center;
}

.ion-datetime {
  background: var(--ion-color-secondary);
  font-size: 1.3rem;
  margin-top: 5px;
  width: 200px;
  height: 40px;
  margin: 5px;
  color: var(--app-font-color-base);
}

</style>