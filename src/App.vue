<template>
  <QRTitle title="制作二维码" />
  <Content/>
  <QRfooter :footer="copyright"/>
</template>

<script>
import QRTitle from './components/QRTitle.vue'
import QRfooter from './components/QRfooter.vue'
import Content from './components/Content.vue'

export default {
  name: 'App',
  components: {
    QRTitle,
    QRfooter,
    Content,
  },
  data() {
    return {
      copyright:'<p>2019-2022 &copy All rights reserved | 技术支持 <a href="http://www.keweikeji.com">Rookie</a></p>'
    }
  }
}
</script>

<style>
  body {
    background-color: rgb(233, 233, 233);
  }
</style>
