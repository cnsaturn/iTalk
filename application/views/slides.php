<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<base href="<?php echo base_url('assets');?>/" />

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>初创团队工作流与开发模式探讨</title>

	<meta name="description" content="中小团队工作流程与开发模式探讨">
	<meta name="author" content="Saturn">
	<meta name="viewport" content="width=1024, user-scalable=no">
	
	<?php if(ENVIRONMENT == 'development'):?>
	<link rel="stylesheet" href="lib/font-awesome.css">

	<!-- Core and extension CSS files -->
	<link rel="stylesheet" href="lib/core/deck.core.css">
	<link rel="stylesheet" href="lib/extensions/goto/deck.goto.css">
	<link rel="stylesheet" href="lib/extensions/menu/deck.menu.css">
	<link rel="stylesheet" href="lib/extensions/navigation/deck.navigation.css">
	<link rel="stylesheet" href="lib/extensions/status/deck.status.css">
	<link rel="stylesheet" href="lib/extensions/hash/deck.hash.css">
	<link rel="stylesheet" href="lib/extensions/scale/deck.scale.css">
	
	<!-- Style theme. More available in /themes/style/ or create your own. -->
	<link rel="stylesheet" href="lib/themes/style/web-2.0.css">
	
	<!-- Transition theme. More available in /themes/transition/ or create your own. -->
	<link rel="stylesheet" href="lib/themes/transition/horizontal-slide.css">

	<!-- Rock our own style. -->
	<link rel="stylesheet" href="lib/italk.css">
	
	<script src="lib/modernizr.custom.js"></script>
	<?php else:?>
	<?php echo css('italk.min.css');?>
	<?php echo js('modernizr.custom.min.js');?>
	<?php endif;?>
</head>

<body class="deck-container">

<!-- Begin slides -->
<section class="slide" id="title-slide">
	<h1>初创团队工作流与开发模式探讨</h1>
	<h2>胡杨刚（a.k.a. Saturn）</h2>
	<p>
		<a href="https://github.com/cnsaturn/iTalk"><i class="icon-github"></i> Slides and Source on Github</a> &nbsp;
		<a href="mailto:saturn#codeigniter.org.cn"><i class="icon-envelope"></i> Me</a> &nbsp;
		<a href="http://codeigniter.org.cn/forums/thread-14689-1-1.html"><i class="icon-time"></i> 2012/11/18</a> &nbsp;
		<a href="http://ku6.com"><i class="icon-globe"></i> ku6.com, Beijing</a> &nbsp;
		<a href="http://codeigniter.org.cn/forums/thread-14689-1-1.html"><i class="icon-film"></i> Video</a> &nbsp;
	</p>
</section>

<section class="slide" id="walk-thru">
	<h2>主题 Walkthrough</h2>
	<ol>
		<li>
			<h3>初创团队协作工具选型及各自角色</h3>
			<p>高效协作开发三剑客：Basecamp、Github、QQ 企业邮箱</p>
		</li>
		<li>
			<h3>基于 Git-Flow 的 Web 开发模型</h3>
			<p>简单介绍 Git 及 Git-Flow 开发模型</p>
		</li>
		<li>
			<h3>使用 Git 对 CI 应用进行自动化部署</h3>
			<p>Case Study: 利用 Github Service WebHook 调用脚本执行自动化部署</p>
		</li>
	</ol>
</section>

<section class="slide" id="considerations">
	<h2>协作/开发工具选型标准 Considerations</h2>
	<ol>
		<li>
			<h3>体验：是否简单易用？</h3>
			<p>降低因引入新的工作软件/模式所带来的学习成本。</p>
		</li>
		<li>
			<h3>协作：是否方便多人远程协作？</h3>
			<p>完全线上协作，集中资源闹革命；不必再为无法找到合适的本地人才而烦恼。</p>
		</li>
		<li>
			<h3>信息整合：是否支持丰富的 API 功能？</h3>
			<p>API 方便将团队所有工具信息流进行整合、归档，形成团队专属知识库/Bug集中营。</p>
		</li>
		<li>
			<h3>成本：是否需要花费精力维护？是否便宜？</h3>
			<p>选用在业界具有知名度的 SaaS 型工具，降低软件维护成本和财务成本。</p>
		</li>
	</ol>
</section>

