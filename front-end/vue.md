# vue.js

## install

命令行工具
Vue.js 提供一个官方命令行工具，可用于快速搭建大型单页应用。

```sh
# 全局安装 vue-cli
$ cnpm install --global vue-cli
# 创建一个基于 webpack 模板的新项目
$ vue init webpack my-project
# 这里需要进行一些配置，默认回车即可
This will install Vue 2.x version of the template.

For Vue 1.x use: vue init webpack#1.0 my-project

? Project name my-project
? Project description A Vue.js project
? Author runoob <test@runoob.com>
? Vue build standalone
? Use ESLint to lint your code? Yes
? Pick an ESLint preset Standard
? Setup unit tests with Karma + Mocha? Yes
? Setup e2e tests with Nightwatch? Yes

   vue-cli · Generated "my-project".

   To get started:

     cd my-project
     npm install
     npm run dev

   Documentation can be found at https://vuejs-templates.github.io/webpack
进入项目，安装并运行：

$ cd my-project
$ cnpm install
$ cnpm run dev
 DONE  Compiled successfully in 4388ms

> Listening at http://localhost:8080
```


* cnpm install
* cnpm run build
* cnpm run dev

## 目录结构

* `build`	项目构建(webpack)相关代码
* `config`	配置目录，包括端口号等。我们初学可以使用默认的。
* `node_modules`	npm 加载的项目依赖模块
* `src`	这里是我们要开发的目录，基本上要做的事情都在这个目录里。里面包含了几个目录及文件：
    * `assets`: 放置一些图片，如logo等。
    * `components`: 目录里面放了一个组件文件，可以不用。
    * `router`: 路由文件。
    * `App.vue`: 项目入口文件，我们也可以直接将组件写这里，而不使用 components 目录。
    * `main.js`: 项目的核心文件。
* `static`	静态资源目录，如图片、字体等。
* `test`	初始测试目录，可删除
* `.xxxx`文件	这些是一些配置文件，包括语法配置，git配置等。
* `index.html`	首页入口文件，你可以添加一些 meta 信息或统计代码啥的。
* `package.json`	项目配置文件。
* `README.md`	项目的说明文档，markdown 格式

## 模板语法


> 表达式

* `{{ message }}` 输出文本
* `{{ 5+5 }}`
* `{{ ok ? 'YES' : 'NO' }}`
* `{{ message.split('').reverse().join('') }}`
* `<div v-bind:id="'list-' + id"></div>`

> 指令

* `v-html` 输出html
    * `<div v-html="message"></div>`
* `v-if` 是否输出
    * `<div v-if="seen"></div>`
* `v-else-if`
* `v-else`
* `v-for` 循环，需要以 `site in sites` 形式的特殊语法， `sites` 是源数据数组并且 `site` 是数组元素迭代的别名。
    * `<li v-for="site in sites">{{ site.name }}</li>`
    * `<li v-for="value in object">{{ value }}</li>`
    * `<li v-for="(value, key, index) in object">{{ index }} : {{ key }} : {{ value }}</li>`
    * `<li v-for="n in 10">{{ n }}</li>`
* `v-show` 是否展示
* `v-bind` 属性, 缩写为直接使用 `:`
    * v-bind:class / :class
        * `<div v-bind:class="{'class1': xxxx, 'class2': xxxx}">`
        * `<div v-bind:class="classObject"></div>`
    * v-bind:style
        * `<div v-bind:style="{ color: xxx, fontSize: xxx + 'px' }">`
        * `<div v-bind:style="styleObject">`
        * `<div v-bind:style="[styleObject1, styleObject2">`
    * v-bind:href / :href
* `v-on` 监听DOM事件，, 缩写为使用 `@`
    * `<a v-on:click="doSomething">`
    * `<a @click="doSomething">`
    * `<a @click="doSomething('xxx')">`
    * `<form @submit.prevent="onSubmit"></form>`
    * 修饰符
        *  `.stop` 阻止单击事件冒泡
        *  `.prevent` 提交事件不再重载页面，调用 event.preventDefault()
        *  `.capture`
        *  `.self`
        *  `.once`
    * 按键修饰符 
        * `@keyup.13`
        * `.enter`
        * `.tab`
        * `.delete` (捕获 "删除" 和 "退格" 键)
        * `.esc`
        * `.space`
        * `.up`
        * `.down`
        * `.left`
        * `.right`
        * `.ctrl`
        * `.alt`
        * `.shift`
        * `.meta`
* `v-model` 在 input、select、textarea、checkbox、radio 等表单控件元素上创建双向数据绑定，根据表单上的值，自动更新绑定的元素的值。
    * 相同名称的绑定到数组
    * 修饰符
        * `.lazy` : 在默认情况下， v-model 在 input 事件中同步输入框的值与数据，但你可以添加一个修饰符 lazy ，从而转变为在 change 事件中同步：
            * `<input v-model.lazy="msg" >`
        * `.number` : 如果想自动将用户的输入值转为 Number 类型（如果原值的转换结果为 NaN 则返回原值），可以添加一个修饰符 number 给 v-model 来处理输入值：
            * `<input v-model.number="age" type="number">`
        * `.trim` : 如果要自动过滤用户输入的首尾空格，可以添加 trim 修饰符到 v-model 上过滤输入：
            * `<input v-model.trim="msg">`

