                <div class="list">

                    <ul class="menu-root">
                        <li><h3>教程 Husky - 0.9</h3></li>
                        <li><a href="#简介" class="sidebar-link current">简介</a></li>
                        <li><a href="#使用" class="sidebar-link ">使用</a></li>
                    </ul>
                </div>
            </div>


            <div class="content guide with-sidebar index-guide">

                <h1 id="简介">简介</h1>

                <h2 id="Husky"><a href="#Husky" class="headerlink" title="#Husky"></a>Husky 是什么</h2>

                <p>Husky 是一套简易的Web php MVC 框架，适用于开发中小型网站使用。目前框架处于第一个版本(Husky-0.9)，框架将会长期维护更新。目前只在Linux开发环境下测试可用，理论上windows平台也可使用。</p>

                <p>如果你是一个初出茅庐的Web开发者，那么本框架就十分适合你来使用了。相比较很多成熟的PHP框架来说，Husky的体积小，逻辑简单，还没有加入很多集成的自动化功能。整个框架按照一个既定的数据格式实现了MVC开发的需求，更主要的是，在一定程度上说，这个框架还处于比较原始的状态， 这对新手深入了解框架的体系结构十分有利，你可以按照自己的想法对框架进行修改，甚至可能在此基础上改写出更出色的框架。</p>

                <p>本框架的开发初衷是为作者所在的学生社团开发网站，多人合作模式下编写网站没有一个框架实在太乱了。但是衡量工作内容，于是决定自己开发一个微框架来辅助网站的开发，就有了这个项目。</p>

                <a href="#声明" data-scroll=""><h2 id="声明"><a href="#声明"></a>声明</h2></a>
                <p>Husky来源于Github上的一个<a href="https://github.com/yeszao/fastphp">教程项目</a>，原作者通过该项目讲解了如何实现MVC架构。Husky作者: 白岩(Paladnix) 在此基础上修改出了第一版的Husky代码。</p>
                <!--
                    <ol>
                    <li>改写了Model部分的类间关系</li>
                    <li>确定使用PDO进行数据库操作</li>
                    <li>整理了Cotroller部分的方法</li>
                    <li>扩展了View部分的功能</li>
                    <li>确定整个项目的数据流形式</li>
                    <li>编写了本教程，并发布可用版本</li>
                    </ol>
                -->            
                <h2 id="prepare"><a href="#prepare" class="headerlink" title="prepare"></a> 你需要掌握什么？</h2>
    <p> 此框架需要一定的php网站开发经验才能熟练的使用。所以在使用之前，你需要具备以下的知识或能力:</p>
<ul>
    <li><p> 配置<code>apache2</code> 的Rewrite功能</p></li>
    <li><p> 数据库SQL语句</p></li>
    <li><p> php基本语法</p></li>
    <li><p> 面向对象编程的基本知识</p></li>
    <li><p> 简要了解http协议与请求url链接</p></li>
    <li><p> 清楚的了解软件 MVC 架构的组成</p></li>
</ul>

    <p> 在进一步开发框架之前，你需要进一步具备以下的知识或能力:</p>
<ul>
    <li><p><code>apache2</code> 的更多配置选项 </p></li>
    <li><p> 熟练掌握http协议 </p></li>
    <li><p> 深入理解 MVC 框架结构 </p></li>
    <li><p> 熟练使用php语言进行面向对象编程 </p></li>
    <li><p> 熟练使用PDO数据库操作库 </p></li>
    <li><p> 良好的编程习惯 </p></li>
</ul>




              <h2 id="起步"><a href="#起步" class="headerlink" title="起步"></a>Husky 做了什么？</h2>

                <!--
                    <p class="tip">官方指南假设你已有 HTML、CSS 和 JavaScript 中级前端知识。如果你刚开始学习前端开发，将框架作为你的第一步可能不是最好的主意——掌握好基础知识再来！之前有其他框架的使用经验对于学习 Vue.js 是有帮助的，但这不是必需的。</p>
                -->

                <p>Husky 实现了下面几个功能：</p>
                <ol>
                    <li><p>唯一的网站入口，url地址重定向</p></li>
                    <li><p>自动化加载MVC控制类，自动化解决类间依赖</p></li>
                    <li><p>过滤SQL注入攻击的安全问题</p></li>
                    <li><p>Controller、Model、View模块分离</p></li>
                    <li><p>格式化数据流</p></li>
                </ol>


