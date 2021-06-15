<template>
  <p :class="marginLeft ? 'add-margin-left' : ''" >
    <slot></slot>
  </p>   
</template>

<script>
export default {
  name: "TituloPagina",

  props: {
    marginLeft: {
      type: Boolean,
      default: false
    }
  }
}
</script>

<style scoped>
p {
  font-size: 1.6rem;
  color: var(--app-font-color-base);  
  font-weight: bold;
}

.add-margin-left {
 margin-left: 16px; 
 margin-bottom: 10px; 
}
</style>