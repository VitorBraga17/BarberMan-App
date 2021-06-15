<template>
  <ion-page>
    <cabecalho></cabecalho>
    <titulo-pagina margin-left>Serviços</titulo-pagina>

    <ion-content class="ion-padding">          
      <ion-grid>
        <ion-row>
          <ion-col>
            <ion-button router-link="/barbeiros/0/Corte Tradicional" color="secondary" class = "botao-servico">
              <ion-grid>
              <ion-row>
                <ion-icon src="/assets/razor.svg" class = "icones"></ion-icon>
              </ion-row> 
              <ion-row>                
                  <ion-label class = "texto-botao">Corte<br>Tradicional</ion-label>                
              </ion-row>             
            </ion-grid>
            </ion-button>
          </ion-col>

          <ion-col>
            <ion-button router-link="/barbeiros/0/Corte Massoterapia" color="secondary" class = "botao-servico">
              <ion-grid>
              <ion-row>
                <ion-icon src="/assets/man-with-beard.svg" class = "icones"></ion-icon>
              </ion-row> 
              <ion-row>                
                  <ion-label class = "texto-botao">Corte<br>Massoterapia</ion-label>                
              </ion-row>             
            </ion-grid>
            </ion-button>
          </ion-col>
        </ion-row>

        <ion-row>
          <ion-col>
            <ion-button router-link="/barbeiros/0/Tingimento" color="secondary" class = "botao-servico">
              <ion-grid>
              <ion-row>
                <ion-icon src="/assets/hair-dye.svg" class = "icones"></ion-icon>
              </ion-row> 
              <ion-row>                
                  <ion-label class = "texto-botao">Tingimento</ion-label>                
              </ion-row>             
            </ion-grid>
            </ion-button>
          </ion-col>

          <ion-col>
            <ion-button router-link="/barbeiros/0/Progressiva" color="secondary" class = "botao-servico">
              <ion-grid>
              <ion-row>
                <ion-icon src="/assets/short-male-hair-shape.svg" class = "icones"></ion-icon>
              </ion-row> 
              <ion-row>                
                  <ion-label class = "texto-botao">Progressiva</ion-label>                
              </ion-row>             
            </ion-grid>
            </ion-button>
          </ion-col>
        </ion-row>

        <ion-row>
          <ion-col>
            <ion-button router-link="/barbeiros/0/Sobrancelhas" color="secondary" class = "botao-servico">
              <ion-grid>
              <ion-row>
                <ion-icon src="/assets/eyebrows.svg" class = "icones"></ion-icon>
              </ion-row> 
              <ion-row>                
                  <ion-label class = "texto-botao">Sobrancelhas</ion-label>                
              </ion-row>             
            </ion-grid>
            </ion-button>
          </ion-col>

          <ion-col>
            <ion-button router-link="/barbeiros/0/Corte Freestyle" color="secondary" class = "botao-servico">
              <ion-grid>
              <ion-row>
                <ion-icon src="/assets/short-black-hair-shape.svg" class = "icones"></ion-icon>
              </ion-row> 
              <ion-row>                
                  <ion-label class = "texto-botao">Corte Freestyle</ion-label>                
              </ion-row>             
            </ion-grid>
            </ion-button>
          </ion-col>
        </ion-row>
    </ion-grid>
    
      
    </ion-content>
  </ion-page>
</template>

<script>
import {IonPage,IonContent,IonButton,IonLabel,IonGrid,IonRow,IonCol,IonIcon} from '@ionic/vue';
import {addOutline,search} from 'ionicons/icons';
import TituloPagina from '../components/TituloPagina';
import Cabecalho from '../components/Cabecalho';

export default {
  name: 'Servicos',
  components: {
    IonPage,IonContent,IonButton,TituloPagina,Cabecalho,IonLabel,IonGrid,IonRow,IonCol,IonIcon
  },
  setup(){
    return {
      addOutline,search
    }
  }
}
</script>

<style scoped>

.icones{
  font-size: 65px;
  padding: 0px 70px 5px 70px;
}

.texto-botao{
  padding: 0px 50px 5px 50px;
}

.servicos{
  font-weight: 700;
  
}
.user-name{
  font-weight: 700;
}

.painel-servicos{
  height: 120px;
  background: var(--ion-color-secondary);
  border-radius: 16px 16px 16px 16px ;

}

.botao-servico{
  height: 120px;
  width: 140px;
  --border-radius: 16px 16px 16px 16px ;

}

.corte-estilos{
  padding: 10px 15px 0px 15px;
  font-size: 1.2rem;
}

.botao-remarcar{
  padding: 0px 30px 0px 15px;
  font-size: 1.2rem;
}

.botao-desmarcar{
  padding: 0px 40px 0px 15px;
  font-size: 1.2rem;
}

.painel-servicos .horario-servicos{
  margin: 0px;
  font-size: 1.2rem;
}

ion-toolbar {
  --border-style: none;
}

ion-item{
  --border-radius : 0px 0px 16px 16px;
}

.search-bar {
  --background: var(--ion-color-secondary);
  --inner-padding-start: 10px;
  --inner-padding-end: 10px;
  --padding-start: 5px;
  --padding-end: 5px;
  --border-radius: 50px;
  padding: 16px 16px 4px 16px; 
}

ion-input {
  margin-left: 5px;
  font-size: 1.0rem;
}

</style>