> 过滤器

Vue.js 允许你自定义过滤器，被用作一些常见的文本格式化。由"管道符"指示。过滤器函数接受表达式的值作为第一个参数。

```html
<!-- 在两个大括号中 -->
{{ message | capitalize }}

<!-- 在 v-bind 指令中 -->
<div v-bind:id="rawId | formatId"></div>

<!-- 过滤器可以串联： -->
{{ message | filterA | filterB }}

<!-- 过滤器是 JavaScript 函数，因此可以接受参数： -->
{{ message | filterA('arg1', arg2) }}
<!-- 这里，message 是第一个参数，字符串 'arg1' 将传给过滤器作为第二个参数， arg2 表达式的值将被求值然后传给过滤器作为第三个参数。-->
```

> 计算属性

* `computed` : 默认只有 `getter` ，需要时可以提供一个 `setter`。依赖缓存，只有相关依赖发生改变时才会重新取值。
* `methods` : 不依赖缓存，重新渲染的时候，函数总会重新调用执行。

```html
<div id="app">
  <p>原始字符串: {{ message }}</p>
  <p>计算后反转字符串: {{ reversedMessage }}</p>
</div>
<script>
var vm = new Vue({
  el: '#app',
  data: {
    message: 'Runoob!'
  },
  methods: {
    // 计算属性的 getter
    reversedMessage: function () {
      // `this` 指向 vm 实例
      return this.message.split('').reverse().join('')
    }
  },
  computed: {
    site: {
      // getter
      get: function () {
        return this.name + ' ' + this.url
      },
      // setter
      set: function (newValue) {
        var names = newValue.split(' ')
        this.name = names[0]
        this.url = names[names.length - 1]
      }
    }
  }
})
</script>
```

> 监听属性

`watch` 监听数据的变化

```html
<div id = "app">
    <p style = "font-size:25px;">计数器: {{ counter }}</p>
    <button @click = "counter++" style = "font-size:25px;">点我</button>
</div>
<script type = "text/javascript">
var vm = new Vue({
    el: '#app',
    data: {
        counter: 1
    }
});
vm.$watch('counter', function(nval, oval) {
    alert('计数器值的变化 :' + oval + ' 变为 ' + nval + '!');
});
</script>
```

```html
<div id = "computed_props">
    千米 : <input type = "text" v-model = "kilometers">
    米 : <input type = "text" v-model = "meters">
</div>
<p id="info"></p>
<script type = "text/javascript">
    var vm = new Vue({
    el: '#computed_props',
    data: {
        kilometers : 0,
        meters:0
    },
    methods: {
    },
    computed :{
    },
    watch : {
        kilometers:function(val) {
            this.kilometers = val;
            this.meters = this.kilometers * 1000
        },
        meters : function (val) {
            this.kilometers = val/ 1000;
            this.meters = val;
        }
    }
    });
    // $watch 是一个实例方法
    vm.$watch('kilometers', function (newValue, oldValue) {
    // 这个回调将在 vm.kilometers 改变后调用
    document.getElementById ("info").innerHTML = "修改前值为: " + oldValue + "，修改后值为: " + newValue;
})
</script>
```

## 组件

组件（Component）是 Vue.js 最强大的功能之一。
组件可以扩展 HTML 元素，封装可重用的代码。
组件系统让我们可以用独立可复用的小组件来构建大型应用，几乎任意类型的应用的界面都可以抽象为一个组件树。

注册一个全局组件语法格式如下：`Vue.component(tagName, options)`
tagName 为组件名，options 为配置选项。注册后，我们可以使用以下方式来调用组件：`<tagName></tagName>`

## 自定义指令

## 路由

Vue.js 路由允许我们通过不同的 URL 访问不同的内容。
通过 Vue.js 可以实现多视图的单页Web应用（single page web application，SPA）。
Vue.js 路由需要载入 vue-router 库

中文文档地址：vue-router文档。

安装 vue-router
* 1、直接下载 / CDN :  https://unpkg.com/vue-router/dist/vue-router.js
* 2、NPM 推荐使用淘宝镜像：`cnpm install vue-router`

## Ajax

Vue.js 2.0 版本推荐使用 axios 来完成 ajax 请求。
Axios 是一个基于 Promise 的 HTTP 库，可以用在浏览器和 node.js 中。
Github开源地址： https://github.com/axios/axios

安装Axios
* 使用 cdn:
    * `<script src="https://unpkg.com/axios/dist/axios.min.js"></script>`
    * `<script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>`
* 使用 npm: `$ npm install axios`
* 使用 bower: `$ bower install axios`
* 使用 yarn: `$ yarn add axios`

* axios.request(config)
* axios.get(url[, config])
* axios.delete(url[, config])
* axios.head(url[, config])
* axios.post(url[, data[, config]])
* axios.put(url[, data[, config]])
* axios.patch(url[, data[, config]])

```js
// 直接在 URL 上添加参数 ID=12345
axios.get('/user?ID=12345')
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
 
// 也可以通过 params 设置参数：
axios.get('/user', {
    params: {
      ID: 12345
    }
  })
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
// post
axios.post('/user', {
    firstName: 'Fred',        // 参数 firstName
    lastName: 'Flintstone'    // 参数 lastName
  })
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });

```