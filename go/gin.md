# gin

go mod init ginTest // 初始化mod
go mod tidy // 更新包

```go
package main

import (
	"github.com/gin-gonic/gin"
)

// 在 RESTful API 中，使用的主要是以下五种HTTP方法：
// 	GET，表示读取服务器上的资源
// 	POST，表示在服务器上创建资源
// 	PUT,表示更新或者替换服务器上的资源
// 	DELETE，表示删除服务器上的资源
// 	PATCH，表示更新/修改资源的一部分

func main() {
	// 声明一个默认路由
	r := gin.Default()

	r.GET("/book", func(c *gin.Context) {
		c.JSON(200, gin.H{
			"message": "GET",
		})
	})

	r.POST("/book", func(c *gin.Context) {
		c.JSON(200, gin.H{
			"message": "POST",
		})
	})

	r.PUT("/book", func(c *gin.Context) {
		c.JSON(200, gin.H{
			"message": "PUT",
		})
	})

	r.DELETE("/book", func(c *gin.Context) {
		c.JSON(200, gin.H{
			"message": "DELETE",
		})
	})

	r.Run(":8080")
}
```