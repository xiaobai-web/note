<script>
  var vue = new Vue({
    el: "", //绑定指定ID的元素标签并挂载在该Dom节点
    data: {}, //定义了作用域在该vue实例的变量
    methods: {}, //执行的方法函数
    filters: {}, //通过vue实例的filters属性创建过滤器，创建的过滤器是一个函数,在值运算中用竖杠 | 表示
    computed: {}, //通过vue实例的computed属性创建计算器，创建的计算器是一个函数,与过滤器和methods功能类似，不同的是若计算器依赖的数值不变，则不会重新执行函数，性能较优。
    components: {},
    watch: {}
  });
</script>
ES6 Promise
     构造函数/ 对象的状态不受外界影响/ 一旦状态改变，就不会再变/用于简化层层回调/resolve将promise回调修改为fullfiled（成功）/reject为失败时的回调/then方法接受两个回调（失败/成功）function(data)或function(reason, data)/当回调失败时或代码异常时会进入catch方法中/all，并行执行异步操作并当所有异步操作执行结果是成功是才执行回调