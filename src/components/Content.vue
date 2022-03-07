<template>
  <div class="box">
    <div class="set">
      <textarea type="text" id="content" placeholder="输入您的内容" maxlength="400"></textarea>
      <div class="setlogo">
        <div class="tit">设置LOGO：</div>
        <input style="display: none;" type="file" id="file" name="file" accept="image/jpeg,image/png" onchange="upload_logo()" />
        <div class="logo" id="logo"><p id="lg_ts">点击上传</p></div>
      </div>
      <div class="btnbox"><button type="button" @click="creatQR">生成二维码</button></div>
    </div>
    <div class="qrcode" id="qrcode">
      <img :src="firstImg" style="width:100%;height:100%;object-fit:cover;" />
    </div>
  </div>
  <Prompt ref="prompt"/>
</template>

<script>
  import Prompt from './Prompt.vue'

  export default {
    name: "Content",
    data() {
      return {
        firstImg:'http://www.keweikeji.com/qrcode/class/qr.php?content=http://www.keweikeji.com/qrcode/&logo=../images/ico/qr.png'
      }
    },
    components: {
      Prompt
    },
    methods: {
      creatQR() {
        this.$prompt.data.isShow = true
      }
    },
    mounted() {
      document.getElementById('content').focus()
    }
  }
</script>

<style>
  .box {
      background-color: #f3f3f3;
      margin: 100px auto;
      max-width: 900px;
      display: flex;
      justify-content: space-around;
      padding: 50px;
      border-radius:20px;
      box-shadow: 5px 5px 50px #bbb;
    }
  .set{
    width: 400px;
  }
  .btnbox {
    margin: 0 auto;
    text-align: center;
  }
  .btnbox button{
    width: 100%;
    background-color: rgb(92,184,92);
    /* margin-top: 20px; */
    outline: none;
    border: none;
    border-radius:5px;
    color: #fff;
    padding: 10px;
    margin: 20px auto;
  }
  .set button:hover {
    background-color: rgb(68,157,68);
    cursor:pointer;
  }
  .set textarea{
    width: 95%;
    border: 0;
    height: 150px;
    resize: none;
    border-radius:5px;
    outline: rgb(92,184,92) solid 1px;
    color: #999;
    padding: 10px;
  }

  .tit{
    color: #aaa;
    margin-top: 30px;
  }
  .setlogo{
    display: flex;
    justify-content: center;
    margin-top: 10px;
  }
  .logo{
    width: 80px;
    height: 80px;
    text-align: center;
    box-shadow: 1px 1px 5px #bbb;
    cursor:pointer;
    border-radius:5px;
  }
  .logo p{
    margin-top: 32px;
    color: #ccc;
    font-size: 10px;
  }
  .qrcode{
    width: 300px;
    height: 300px;
    text-align: center;
    box-shadow: 1px 1px 5px #bbb;
    border-radius:5px;
  }
  .qrcode p{
    margin-top: 145px;
    color: #ccc;
    font-size: 18px;
  }
  textarea::-webkit-input-placeholder {
    /* WebKit browsers */
    color: #ddd;
  }
  textarea:-moz-placeholder {
    /* Mozilla Firefox 4 to 18 */
    color: #ddd;
  }
  textarea::-moz-placeholder {
    /* Mozilla Firefox 19+ */
    color: #ddd;
  }
  textarea::-ms-input-placeholder {
    /* Internet Explorer 10+ */
    color: #ddd;
  }
</style>