<section class="slide" id="recommendation">
	<h2>推荐方案 Recommendation</h2>
	<p>适合 10~50 人之间的开发团队，每月固定财务花费约 200 USD（~ 1400 CNY）。</p>
	<ol>
		<li>
			<h3>Basecamp：产品设计与规划执行</h3>
			<p>用例：产品功能讨论（Messages）、文档协同撰写（Writeboards）、待办事项（To-Dos）、团队日历（Calendar）和时间管理（Time Tracking）</p>
		</li>
		<li>
			<h3>Github：源代码管理与缺陷跟踪</h3>
			<p>用例：代码托管（Git）、产品功能路线图（Milestone）、代码审查（Code Review）、Bug 跟踪（Issues）</p>
		</li>
		<li>
			<h3>QQ 企业邮箱：信息中心与消息推送</h3>
			<p>用例：通过绑定 QQ 或微信，将开发相关任务即时、准确的传达到每位订阅成员。</p>
		</li>
	</ol>
</section>

<section class="slide" id="workflow">
	<h2>工作信息流 A Workflow for startup</h2>
	<div style="float:left">
		<ol>
			<li><strong>Basecamp</strong>：制定产品规划与开发分工</li>
			<li><strong>QQ企业邮箱</strong>：成员参与讨论与制定规划</li>
			<li><strong>微信/QQ</strong>：推送订阅信息到指定成员</li>
			<li><strong>Github</strong>：开发所需功能、缺陷跟踪</li>
			<li><strong>生产环境服务器</strong>：自动部署上线</li>
		</ol>
	</div>
	<div style="float:right;text-align:left">
	<?php echo image('workflow.png');?>
	</div>
</section>

<section class="slide" id="why-git">
	<h2>Why Git?</h2>
	<blockquote cite="http://example.org">
		<p>Git &ndash; the stupid <strong style="color:#c60">content</strong> tracker</p>
		<p><cite>Git Manual</cite></p>
	</blockquote>
	<p>相较集中式版本控制工具 CVS / SVN 等，Git 的特点主要包括：</p>
	<ol>
		<li><strong>分支（Branching）成本较低。</strong></li>
		<li><strong>合并（Merging）操作简单直观。</strong></li>
		<li>分布式离线操作。</li>
	</ol>
</section>

<section class="slide" id="centr-decentr">
	<h2>Why Git?</h2>
	<?php echo image('centr-decentr.png');?>
	<p style="text-align: center;font-size:.5em;color:#999">Photo credit to <a href="http://nvie.com/">nvie.com</a>.</p>
</section>

<section class="slide" id="git-flow">
	<h2>Git-Flow：一个 Git 分支模型</h2>
	<?php echo image('git-flow.png');?>
	<p style="text-align: center;font-size:.5em;color:#999">Photo credit to <a href="http://nvie.com/">nvie.com</a>.</p>
</section>

<section class="slide" id="auto-deploy">
	<h2>简单部署模型：架构</h2>
	<?php echo image('auto-deploy.png');?>
	<p style="text-align: center;font-size:.5em;color:#999">Photo credit to <a href="https://github.com/logsol/Github-Auto-Deploy">https://github.com/logsol/Github-Auto-Deploy</a>.</p>
	<p>开发人员将代码 push 到 Github 远程服务器（Remotes/Origin）时：</p>
	<ol>
		<li>触发 Git Post-Receive Hook（Git Origin 接收并处理完当前 Push 请求后均执行此钩子）。</li> 
		<li>Github 将当前 push 信息以 HTTP POST 方式调用给事先定义好的 WebHook Url(s)。</li>
		<li>WebHook Url(s) 对应一个或多个专门用于处理产品部署逻辑的 HTTP 服务。</li>
		<li>HTTP 服务接收 POST 数据、执行部署逻辑（如压缩合并文件和重置缓存等）、完成部署。</li>
	</ol>
</section>

<section class="slide" id="deploy-service-config">
	<h2>简单部署模型：HTTP 服务配置</h2>
	<p>HTTP 部署服务需以 Daemon 形式长期驻留系统，推荐使用 Python/Node.js 编写。</p>
