      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Chat box</a>
        <iframe src="https://titanembeds.com/embed/265678603507859458" height="94%" width="500" frameborder="0"></iframe>
      </div>
      <span class="open" onclick="openNav()"><img class="chat_bubble" src="https://i.imgur.com/EivPRTh.png" alt=""></span>
      <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "500px";
        }
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
      </script>

      <footer>
        <p>
          <a href="<?php home_url ?>"><?php bloginfo('title'); ?></a> © <?php echo date("Y"); ?> Designed by <a href="https://twitter.com/maiphamquanghuy">ImHikaruCat</a> • Powered by <a href="https://wordpress.org/">Wordpress</a>
        </p>
      </footer>
    <?php wp_footer(); ?>
    </div>
</body>
</html>
