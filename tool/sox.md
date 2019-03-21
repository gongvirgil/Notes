# SoX音频文件工具

SoX 是一款强大音频文件工具箱,是音频操作方面的瑞士军刀, 转码， 播放， 录制，以及查看音频文件格式都很方便， 其中主要包含四个命令行小工具:

* sox 音频格式转换
* soxi 音频格式信息查询
* play 播放音频文件
* rec 录制音频文件

## 音频格式转换工具 sox

可以从 http://sox.sourceforge.net/ 下载安装
MacOS 上直接用 brew install sox 安装
用法如下

```
sox [global-options] [format-options] infile1 [[format-options] infile2] ... [format-options] outfile [effect [effect-options]] ...
```

输入输出参数选项 :

* −b BITS, −−bits BITS (采样的比特位数)
* −c CHANNELS, −−channels CHANNELS (声道个数)
* −e ENCODING, −−encoding ENCODING (音频编码 a-law, u-law )
* −L, −−endian little   (小端)
* −r, −−rate RATE[k] (比特率)
* −t, −−type FILE-TYPE (文件类型, 比如 raw, mp3)

sox 的强大在于它能给音频文件添加各种音效和处理, 各种效果可以链式排列逐个对音频文件进行处理
例如 gain �效果， 可对于某些声道放大或减小音频信号
<pre>
gain [−e|−B|−b|−r] [−n] [−l|−h] [gain-dB]
</pre>
注意使用任一 −e, −B, −b, −r, 或 −n 参数都需要额外的磁盘空间, 对于流媒体不太适用
没有其他参数的 gain-dB 用来根据给定的分贝数值调整信号强度水平
正值为放大, 负值为减小
带有其他参数的 gain-dB 是在相应处理过程之后进行分贝的放大或减小

* -e 意为equalised, 用来均衡， 也就是把多通道音频文件中的所有通道达到相同的峰值电平
* −B (balance) 此选项与-e类似，�但是它使用RMS电平而不是峰值电平。 -B可用于纠正由不正确的磁带转录引起的立体声不平衡。请注意，不像-e，-B可能会导致一些对原文件的削剪
* −b  与-B类似，但具有削波保护，即如果需要在平衡时防止削波，则对所有信道应用衰减。但是请注意，结合-n，-B和-b是同义词
* -r选项与以前使用-h选项调用增益结合使用
* -n选项将音频标准化为0dB FSD;它通常与负增益dB结合使用，使得音频被归一化到低于0dB的给定电平
* loudness [gain [reference]] 

响度控制 - 类似于增益效应，但为人类听觉系统提供均衡。 有关响度的详细说明，请访问http://en.wikipedia.org/wiki/Loudness。 增益通过给定的增益参数（通常为负）进行调整，信号根据ISO 226 w.r.t.进行均衡。 参考电平为65dB，尽管如果原始音频已经被平衡以达到某个其他最佳电平，则可以给出替代参考电平。 如果没有给出增益值，则使用默认增益为-10dB。

* norm [dB-level]

规范音频。 规范只是获得-n的别名; 有关详细信息，请参阅增益效果。

* oops

异相立体声效果。 将立体声混合为双声道，其中每个单声道通道包含左右立体声通道之间的差异。 这有时被称为“卡拉OK”效果，因为它通常具有从录音中删除大部分或全部声乐的效果。 相当于混音1,2i 1,2i

示例

* 转换音频文件为 采样大小为16bit, 采样频率 8KHz, 单声道

<pre>
sox test.wav -L -b16 -r 8000 -c 1 new-test.wav
</pre>

* 转换音频文件为 G.711 u-law 编码, 采样频率 8KHz, 单声道

<pre>
sox src.wav -r 8000 -c 1 -e u-law dest.wav
</pre>

* 获取某个文件的时长信息 ： sox a.wav -n stat

## 音频格式查询工具 soxi

示例

soxi -V 1000.wav

input File     : '1000.wav'
Channels       : 1
Sample Rate    : 8000
Precision      : 14-bit
Duration       : 00:00:02.14 = 17090 samples ~ 160.219 CDDA sectors
File Size      : 17.1k
Bit Rate       : 64.2k
Sample Encoding: 8-bit u-law

## 音频播放工具 play

play [global-options] [format-options] infile1 [[format-options] infile2] ... [format-options] [effect [effect-options]] ...
<pre>
play 1000.wav
</pre>

## 音频录制工具 rec

rec [global-options] [format-options] outfile [effect [effect-options]] ...
示例

指定录制的采样率和采样位数
<pre>
rec -r 8000 -b 16
</pre>
指定录制的声道,目标文件, 并只截取前30分钟
<pre>
rec −c 2 radio.aiff trim 0 30:00
</pre>
指定录制的文件, 并只录一分钟
<pre>
rec music.wav trim 0 1
</pre>

## libsox

libsox is a library of sound sample file format readers/writers and sound effects processors. It is mainly developed for use by SoX but is useful for any sound application.
libsox是一个对于声音采样文件格式的读写和音效处理器库。 它主要用于工具SoX，�对于其他声音应用程序都很有用。但是它的 license 是 GPL/LGPL , 在商业产品代码中使用要注意
