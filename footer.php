<footer>
    <!-- Keep your existing footer HTML here exactly as it was -->
</footer>

<button id="scrollTopBtn" aria-label="Scroll to top" title="Go to top">↑</button>

<style>
#scrollTopBtn{
    position:fixed;
    right:20px;
    bottom:20px;
    width:44px;
    height:44px;
    border:none;
    border-radius:50%;
    background:#111;
    color:#fff;
    font-size:20px;
    line-height:44px;
    text-align:center;
    cursor:pointer;
    z-index:9999;
    display:none;
    box-shadow:0 4px 12px rgba(0,0,0,0.2);
}
#scrollTopBtn:hover{
    opacity:.9;
}
</style>

<script>
(function () {
    const btn = document.getElementById('scrollTopBtn');
    if (!btn) return;

    window.addEventListener('scroll', function () {
        if (window.scrollY > 250) {
            btn.style.display = 'block';
        } else {
            btn.style.display = 'none';
        }
    });

    btn.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
})();
</script>

<script src="jquery-3.7.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<script src="jquery.slicknav.js"></script>
<script src="jquery.magnific-popup.min.js"></script>
<script src="jquery.counterup.min.js"></script>
<script src="jquery.waypoints.min.js"></script>
<script src="parallaxie.js"></script>
<script src="gsap.min.js"></script>
<script src="ScrollTrigger.min.js"></script>
<script src="SplitText.js"></script>
<script src="SmoothScroll.js"></script>
<script src="function.js"></script>
</body>
</html>