<br>
<br>
<br>
                <h1 id="使用">使用</h1>

                <h2 id="环境"><a href="#环境" class="headerlink" title="环境"></a>环境</h2>

                <p>本框架需要</p>
                <ul>
                    <li>apache2</li>
                    <li>php(&gt;=5.4)</li>
                    <li>Mysql</li>
                </ul>
                <p>等的基础支持，且开启apache2 的Rewrite模块功能。这一部分可以参见我的<a href="/">博客</a>。</p>
                <p>准备好环境以后，下载该项目的代码包到你本地的文件夹 eg: <code>project/</code> 中。注意请将代码包中所有的文件放置在 <code>project/</code> 文件夹下，并检查隐藏文件<code>.htaccess</code>是否存在，如不存在请到Github上下载下来并放置在<code> project/ </code>目录下。</p>

                <p> 此时项目中默认会存在一个本教程的某个版本，直接在浏览器的地址栏输入:<code>localhost/project/</code>(如果你的<code>project/</code>文件夹不在<code>localhost</code>的目录下请移至<code>localhost/</code>)。此时如果你看到了本教程的某个版本的网页，则除数据库部分的环境配置成功，否则请检查软件是否安装，<code>apache2</code>的<code>Rewrite</code>功能是否已经打开。</p>


                <h2 id="目录"><a href="#目录" class="headerlink" title="目录"></a>目录结构说明</h2>

                <p>下面文中使用根目录来指代<code>localhost/project/</code>，未作额外说明的文档或文件夹均在根目录下。</p> 
                <p>整个项目的文件结构如下：</p>
<pre class="prettyprint linenums">

project/
    \__ application/
            \__ controllers/
            \__ models/
            \__ views/
    \__ config/
            \__ config.php
    \__ PHP_MVC/
            \__ phpmvc.php
            \__ Core.class.php
            \__ Model.class.php
            \__ Sql.class.php
            \__ View.class.php
            \__ Controller.class.php
            \__ Model.class.php
    \__ runtime/
    \__ sql/
    \__ css/
    \__ js/
    \__ fonts/
    \__ images/
    \__ index.php
    \__ .htaccess

</pre>

<ul>
    <li><p><code>application/</code>文件夹内放置的就是整个网站即将开发的MVC部分的代码，基本上整个网站代码都会在这里。</p></li>
    <li><p><code>config/</code>放置整个网站的配置信息，包括数据库的密码、用户名等。</p></li>
    <li><p><code>PHP_MVC</code>是整个框架的核心代码，也包含了框架的基类，其余的代码都继承自这里的基类。</p></li>
    <li><p><code>runtime/</code>存放网站运行过程中的log日志文件和错误记录。</p></li>
    <li><p><code>sql/</code>做为开发过程中存放网站的数据库文件。</p></li>
    <li><p><code>index.php</code>是整个网站的唯一入口，已经重定向过来，在其中有两个宏定义：<code>APP_DEBUG</code>和<code>APP_DEBUG_FRA</code>分别用于网站开发时错误检测和框架开发时的错误检测。网站发布时需要将两个宏全部关闭。</p></li>
    <li><p><code>.htaccess</code>是网站url重定向文件</p></li>
</ul>


            <h2 id="风格"><a href="#风格" class="headerlink" title="风格"></a>代码风格</h2>

<p> 框架的整体采用Java代码风格，命名规则上也大部分借鉴Java命名规则。</p>
<ul>
    <li><p>MySQL表名， 小驼峰命名法 testTable </p></li>
    <li><p>类名(Class)， 大驼峰命名法：Sql</p></li>
    <li><p>方法名(Actions)， 小驼峰命名法：index, indexPost</p></li>
    <li><p>模块名(Models)， 大驼峰命名法， 后缀Model： TestModel</p></li>
    <li><p>控制器(Controllers)， 大驼峰命名法，后缀Controller： TestController</p></li>
    <li><p>视图(Views)， 控制器名/行为名： Test/view.php</p></li>
</ul>


                <h2 id="Controller"><a href="#Controller" class="headerlink" title="Controller"></a>编写TestController类</h2>
<p>对于每个页面，编写一个对应的Controller类来处理页面中的交互事物。下面直接给出示例代码，详细说明在代码中注释出。</p>

<pre class="prettyprint linenums">

/*
 *   php 代码： /application/controllers/TestController.class.php
 *   
 *
 */

class TestController extends Controller{

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * * * * * 当 url 为：localhost/project/test/ 时调用该函数 * * *
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     *  index 可以做为默认打开页面时的处理函数，
     *  不写则默认调用父类的index函数，直接渲染页面。
     *  该函数接受一个字符串参数$param, 该字符串是url中的参数，以'/'分隔；
     *  每组参数使用 'name=value' 的形式存储。
     *  assign() 函数可以将键值对存储进视图模块中，交由视图模块进一步处理。
     *  render() 函数渲染视图，调用视图模块的函数进行渲染。
     */

    public function index( $params ){

        $content = (new TestModel)->selectAll();

        $this->assign('title', '全部条目');

        $this->assign('content', $content);

        $this->_view->render();
    }



    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * * * 当 url 为：localhost/project/test/add/ 时调用该函数 * *
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
     *   同样也可以带参数
     */

