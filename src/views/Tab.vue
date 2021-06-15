<template>
  <ion-page>
    <ion-tabs>
      <ion-tab-bar color="primary">
        <ion-tab-button tab="home" href="/home">
          <ion-label>Home</ion-label>
          <ion-icon :icon="homeOutline"></ion-icon>
        </ion-tab-button>
        <ion-tab-button tab="lancamentos" href="/servicos">
          <ion-label>Serviços</ion-label>
          <ion-icon src="/assets/scissors.svg"></ion-icon>
        </ion-tab-button>
         <ion-tab-button tab="Ajustes" href="/ajustes">
          <ion-label>Ajustes</ion-label>
          <ion-icon :icon="settingsOutline"></ion-icon>
        </ion-tab-button>
         <ion-tab-button tab="Ajuda" href="/ajuda">
          <ion-label>Ajuda</ion-label>
          <ion-icon :icon="helpCircleOutline"></ion-icon>
        </ion-tab-button>
      </ion-tab-bar>
    </ion-tabs>
  </ion-page>
</template>

<script>
import {IonPage,IonTabs,IonTabBar,IonTabButton,IonLabel,IonIcon} from '@ionic/vue';
import { homeOutline, listOutline,settingsOutline,helpCircleOutline } from 'ionicons/icons';

export default {
  name: "Tab",
  components: {
    IonPage,IonTabs,IonTabBar,IonTabButton,IonLabel,IonIcon
  },
  
  setup(){
    return{
      homeOutline,listOutline,settingsOutline,helpCircleOutline
    }
  }
}
</script>

<style scoped>

  ion-tabs {
    background-color: #ffffff;
  }
  ion-tab-bar {
    border: 0px none ;
    border-radius: 16px 16px 0px 0px;
  }

</style>