# 常用内容

## 时间转换


```golang
  //当前时间
t := time.Now()
fmt.Println(t.Format("2006-01-02 15:04:05"))
fmt.Println(t.Year(), int(t.Local().Month()), t.Day())

//时间戳10位 秒
fmt.Println(time.Now().Unix())

//时间戳13位 毫秒
fmt.Println(time.Now().UnixNano() / 1e6)

//时间戳转时间
sec := time.Now().Unix()
fmt.Println(time.Unix(sec, 0).Format("2006-01-02 15:04:05"))

//时间转时间戳
fmt.Println(time.Date(2020, 5, 1, 5, 59, 59, 0, time.Local).Unix()) //2020-05-01 05:59:59

time.ParseDuration("2022-04-14")

// 10分钟前
m, _ := time.ParseDuration("-10m")
m1 := t.Add(m)
fmt.Println(m1.Format("2006-01-02 15:04:05"))

//10分钟后
mm, _ := time.ParseDuration("10m")
m2 := t.Add(mm)
fmt.Println(m2.Format("2006-01-02 15:04:05"))

// 8个小时前
h, _ := time.ParseDuration("-1h")
h1 := t.Add(8 * h)
fmt.Println(h1.Format("2006-01-02 15:04:05"))

//获取两年前的时间
y := t.AddDate(-2, 0, 0) //年，月，日
fmt.Println(y.Format("2006-01-02 15:04:05"))

//两年后
y1 := t.AddDate(2, 0, 0)
fmt.Println(y1.Format("2006-01-02 15:04:05"))
```