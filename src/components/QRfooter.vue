<template>
  <div class="footer">
    {{footer}}
  </div>
</template>

<script>
  export default {
    name: 'QRfooter',
    props: {
      footer: {
        type: String,
        default: '© Copyright 技术支持:卢方远'
      }
    }
  }
</script>

<style scoped>
  .footer {
    width: 100%;
    text-align: center;
    /* position:fixed; */
    /* left:0;
    right: 0;
    bottom: 30px;
    font-size: 35px;
    font-weight: 500;
    color: rgba(0, 0, 0, 0.8); */
  }
  @media (max-width: 768px) {
 
  }
</style>
