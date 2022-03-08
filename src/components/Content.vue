<template>
  <div class="box">
    <div class="set" v-if="!isPhone">
      <textarea type="text" placeholder="输入您的内容" maxlength="400" ref="content" v-model.trim="text"></textarea>
      <div class="setlogo">
        <div class="tit">设置LOGO：</div>
        <input style="display: none;" type="file" ref="logo" name="file" accept="image/jpeg,image/png" @change="upload"/>
        <div class="logo" @click="btnLogo()" ref="uploadDiv" v-html="uploadDivHtml"></div>
      </div>
      <div class="btnbox"><button type="button" @click="creatQR">生成二维码</button></div>
    </div>
    <div v-else class="phone">
      <img :src="imgSrc" style="width:100%;object-fit:cover;" />
      <el-button round @click="isPhone=!isPhone">返回</el-button>
    </div>
    <div class="qrcode">
      <img :src="imgSrc" style="width:100%;height:100%;object-fit:cover;" />
    </div>
  </div>
</template>

<script>
  import {getImgUrl} from '../request/api.js'

  export default {
    name: "Content",
    data() {
      return {
        imgSrc:'http://www.keweikeji.com/qrcode/class/qr.php?content=http://www.keweikeji.com/qrcode/&logo=../images/ico/qr.png',
        logourl: '',
        uploadDivHtml: '<p>点击上传</p>',
        isSizeOk: false,
        text: '',
        isPhone: false,
        minSize: 835
      }
    },
    methods: {
      creatQR() {
        if(!this.text){
          this.$message({
            title: '注意',
            message: '请输入您要转码的内容',
            type: 'warning',
            center: true
          })
          this.$refs.content.focus()
        }else{
          this.imgSrc = 'http://www.keweikeji.com/qrcode/class/qr.php?content=' + encodeURIComponent(this.text) + '&logo=' + this.logourl
          if(document.body.clientWidth <= this.minSize){
            this.isPhone = true
          }else{
            this.isPhone = false
          }
        }
      },
      btnLogo() {
        this.$refs.logo.dispatchEvent(new MouseEvent('click'))
      },
      upload(el) {
        const file = el.target.files[0]
        //验证用户点了取消
        if(file==undefined){
          this.logourl = ''
          this.uploadDivHtml = '<p>点击上传</p>'
          return false
        }
        //验证图片大小
        if(file.size > 1024*1024){
          this.$message({
            title: '注意',
            message: '请上传小于1M的图片',
            type: 'error',
            center: true
          })
          return false
        }
        //验证图片尺寸
        const that = this
        var reader = new FileReader()
        reader.readAsDataURL(file)
        reader.onload = function(theFile) {
          var image = new Image()
          image.src = theFile.target.result
          image.onload = function() {
            if(this.width==this.height){
              that.isSizeOk = true
            }else{
              that.isSizeOk = false
            }
          }
        }
        //延时后判断尺寸
        setTimeout(() => {
          if(!this.isSizeOk){
            this.$message({
              title: '注意',
              message: '请上传尺寸为1:1的图片',
              type: 'error',
              center: true
            })
            return false
          }
          //开始上传图片文件
          const formData = new FormData()
          formData.append('file',file)
          getImgUrl(formData)
            .then(res => {
              console.log(res)
            })
            .catch(res => {
              console.log(res)
            })
        },500)
      }
    },
    mounted() {
      this.$refs.content.focus()
      window.onresize = () => {
        if(document.body.clientWidth <= this.minSize){
          this.isPhone = true
        }else{
          this.isPhone = false
        }
      }
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
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none;
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
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none;
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
  .phone {
    text-align: center;
  }
  .phone img {
    border-radius:20px;
    margin-bottom: 20px;
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
  @media (max-width: 850px) {
    .qrcode {
      display: none;
    }
  }
</style>
