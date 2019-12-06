# pika

https://www.w3cschool.cn/pika/


## pipa介绍

pika 是360 DBA和基础架构组联合开发的类redis 存储系统, 完全支持Redis协议，用户不需要修改任何代码, 就可以将服务迁移至pika. 有维护redis 经验的DBA 维护pika 不需要学习成本

pika 主要解决的是用户使用redis的内存大小超过50G, 80G 等等这样的情况, 会遇到比如启动恢复时间长, 一主多从代价大, 硬件成本贵, 缓冲区容易写满等等问题. pika 就下针对这些场景的一个解决方案

pika 目前已经开源, github地址: https://github.com/Qihoo360/pika

重点:
pika 的单线程的性能肯定不如redis, pika是多线程的结构, 因此在线程数比较多的情况下, 某些数据结构的性能可以优于redis。
pika 肯定不是完全优于redis 的方案, 只是在某些场景下面更适合. 所以目前公司内部redis, pika 是共同存在的方案, DBA会根据业务的场景挑选合适的方案。