<pre style='color:#000000;background:#ffffff;'><span style='color:#800080; '>{</span>
    <span style='color:#800000; '>"</span><span style='color:#0000e6; '>port</span><span style='color:#800000; '>"</span><span style='color:#800080; '>:</span> <span style='color:#008c00; '>8001</span><span style='color:#808030; '>,</span> 
    <span style='color:#800000; '>"</span><span style='color:#0000e6; '>repositories</span><span style='color:#800000; '>"</span><span style='color:#800080; '>:</span> 
    <span style='color:#808030; '>[</span><span style='color:#800080; '>{</span>
        <span style='color:#800000; '>"</span><span style='color:#0000e6; '>url</span><span style='color:#800000; '>"</span><span style='color:#800080; '>:</span> <span style='color:#800000; '>"</span><span style='color:#0000e6; '>https://github.com/cnsaturn/iTalk</span><span style='color:#800000; '>"</span><span style='color:#808030; '>,</span> 
        <span style='color:#800000; '>"</span><span style='color:#0000e6; '>path</span><span style='color:#800000; '>"</span><span style='color:#800080; '>:</span> <span style='color:#800000; '>"</span><span style='color:#0000e6; '>/your/local/path/on/target/server/here</span><span style='color:#800000; '>"</span><span style='color:#808030; '>,</span> 
        <span style='color:#800000; '>"</span><span style='color:#0000e6; '>deploy</span><span style='color:#800000; '>"</span><span style='color:#800080; '>:</span> <span style='color:#800000; '>"</span><span style='color:#0000e6; '>make deploy</span><span style='color:#800000; '>"</span> <span style='color:#696969; '>// 自定义 makefile</span>
    <span style='color:#800080; '>}</span><span style='color:#808030; '>]</span>
<span style='color:#800080; '>}</span>
</pre>
</section>

<section class="slide" id="deploy-service">
	<h2>简单部署模型：HTTP 服务</h2>
	<p>采用 Python 编写、用于解析 Post-Receive Hook POST 请求的 HTTP 示例服务核心逻辑：</p>
<pre style='color:#000000;background:#ffffff;'><span style='color:#800000; font-weight:bold; '>def</span> pull<span style='color:#808030; '>(</span>self<span style='color:#808030; '>,</span> path<span style='color:#808030; '>)</span><span style='color:#808030; '>:</span>
    <span style='color:#800000; font-weight:bold; '>if</span><span style='color:#808030; '>(</span><span style='color:#800000; font-weight:bold; '>not</span> self<span style='color:#808030; '>.</span>quiet<span style='color:#808030; '>)</span><span style='color:#808030; '>:</span>
        <span style='color:#800000; font-weight:bold; '>print</span> <span style='color:#0000e6; '>"\nPost push request received"</span>
        <span style='color:#800000; font-weight:bold; '>print</span> <span style='color:#0000e6; '>'Updating '</span> <span style='color:#808030; '>+</span> path
    call<span style='color:#808030; '>(</span><span style='color:#808030; '>[</span><span style='color:#0000e6; '>'cd "'</span> <span style='color:#808030; '>+</span> path <span style='color:#808030; '>+</span> <span style='color:#0000e6; '>'" &amp;&amp; git pull'</span><span style='color:#808030; '>]</span><span style='color:#808030; '>,</span> shell<span style='color:#808030; '>=</span><span style='color:#e34adc; '>True</span><span style='color:#808030; '>)</span>

<span style='color:#800000; font-weight:bold; '>def</span> deploy<span style='color:#808030; '>(</span>self<span style='color:#808030; '>,</span> path<span style='color:#808030; '>)</span><span style='color:#808030; '>:</span>
    config <span style='color:#808030; '>=</span> self<span style='color:#808030; '>.</span>getConfig<span style='color:#808030; '>(</span><span style='color:#808030; '>)</span>
    <span style='color:#800000; font-weight:bold; '>for</span> repository <span style='color:#800000; font-weight:bold; '>in</span> config<span style='color:#808030; '>[</span><span style='color:#0000e6; '>'repositories'</span><span style='color:#808030; '>]</span><span style='color:#808030; '>:</span>
        <span style='color:#800000; font-weight:bold; '>if</span><span style='color:#808030; '>(</span>repository<span style='color:#808030; '>[</span><span style='color:#0000e6; '>'path'</span><span style='color:#808030; '>]</span> <span style='color:#808030; '>=</span><span style='color:#808030; '>=</span> path<span style='color:#808030; '>)</span><span style='color:#808030; '>:</span>
            <span style='color:#800000; font-weight:bold; '>if</span> <span style='color:#0000e6; '>'deploy'</span> <span style='color:#800000; font-weight:bold; '>in</span> repository<span style='color:#808030; '>:</span>
                 <span style='color:#800000; font-weight:bold; '>if</span><span style='color:#808030; '>(</span><span style='color:#800000; font-weight:bold; '>not</span> self<span style='color:#808030; '>.</span>quiet<span style='color:#808030; '>)</span><span style='color:#808030; '>:</span>
                     <span style='color:#800000; font-weight:bold; '>print</span> <span style='color:#0000e6; '>'Executing deploy command'</span>
                 call<span style='color:#808030; '>(</span><span style='color:#808030; '>[</span><span style='color:#0000e6; '>'cd "'</span> <span style='color:#808030; '>+</span> path <span style='color:#808030; '>+</span> <span style='color:#0000e6; '>'" &amp;&amp; '</span> <span style='color:#808030; '>+</span> repository<span style='color:#808030; '>[</span><span style='color:#0000e6; '>'deploy'</span><span style='color:#808030; '>]</span><span style='color:#808030; '>]</span><span style='color:#808030; '>,</span> shell<span style='color:#808030; '>=</span><span style='color:#e34adc; '>True</span><span style='color:#808030; '>)</span>
            <span style='color:#800000; font-weight:bold; '>break</span>
