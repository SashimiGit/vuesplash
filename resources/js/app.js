Vue.config.devtools = true;

import './bootstrap';
import Vue from 'vue'
// ルーティングの定義をインポートする
import router from './router'
// ルートコンポーネントをインポートする
import App from './App.vue'
//ストアの読み込み
import store from './store'

new Vue({
  el: '#app',
  router, // ルーティングの定義を読み込む
  store, //storeの定義
  components: { App }, // ルートコンポーネントの使用を宣言する
  template: '<App />' // ルートコンポーネントを描画する
})