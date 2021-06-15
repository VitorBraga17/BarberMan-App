<template>
    <ion-header class="ion-no-border">
      <ion-toolbar color = "primary" class="ion-text-center">
        <ion-title>BarberMan App</ion-title>
      </ion-toolbar>

      <ion-item lines="none" color="primary" class="perfil-usuario">
        <ion-avatar slot="end">
           <img src="assets/images/profile.png" alt="">
        </ion-avatar>
          <ion-label>
            <p>Bem vindo,</p>
            <h1 class="user-name"> Henrique!</h1>
          </ion-label>
      </ion-item>

      
    </ion-header>
</template>

<script>
import { IonHeader, IonToolbar, IonTitle, IonItem, IonAvatar, IonLabel} from '@ionic/vue';
import {search} from 'ionicons/icons';
export default {
  name: "Cabecalho",
  
  components: {
      IonHeader, IonToolbar, IonTitle, IonItem, IonAvatar, IonLabel
  },

  setup(){
    return {
      search
    }
  }
}

</script>

<style scoped>

.search-bar {
  --inner-padding-start: 10px;
  --inner-padding-end: 10px;
  --padding-start: 5px;
  --padding-end: 5px;
  --border-radius: 50px;
  padding: 16px 16px 4px 16px; 
}

.user-name{
  font-weight: 700;
}

ion-toolbar {
  --border-style: none;
}

ion-item{
  --border-radius : 0px 0px 16px 16px;
}

</style>