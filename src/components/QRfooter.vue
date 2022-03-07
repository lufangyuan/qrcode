<template>
  <div class="footer" v-html="footer">
  </div>
</template>

<script>
  export default {
    name: 'QRfooter',
    props: {
      footer: {
        type: String,
        default: '© Copyright 技术支持：卢方远'
      }
    }
  }
</script>

<style>
  .footer {
    width: 100%;
    text-align: center;
    position:fixed;
    left:0;
    right: 0;
    bottom: 0;
    font-size: 10px;
    font-weight: 350;
    color: #909090;

    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none;
  }
  .footer p a {
    color:#909090;
    cursor: pointer;
    text-decoration:none;
  }
  .footer p a:hover {
    color:#7592FF;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
  }
</style>