    public function add(){

        $data['name'] = $_POST['value'];

        $count = (new TestModel)->add($data);

        $this->assign('title', '添加成功');
        $this->assign('count', $count);
        $this->_view->render();
    }

}

</pre>

<p> 在Controller类中分别使用到了Model类和View类，所以需要再编写另外两个类。</p>




                <h2 id="Model"><a href="#Model" class="headerlink" title="Model"></a>编写 TestModel 类</h2>
<p>对于页面上不同的数据交互的需要，编写对应的Model类来处理不同的数据需求。每个函数负责一种数据库的交互操作，下面直接给出示例代码，详细说明在代码中注释出。</p>

<pre class="prettyprint linenums">

/*
 *  php 代码： /application/models/TestModel.class.php
 */

class TestModel extends Model{

     /*  例如需要将数据库中所有的记录都提取出来并返回一个二维数组记录所有的数据 
      *
      */  

    public function selectAll(){

        $sql = sprintf("select * from `%s` ", $this->_table);

        $sth = $this->_dbHandle->prepare($sql);

        if ( $sth->execute() )

            return $sth->fetchAll();

        return 0;
    }


    /*  如果要插入记录到数据库中，则将键值对存在 $data 中 
     *  query函数将返回受影响的行数
     */

    public function insert( $data ){

        $sql = sprintf( "insert into `%s` %s", $this->_table, $this->formatInsert($data) );

        return $this->query($sql);
    }

}

</pre>


                <h2 id="View"><a href="#View" class="headerlink" title="View"></a>编写 TestView 类</h2>

<p> View 类默认只会加载对应 <code>/application/views/Test/</code>文件夹下的<code>head.php</code> 和 <code>footer.php</code> </p>

<pre class="prettyprint linenums">

    /* php 代码： /application/views/TestView.class.php
     */
class TestView extends View{

    /*
     *   对于不同的函数可以编写不同的前端组件，重写render函数按需加载组件
     *
     */ 

    public function render(){


        // 将数组中的键值对的键转换成同名的变量
        //extract($this->variables);

        $vars = $this->variables;

        $controllerHeader = APP_PATH.'application/views/'.$this->_controller.'/header.php';
        $controllerFooter = APP_PATH.'application/views/'.$this->_controller.'/footer.php';
        $controllerLayout = APP_PATH.'application/views/'.$this->_controller.'/'.$this->_action.'.php';

        // Header
        if(file_exists ($controllerHeader)){

            include($controllerHeader);
        }
        else{

            include($this->defaultHeader);
        }

        // Body
        $this->includePage($controllerLayout);


        // Footer       
        if(file_exists($controllerFooter)){

            include($controllerFooter);
        }
        else {

            include($this->defaultFooter);
        }

}
</pre>
<p> 可以看出来我们真正的前端页面要写在 <code>/application/views/Test/</code> 文件夹下。可以分开组件来写，然后根据需求加载不同的组件。</p>


               <h2 id="Tip"><a href="#Tip" class="headerlink" title="Tip"></a> 注意 </h2>

                <p class="tip"> 各个部分的名字一定要严格按照上述实例以及命名规则执行，否则将会无法自动加载依赖关系，造成代码出错。
                </p><ul>
                    <li> 数据库表名与controller名称一致，且小驼峰命名法。</li>
                    <li> 数据库信息要更新到 <code>config.php</code> 中去。</li>
                    <li> 页面中的链接使用<code>APP_URL/css</code> 的方式作为绝对路径，修改<code>index.php</code> 中的<code>APP_URL</code>宏</li>
                </ul>
                <p></p>


          <h2 id="More"><a href="#More" class="headerlink" title="More"></a> More </h2>

                <p>以上是关于Husky框架的简要使用说明，更多更详细的内容还有待补充。</p>
                <p> 项目地址：<code>https://github.com/Paladnix/Husky</code></p>


                <h2 id="future"><a href="#future" class="headerlink" title="future"></a> 1.0 版本</h2>
<p>Husky版本还在继续开发中，但是由于作者本人水平有限，在不断的学习和摸索中进行进一步开发。</p>
                <p>在下一版本中将尝试开发：</p>
<ul>
<li><p> 更通用的数据库接口 </p></li>
<li><p> 网站运行日志 </p></li>
<li><p> 常用功能集成 </p></li>
<li><p> 框架速度评测 </p></li>
</ul>


<br>
<br>
<br>
<br>
<br>
<br>

<hr>
    <blockquote>
        <p style="">Husky -- A Light PHP Web MVC Framework.</p>
    </blockquote>
<hr>



<!-- guide links -->
<!--                <div class="guide-links">
                    <span>← <a href="installation.html">安装</a></span>
                    <span style="float:right"><a href="instance.html">Vue 实例</a> →</span>
                </div>
-->

<!-- Footer -->
                <div class="footer"> 
                    <a href="https://github.com/Paladnix/Husky" target="_blank">Project On The GitHub. </a>
                </div>
            </div>
        </div>







