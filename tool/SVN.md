
## SVN客户端

SVN客户端常用的程序`TortoiseSVN`：

### TortoiseSVN下载

### TortoiseSVN Client常用操作

#### SVN checkout

SVN 检出，和git的clone命令类似，将SVN服务器的`repository`项目资源拷贝一份到本地仓库。本地仓库会生成一个`.svn`的隐藏目录，里面主要有两项关键信息：工作文件的基准版本和一个本地副本最后更新的时间戳，千万不要手动修改或者删除这个.svn隐藏目录和里面的文件,否则将会导致你本地的工作拷贝(静态试图)被破坏，无法再进行操作。

#### SVN Update

#### SVN Commit

#### TortosieSVN => Add

#### TortosieSVN => Delete

#### TortosieSVN => Rename

#### TortosieSVN => Update to revision...

SVN还原

#### TortosieSVN => Check for modifications

#### TortosieSVN => Show log

## SVN常用命令

* svn checkout svn://xxx/xxx/ /home/xxx  --username `username`
* svn cleanup