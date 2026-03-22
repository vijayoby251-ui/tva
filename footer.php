<footer>
    <!-- Keep your existing footer content -->
</footer>

<button id="topBtn">↑</button>

<style>
#topBtn {
  display:none;
  position:fixed;
  bottom:30px;
  right:30px;
  z-index:999;
  background:#000;
  color:#fff;
  border:none;
  padding:12px;
  border-radius:50%;
  cursor:pointer;
}
</style>

<script>
let topBtn=document.getElementById("topBtn");
window.onscroll=function(){
  if(document.documentElement.scrollTop>200){
    topBtn.style.display="block";
  } else {
    topBtn.style.display="none";
  }
};
topBtn.onclick=function(){
  window.scrollTo({top:0,behavior:"smooth"});
};
</script>
</body>
</html>
