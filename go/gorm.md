# Gorm

## ErrRecordNotFound


使用 Find、First、Last查询，且传入的参数是结构体类型的时候。就会触发该错误。

## CreateOrUpdate之Upsert

鉴于 MySQL 提供了 ON DUPLICATE KEY UPDATE 的能力，我们可以充分利用唯一键的约束，来搞定并发场景下的 CreateOrUpdate。

```golang
import "gorm.io/gorm/clause"

// 不处理冲突
DB.Clauses(clause.OnConflict{DoNothing: true}).Create(&user)

// `id` 冲突时，将字段值更新为默认值
DB.Clauses(clause.OnConflict{
  Columns:   []clause.Column{{Name: "id"}},
  DoUpdates: clause.Assignments(map[string]interface{}{"role": "user"}),
}).Create(&users)
// MERGE INTO "users" USING *** WHEN NOT MATCHED THEN INSERT *** WHEN MATCHED THEN UPDATE SET ***; SQL Server
// INSERT INTO `users` *** ON DUPLICATE KEY UPDATE ***; MySQL

// Update columns to new value on `id` conflict
DB.Clauses(clause.OnConflict{
  Columns:   []clause.Column{{Name: "id"}},
  DoUpdates: clause.AssignmentColumns([]string{"name", "age"}),
}).Create(&users)
// MERGE INTO "users" USING *** WHEN NOT MATCHED THEN INSERT *** WHEN MATCHED THEN UPDATE SET "name"="excluded"."name"; SQL Server
// INSERT INTO "users" *** ON CONFLICT ("id") DO UPDATE SET "name"="excluded"."name", "age"="excluded"."age"; PostgreSQL
// INSERT INTO `users` *** ON DUPLICATE KEY UPDATE `name`=VALUES(name),`age=VALUES(age); MySQL

```


初阶的用法中，我们只需要关注三个属性：

DoNothing：冲突后不处理，参照上面的 Build 实现可以看到，这里只会加入 DO NOTHING；
DoUpdates: 配置一批需要赋值的 KV，如果没有指定 DoNothing，会根据这一批 Assignment 来写入要更新的列和值；

type Set []Assignment

type Assignment struct {
	Column Column
	Value  interface{}
}

UpdateAll: 冲突后更新所有的值（非 default tag字段）。

需要注意的是，所谓 OnConflict，并不一定是主键冲突，唯一键也包含在内。所以，使用 OnConflict 这套 Upsert 的先决条件是【唯一索引】或【主键】都可以。生成一条SQL语句，并发安全。
如果没有唯一索引的限制，我们就无法复用这个能力，需要考虑别的解法。
