<template>

 <ion-item lines="none" class="painel-servicos">
    <ion-grid>
      <ion-row>
        <ion-col size="6">{{ cortar.corte }}</ion-col>
        <ion-col size="4">{{formatarData(cortar.data) }}</ion-col>
        <ion-col>{{cortar.horario}}</ion-col>
      </ion-row>
    </ion-grid>
  </ion-item>
</template>


<script>

import {refreshOutline,trashOutline} from 'ionicons/icons';
import {IonItem, IonGrid, IonRow, IonCol } from '@ionic/vue';
export default {
  name: 'ItemServico',

  props: {
    cortar: {
      type: Object,
      defaulf: null
    }
  },

  components: {
    IonItem, IonGrid, IonRow, IonCol
  },

  methods: {
    formatarData(data) {
      // 01/02/2021 => 01/Mar
      let meses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
      let d = new Date(data);
      let dia = ('00' + d.getUTCDate()).slice(-2); 
      let mes = meses[d.getUTCMonth()];
      return dia + '/' + mes;

    }
  },

  setup(){
    return {
      refreshOutline,trashOutline
    }
  }
}
</script>

<style scoped>

.painel-servicos{
  
  --background: var(--ion-color-secondary);
  margin-bottom:10px;
  border-radius: 16px 16px 16px 16px ;

}

.corte-estilos{
  font-size: 1.2rem;
}

ion-grid, ion-row, ion-col {
  padding: 0px;
}

.botao-remarcar{
  padding: 0px 0px 5px 0px;
  font-size: 0.8rem;
  --border-radius: 16px;
}

.botao-desmarcar{
  padding: 0px 0px 5px 0px;
  font-size: 0.8rem;
  --border-radius: 16px;
}

.painel-servicos .horario-servicos{
  /*margin: 0px;*/
  font-size: 1.2rem;
}


ion-toolbar {
  --border-style: none;
}

ion-item{
  --border-radius : 0px 0px 16px 16px;
}


</style>