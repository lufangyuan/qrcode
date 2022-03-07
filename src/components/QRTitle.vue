<template>
  <div class="title">
    {{title}}
  </div>
</template>

<script>

export default {
  name: 'QRTitle',
  props: {
    title: {
      type: String,
      default: 'Make a QR code'
    }
  }
}
</script>

<style scoped>
  .title {
    width: 100%;
    text-align: center;
    margin-top: 100px;
    font-size: 35px;
    font-weight: 500;
    color: rgba(0, 0, 0, 0.8);
  }
  @media (max-width: 768px) {
    .title {
      margin-top: 50px;
    }
  }
</style>
