<template>
  <ion-page>
    <cabecalho></cabecalho>
    <div>
      <ion-item lines="none" class = "search-bar">
        <ion-label position="floating"> 
          <ion-icon :icon= "search" slot="start"></ion-icon>
          Pesquisar Serviço
        </ion-label>
        <ion-input v-model="textoPesquisa"></ion-input>
        <div>
          <ion-button size="2" @click="carregarHorarios()">
            <ion-icon :icon="search"></ion-icon>
            Pesquisar
          </ion-button>            
          <ion-button v-if="textoPesquisa != ''"  size="2" @click="limparPesquisa()"> 
            <ion-icon :icon="closeOutline"></ion-icon>
            Limpar Pesquisa
          </ion-button>               
        </div>  
      </ion-item>
    </div>
        
    <titulo-pagina margin-left>Seus próximos horários</titulo-pagina>
    <ion-item>
        <ion-grid>
          <ion-row>
            <ion-col size = 6>
              Serviço
            </ion-col>
            <ion-col>
              Data
            </ion-col>
            <ion-col>
              Horário
            </ion-col>
          </ion-row>
        </ion-grid>
      </ion-item>


    <ion-content class="ion-padding">     
      <ion-list ref="listaServicos" @click="fecharSlidingItems()">
        <ion-item-sliding v-for="(cort,index) in cortes" :key="index">
          <item-servico :cortar="cort"></item-servico>
          <ion-item-options>
            <ion-item-option color="warning" :router-link="`/Barbeiros/${cort.id}`">
              <ion-icon :icon= "refreshOutline" class="icones"></ion-icon>
            </ion-item-option>
            <ion-item-option color="danger" @click="remover(cort.id)">
             <ion-icon :icon= "trashOutline" class="icones"></ion-icon> 
            </ion-item-option>   
          </ion-item-options>
        </ion-item-sliding>
      </ion-list>
      
    </ion-content>
  </ion-page>
</template>

<script>
import {IonPage,IonItem,IonContent,IonItemOption,IonItemOptions,IonItemSliding,
alertController,IonInput,IonButton,IonList,IonIcon,IonLabel,IonGrid,IonRow,IonCol
} from '@ionic/vue';
import {addOutline,search,refreshOutline,trashOutline,closeOutline} from 'ionicons/icons';
import TituloPagina from '../components/TituloPagina';
import Cabecalho from '../components/Cabecalho';
import ItemServico from '../components/ItemServico';
import { axiosHttp } from '../tools/axios.js';

export default {
  name: 'Home',
  components: {
    IonPage,IonItem,IonContent,IonItemOption,IonItemOptions,IonItemSliding,IonInput,
    TituloPagina,Cabecalho,ItemServico,IonButton,IonList,IonIcon,IonLabel,IonGrid,IonRow,IonCol

  },

  data(){
    return{
      cortes: [],
      textoPesquisa: ''
    }
  },
  
  ionViewWillEnter() {
    this.carregarHorarios();
  },
  
  methods: {
    carregarHorarios(){
      axiosHttp.get('appbarber.php', {params: { op: 'read', pesquisa: this.textoPesquisa}})
        .then((resp) => {
          if(resp.data.sucesso) {
            this.cortes = resp.data.cortes;
          }
        })
    },

    limparPesquisa() {
      this.textoPesquisa = '';
      this.carregarHorarios();
    },
  
    remover(idCort) {
        alertController.create({
          header: 'Desmarcar',
          message: 'Deseja desmarcar o agendamento?',
          buttons: [
            { 
              text: 'OK',
              handler: () => {
                axiosHttp.get('appbarber.php', { params: { op: 'delete', id: idCort }})
                  .then((resp) => {
                    if (resp.data.sucesso) {
                      this.carregarHorarios();
                    }
                  });
              }
            },
            {
              text: 'Cancelar'
            }
          ]
        })
        .then((dlg) => {
          dlg.present();        
        });
      },

      fecharSlidingItems() {
        this.$refs.listaServicos.$el.closeSlidingItems();
      },

    },

  setup(){
    return {
      addOutline,search,refreshOutline,trashOutline,closeOutline
    }
  }
}
</script>

<style scoped>

.seus-horarios{
  font-weight: 700;
  
}

.user-name{
  font-weight: 700;
}

.painel-servicos{
  
  --background: var(--ion-color-secondary);
  margin-bottom:10px;
  border-radius: 16px 16px 16px 16px ;

}

.corte-estilos{
  font-size: 1.2rem;
}

.icones{
  font-size: 1.2rem;
}

ion-grid, ion-row, ion-col {
  padding: 0px;
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

ion-item-options {
  margin-top: 2px;
  margin-right: 0px;
  height: 44px;
  border: none;
}

ion-item-option {
  margin-left: 2px;
  border-radius: 8px;
}

</style>