# CSS

## 字体

* Mac OS

中文名 | 英文名 | Unicode | Unicode 2
---|---|---|---
华文细黑	|	STHeiti Light [STXihei]	|	\534E\6587\7EC6\9ED1		|	华文细黑
华文黑体	|	STHeiti					|	\534E\6587\9ED1\4F53		|	华文黑体
华文楷体	|	STKaiti					|	\534E\6587\6977\4F53		|	华文楷体
华文宋体	|	STSong					|	\534E\6587\5B8B\4F53		|	华文宋体
华文仿宋	|	STFangsong				|	\534E\6587\4EFF\5B8B		|	华文仿宋
丽黑Pro		|	LiHei Pro Medium		|	\4E3D\9ED1 Pro				|	丽黑Pro
丽宋Pro		|	LiSong Pro Light		|	\4E3D\5B8B Pro				|	丽宋Pro
标楷体		|	BiauKai					|	\6807\6977\4F53				|	标楷体
苹果丽中黑	|	Apple LiGothic Medium	|	\82F9\679C\4E3D\4E2D\9ED1	|	苹果丽中黑
苹果丽细宋	|	Apple LiSung Light		|	\82F9\679C\4E3D\7EC6\5B8B	|	苹果丽细宋

* Windows

中文名 | 英文名 | Unicode | Unicode 2
---|---|---|---
新细明体	|	PMingLiU			|	\65B0\7EC6\660E\4F53		|	新细明体
细明体		|	MingLiU				|	\7EC6\660E\4F53				|	细明体
标楷体		|	DFKai-SB			|	\6807\6977\4F53				|	标楷体
黑体		|	SimHei				|	\9ED1\4F53					|	黑体
宋体		|	SimSun				|	\5B8B\4F53					|	宋体
新宋体		|	NSimSun				|	\65B0\5B8B\4F53				|	新宋体
仿宋		|	FangSong			|	\4EFF\5B8B					|	仿宋
楷体		|	KaiTi				|	\6977\4F53					|	楷体
仿宋_GB2312	|	FangSong_GB2312		|	\4EFF\5B8B_GB2312			|	仿宋_GB2312
楷体_GB2312	|	KaiTi_GB2312		|	\6977\4F53_GB2312			|	楷体_GB2312
微软正黑体	|	Microsoft JhengHei	|	\5FAE\x8F6F\6B63\9ED1\4F53	|	微软正黑体
微软雅黑	|	Microsoft YaHei		|	\5FAE\8F6F\96C5\9ED1		|	微软雅黑

* Office

中文名 | 英文名 | Unicode | Unicode 2
---|---|---|---
隶书		|	LiSu		|	\96B6\4E66				|	隶书
幼圆		|	YouYuan		|	\5E7C\5706				|	幼圆
华文细黑	|	STXihei		|	\534E\6587\7EC6\9ED1	|	华文细黑
华文楷体	|	STKaiti		|	\534E\6587\6977\4F53	|	华文楷体
华文宋体	|	STSong		|	\534E\6587\5B8B\4F53	|	华文宋体
华文中宋	|	STZhongsong	|	\534E\6587\4E2D\5B8B	|	华文中宋
华文仿宋	|	STFangsong	|	\534E\6587\4EFF\5B8B	|	华文仿宋
方正舒体	|	FZShuTi		|	\65B9\6B63\8212\4F53	|	方正舒体
方正姚体	|	FZYaoti		|	\65B9\6B63\59DA\4F53	|	方正姚体
华文彩云	|	STCaiyun	|	\534E\6587\5F69\4E91	|	华文彩云
华文琥珀	|	STHupo		|	\534E\6587\7425\73C0	|	华文琥珀
华文隶书	|	STLiti		|	\534E\6587\96B6\4E66	|	华文隶书
华文行楷	|	STXingkai	|	\534E\6587\884C\6977	|	华文行楷
华文新魏	|	STXinwei	|	\534E\6587\65B0\9B4F	|	华文新魏


## Others

背景渐变色：
		background-image: linear-gradient(to right, #fff, #000 100%);
currentColor

table-css
  <table class="table" cellspacing="0">
  		<thead>
  				<tr>
  						<th width="10%">序号</th>
  						<th width="20%">游戏</th>
  						<th width="20%">区服</th>
  						<th width="20%">卡号</th>
  						<th width="30%">领取时间</th>
  				</tr>
  		</thead>
  		<tbody>
  				<volist name="mycard_list" id="vo" key="k">
  				<tr>
  						<td>{$k}</td>
  						<td>{$vo.gamename}</td>
  						<td>{$vo.servername}</td>
  						<td>{$vo.card_info}</td>
  						<td>{$vo.get_time|date="Y-m-d H:i:s",###}</td>
  				</tr>
  				</volist>
  		</tbody>
  </table>

										
				.table {width: 100%;margin-bottom: 20px;text-align: center;vertical-align: middle;}
				.table th,.table td {line-height: 20px;padding: 15px 20px;text-align: center;font-size: 14px;border: 0 none;}
				.table thead th {background-color: #dfdfdf;color: #fff;}
				.table tbody td {background-color: #fff;color: #666;}
				.table tr:hover td {background-color: #dfdfdf;}

/*分页css*/
.listpage {width:auto;margin:0 20px;padding:10px 0 12px;text-align:center;line-height:25px;_padding-top:4px;}
.listpage b{font-weight:normal;}
.listpage a {display:inline-block;padding:0 10px;color:#666;border:1px solid #ccc;background:none;height:26px;margin:0 5px 10px;text-decoration:none;}
.listpage a:hover{background:#ff6b09;color:#fff;border:1px solid #fff;text-decoration:none;}
.listpage span{display:inline-block;padding:0 10px;background:#ff6b09;border:1px solid #ff6b09;color:#fff;margin:0 3px 10px;}
.pages,.pages_more {width:578px;margin:0 auto;padding:10px 0 20px 0;border-top:1px dashed #1e2029;}
.pages a{color:#53586e;}
.pages_more {border:none;padding:0px 0 30px 0;}
.listpage a.on{display:inline-block;padding:0 10px;background:#ff6b09;border:1px solid #ff6b09;color:#fff;margin:0 5px 10px;cursor:default;}
