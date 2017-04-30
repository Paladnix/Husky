

<script type="text/javascript" src="<?php echo APP_URL ?>/css/jquery-3.2.1.min.js"></script>

<script src="<?php echo APP_URL ?>/css/smooth-scroll.min.js"></script>

        <script src="<?php echo APP_URL ?>/css/vue.js"></script>

        <!-- main custom script for sidebars, version selects etc. -->
<script src="<?php echo APP_URL ?>/css/common.js"></script>

        <!-- search -->
        <link href="https://cdn.bootcss.com/docsearch.js/1.4.4/docsearch.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo APP_URL ?>/css/search.css">
        <script src="https://cdn.bootcss.com/docsearch.js/1.4.4/docsearch.min.js"></script>
        <script>
[
    '#search-query-nav',
    '#search-query-sidebar'
].forEach(function (selector) {
    if (!document.querySelector(selector)) return
    // search index defaults to v2
    var match = window.location.pathname.match(/^\/(v\d+)/)
    var version = match ? match[1] : 'v2'
    docsearch({
        appId: 'BH4D9OD16A',
        apiKey: '5638280abff9d207417bb03be05f0b25',
        indexName: 'vuejs_cn2',
        inputSelector: selector,
        algoliaOptions: { facetFilters: ["version:" + version] }
    })
})
        </script>

        <!-- fastclick -->
        <script src="https://cdn.bootcss.com/fastclick/1.0.6/fastclick.min.js"></script>
        <script>
document.addEventListener('DOMContentLoaded', function() {
    FastClick.attach(document.body)
}, false)
        </script>



<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo APP_URL ?>/css/google-code-prettify/prettify.js"></script>

</body>
</html>
