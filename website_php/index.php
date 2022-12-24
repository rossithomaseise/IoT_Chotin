<!-- php -S localhost:8080 -->
<!-- http://localhost:8080/info.php -->
<!-- https://mdbootstrap.com/docs/b4/jquery/utilities/embeds/ -->
<!-- https://startbootstrap.com/previews/freelancer -->
<!DOCTYPE html>

<html lang="en">

<head>
  <title>Logement Eco-Responsable</title>
  <?php include('includes/header.php'); ?>
</head>

<body class="fixed-sn mdb-skin-custom">
  
  <?php include('includes/navigation.php'); ?>

<main class="">

  <?php include('includes/main_style.php'); ?>  

<hr class="mt-4 mb-5">

<!--Section: youTube-->
<section id="youTube">
  <!--Title-->
  <h2 class="section-heading mb-4">
    YouTube IFrame
  </h2>
  <p>Use the code below to embed the Youtube video i HTML document.</p>
  <!--Grid row-->
  <div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
      <!--Section: Live preview-->
      <section>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v64KOxKVLVg" allowfullscreen></iframe>
        </div>
      </section>
      <!--Section: Live preview-->
      <section class="mobile-hidden">
      </section>
      <!--Section: Code-->
      <section class="collapse" id="example3">
        <section class="pb-4">
          <div class="docs-pills border mobile-hidden">
            <div class="d-flex justify-content-between">
              <ul class="nav md-pills pills-grey">
                  <li class="nav-item"><a class="nav-link  active show " data-toggle="tab" href="#mdb_aa039179dc8e6b362c2b2c7c3bc3471023672020" role="tab">HTML</a></li>
              </ul>
            </div>
            <div class="tab-content">
              <div class="tab-pane fade  active show " id="mdb_aa039179dc8e6b362c2b2c7c3bc3471023672020" role="tabpanel">
                  <pre class="grey lighten-3 mb-0 line-numbers language-html">
                      <code>
                          &lt;div class=&#34;embed-responsive embed-responsive-16by9&#34;&gt;
                            &lt;iframe class=&#34;embed-responsive-item&#34; src=&#34;https://www.youtube.com/embed/v64KOxKVLVg&#34; allowfullscreen&gt;&lt;/iframe&gt;
                          &lt;/div&gt;
                      </code>
                  </pre>
              </div>
            </div>
          </div>
        </section>
      </section>
      <!--Section: Code-->
    </div>
    <!--Grid column-->
  </div>
  <!--Grid row-->
</section>
<!--/Section: youTube-->

</main>

<?php include('includes/footer_style.php'); ?>

</body>

</html>
