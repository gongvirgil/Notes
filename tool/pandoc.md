# pandoc

## 安装pandoc

* 参考官方网站：http://pandoc.org/installing.html
	* linux下安装：sudo apt-get install pandoc

## 安装MiKTeX

参考官方网站：http://miktex.org/howto/install-miktex 
Windows版安装CTeX：http://www.ctex.org/CTeXDownload

## github-markdown css样式

下载[github-markdown.css](https://github.com/sindresorhus/github-markdown-css/blob/gh-pages/github-markdown.css)样式。 


## pm-template latex模版

下载[pm-template.latex](https://github.com/tzengyuxio/pages/blob/gh-pages/pandoc/pm-template.latex)模版。

## markdown文档转换

转pdf格式: pandoc yourmarkdown.md -o exportdoc.pdf --latex-engine=xelatex --template=pm-template.latex

转html格式: pandoc yourmarkdown.md -o exportdoc.html -c github-markdown.css

转word格式: pandoc yourmarkdown.md -o exportdoc.docx -c github-markdown.css