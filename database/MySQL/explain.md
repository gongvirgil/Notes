# explain

type结果值从好到坏依次是：

system > const > eq_ref > ref > fulltext > ref_or_null > index_merge > unique_subquery > index_subquery > range > index > ALL

all:全表扫描

index:另一种形式的全表扫描，只不过他的扫描方式是按照索引的顺序

range：有范围的索引扫描，相对于index的全表扫描，他有范围限制，因此要优于index

ref: 查找条件列使用了索引而且不为主键和unique。其实，意思就是虽然使用了索引，但该索引列的值并不唯一，有重复。这样即使使用索引快速查找到了第一条数据，仍然不能停止，要进行目标值附近的小范围扫描。但它的好处是它并不需要扫全表，因为索引是有序的，即便有重复值，也是在一个非常小的范围内扫描。

const:通常情况下，如果将一个主键放置到where后面作为条件查询，mysql优化器就能把这次查询优化转化为一个常量。至于如何转化以及何时转化，这个取决于优化器

一般来说，得保证查询至少达到range级别，最好能达到ref，type出现index和all时，表示走的是全表扫描没有走索引，效率低下，这时需要对sql进行调优。

当extra出现Using filesor或Using temproary时，表示无法使用索引，必须尽快做优化。

possible_keys：sql所用到的索引

key：显示MySQL实际决定使用的键（索引）。如果没有选择索引，键是NULL

rows: 显示MySQL认为它执行查询时必须检查的行数。