</pre>
</section>

<section class="slide" id="deploy-logic">
	<h2>简单部署模型：部署逻辑(1)</h2>
	<p>程序部署除代码直接更新外，通常我们还需要处理如下问题：</p>
	<ol>
		<li>
			<h3>前端代码优化</h3>
			<p>如压缩合并 JavaScript/CSS 文件、压缩和优化图片、CDN 文件同步。</p>
		</li>
		<li>
			<h3>更新程序运行环境变量</h3>
			<p>如 CI 入口文件 index.php 中的 ENVIRONMENT 常量。</p>
		</li>
		<li>
			<h3>数据库结构变更</h3>
		</li>
		<li>
			<h3>重置/预加载系统缓存等其他部署逻辑。</h3>
		</li>
	</ol>
</section>

<section class="slide" id="deploy-logic-2">
	<h2>简单部署模型：部署逻辑(2)</h2>
	<p>为了解决此问题，通常会使用 Make / Ant / Maven 等 Build 工具来实现自动化操作：</p>
	<ol>
		<li>
			前端文件的处理使用比如 uglifyjs（npm包）、jshint（npm包）、yuicompressor（jar包）来实现。
		</li>
		<li>
			环境变量的替换可以事先制作成模板，然后按需替换。
		</li>
		<li>
			数据库结构变更在 CI 中可使用 DB Migration 库轻松实现。
		</li>
	</ol>
	<?php echo image('db-migration.png');?>
</section>

<section class="slide" id="the-end-slide">
	<h1>感谢大家！</h1>
	<h2>Q &amp; A</h2>
	<p>
		<a href="https://github.com/cnsaturn/iTalk"><i class="icon-github"></i> Slides and Source on Github</a> &nbsp;
		<a href="mailto:saturn#codeigniter.org.cn"><i class="icon-envelope"></i> Me</a> &nbsp;
		<a href="http://codeigniter.org.cn/forums/thread-14689-1-1.html"><i class="icon-time"></i> 2012/11/18</a> &nbsp;
		<a href="http://ku6.com"><i class="icon-globe"></i> ku6.com, Beijing</a> &nbsp;
	</p>
</section>

<!-- deck.navigation snippet -->
<a href="#" class="deck-prev-link" title="Previous">&#8592;</a>
<a href="#" class="deck-next-link" title="Next">&#8594;</a>

<!-- deck.status snippet -->
<p class="deck-status">
	<span class="deck-status-current"></span>
	/
	<span class="deck-status-total"></span>
</p>

<!-- deck.goto snippet -->
<form action="." method="get" class="goto-form">
	<label for="goto-slide">Go to slide:</label>
	<input type="text" name="slidenum" id="goto-slide" list="goto-datalist">
	<datalist id="goto-datalist"></datalist>
	<input type="submit" value="Go">
</form>

<!-- deck.hash snippet -->
<a href="." title="Permalink to this slide" class="deck-permalink">#</a>

<?php if(ENVIRONMENT == 'development'):?>
<script src="<?php echo base_url('assets/lib/jquery.js');?>"></script>
<!-- Deck Core and extensions -->
<script src="lib/core/deck.core.js"></script>
<script src="lib/extensions/hash/deck.hash.js"></script>
<script src="lib/extensions/menu/deck.menu.js"></script>
<script src="lib/extensions/goto/deck.goto.js"></script>
<script src="lib/extensions/status/deck.status.js"></script>
<script src="lib/extensions/navigation/deck.navigation.js"></script>
<script src="lib/extensions/scale/deck.scale.js"></script>
<?php else:?>
<!-- Deck Core and extensions -->
<?php echo js('jquery.min.js');?>
<?php echo js('italk.min.js');?>
<?php endif;?>

<!-- Initialize the deck -->
<script>
$(function() {
	$.deck('.slide');
});
</script>

</body>
</html>