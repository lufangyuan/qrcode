<template>
  <div class="prompt" v-if="isShow">
    这里是消息
  </div>
</template>

<script>

export default {
  name: 'Prompt',
  props: {
    prompt: {
      type: String,
      default: ''
    },
    promptStyle: {
      type: String,
      default: 'success'
    },
    delay: {
      type: Number,
      default: 1200
    }
  },
  activated() {

  },
  data() {
    return {
      isShow: false
    }
  }
}
</script>

<style scoped>
  .prompt {
    z-index: 99;
    position: fixed;
    left: 50%;
    top:30%;
    transform:translate(-50%,-50%);
    background-color: red;
    text-align: center;
    padding: 20px;
    border-radius:10px;
  }
</style>
