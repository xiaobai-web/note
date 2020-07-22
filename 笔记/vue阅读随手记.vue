<!-- vue中使用~来表示路由对象，监听器内使用可省略this -->
this.$route
<!-- 查询路由参数 -->
this.$route.query  
<!-- import request from '@/utils/request'在vue中的使用 -->
this.$request
<!-- 相当于给axios实例追加post配置并执行 -->
this.$request.post(url[, data[, config]])
<!-- 对数组的元素进行排序,比较函数中a-b表示升序,b-a表示降序 -->
sort(sortby)
<!-- vue中支持大小写/视图中不支持 -->

<!-- ES6新特性 -->
()=> 表示为function() 还可用来定义对象
Promise:构造函数/ 对象的状态不受外界影响/ 一旦状态改变，就不会再变/用于简化层层回调/resolve将promise回调修改为fullfiled（成功）/reject为失败时的回调/then方法接受两个回调（失败/成功）function(data)或function(reason, data)/当回调失败时或代码异常时会进入catch方法中/all，并行执行异步操作并当所有异步操作执行结果是成功是才执行回调
<!-- 数组更新检测 -->
push() 在末尾添加元素
pop() 将数组最后一个元素移除
shift()	删除数组第一个元素
unshift()	在数组第一个元素位置添加元素；
splice() 添加或删除元素；第一个参数：添加/删除起始元素的位置。第二个参数： 要删除的元素数量。第三个参数： 可选。 向数组添加的新项目
sort()  数组排序
reverse() 
filter() 迭代替换数组
vm.$set 替换数组元素
<!-- 对象更新检测 -->
vm.$set 替换对象属性
Object.assign() 为对象赋值多个属性
<!-- 事件修饰符 -->
.stop 阻止单击事件继续传播
.prevent 提交事件不再重载页面
<!-- 表单修饰符 -->
.lazy 使用change事件同步
.number 将表单值转换为数值类型
.trim 过滤表单首尾空白字符
<!-- js常用函数 -->
字符串函数
    valueOf() 将对应的类型转换成对象
    charAt() 返回在指定位置的字符
    conca() 连接字符串
    indexOf() 检索字符串,返回的是字符在字符串的下标
    match() 在字符串内检索指定的值或找到一个或多个正则表达式的匹配，返回的是值而不是值的位置
    replace() 替换匹配的字符串
    slice() 提取字符串片段，并在新的字符串中返回被提取的部分
    split() 把字符分割成数组
    toLowerCase() 把字符串转换成小写
    toUpperCase() 把字符串转换成大写
    substr() 从起始索引号提取字符串中指定数目的字符
数组函数
    slice[start,end]返回从原数组中指定开始下表到结束下表之间的项组成的新数组
