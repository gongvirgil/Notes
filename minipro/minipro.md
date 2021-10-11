# 小程序

目前小程序开发主要有三种形式：原生、wepy、mpvue，其中wepy是腾讯的开源项目；mpvue是美团开源的一个开发小程序的框架，全称mini program vue(基于vue.js的小程序)。


对比项          |	原生小程序	   | mpvue	 |  wepy
---|---|---|---
语法规范        |	小程序开发规范	|   vuejs语法规范	  |  类似vuejs语法
标签集合        |	小程序标签	    |  小程序标签+h5标签   |  小程序标签
样式规范        |	wxss	      |   sass less stylus |  sass less stylus
组件化          |	无组件化机制	|  vue组件化规范	  | 自定义组件化规范
对端复用        |	不支持	       |   支持	            |  支持
自动构建        |	 无	           |  webpack	       | 框架内置
集中数据管理    |   无	           |   vuex	           |  redux
编辑器          |	微信开发者工具	|   不限	         |   不限
文件后缀        |	.wxss .wxml	  |   .vue	          |  .wpy
上手成本        |	熟悉原生小程序	|   熟悉vuejs	     |  熟悉vuejs及wepy
