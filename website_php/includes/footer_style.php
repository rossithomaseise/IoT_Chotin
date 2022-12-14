<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    ?? 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

<style>

  main input[type=email]:focus,
  main input[type=password]:focus,
  main input[type=text]:focus,
  main input[type=url]:focus,
  main textarea:focus {
    border: 0;
  }

  .embed-responsive-16by9-fix-contact-form::before {
    height: 450px;
  }

  @media (min-width:580px) {

    .modal-contact-form-fix,
    .modal-contact-form-fix * {

      box-sizing: content-box !important;
    }

  }

  @media (min-width: 1400px) {
    #modalPricing .modal-dialog {

      max-width: 80vw;
    }
  }

</style>

<div class="modal fade" id="contactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="text-center font-weight-bold mb-5">
          <p><a href="https://mdbootstrap.com/support/"></a></p>
          <p><a href="https://mdbootstrap.com/general/license/"></a></p>
        </div>


        <form id="contact-form" name="contact-form"
          action="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/contact-form-setup.php"
          method="POST" onsubmit="return validateForm()">
          <div class="md-form mb-5">
            <i class="fas fa-user prefix grey-text"></i>
            <input type="text" id="name" name="name" class="form-control validate">
            <label data-error="wrong" data-success="right" for="name"></label>
          </div>

          <div class="md-form mb-5">
            <i class="fas fa-envelope prefix grey-text"></i>
            <input type="email" id="email" name="email" class="form-control validate">
            <label data-error="wrong" data-success="right" for="email"></label>
          </div>

          <div class="md-form mb-5">
            <i class="fas fa-tag prefix grey-text"></i>
            <input type="text" id="subject" name="subject" class="form-control validate">
            <label data-error="wrong" data-success="right" for="subject"></label>
          </div>

          <div class="md-form">
            <i class="fas fa-pencil prefix grey-text"></i>
            <textarea type="text" id="message" name="message" class="md-textarea form-control" rows="4"></textarea>
            <label data-error="wrong" data-success="right" for="message"></label>
          </div>
        </form>
      </div>
      <p class="text-center" id="status"></p>
      <div class="modal-footer d-flex justify-content-center">

      <button class="btn btn-info"  onclick="validateForm()"><i
            class="fas fa-paper-plane-o ml-1"></i></button>

      </div>
    </div>
  </div>
</div>

<span id="dpl-mdb5-cookies-modal"></span>
<span id="dpl-newmdb-docs-snippets-modal"></span>
<span id="dpl-newmdb-alert-technology-change"></span>

<div id="dom-target-fb" style="display: none;">
</div>
<div id="dom-target-tw" style="display: none;">
</div>
<div id="dom-target-gp" style="display: none;">
</div>


<div
    class="modal fade"
    id="apiRestrictedModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                
                <section>
                    <div class="text-center">
                        <h3 class="font-weight-bold border border-primary p-3 mb-3">Access restricted</h3>

                        <h5><strong>To view this section you must have an active PRO account</strong></h5>

                        <p>
                            <strong>Log in</strong> to your account or
                            <strong>purchase an MDB5 PRO subscription</strong> if you don't have one.
                        </p>

                        <a class="btn btn-primary me-1 auth-modal-toggle" data-auth-modal-tab="sign-in" data-dismiss="modal">Login</a>
                        <a
                          class="btn btn-secondary"
                          target="_blank"
                          
                            href = "https://mdbootstrap.com/docs/standard/pro/"
                          
                          role="button"
                        >Buy MDB Pro</a>
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
  const CONFIG = {
    docsApiUrl: "https://mdbootstrap.com/api/docs"
  };

  const supportedLanguages = {
    en: {
      flag: 'united kingdom',
      name: 'English'
    },
    cn: {
      flag: 'china',
      name: '??????'
    }
  };

  function getSiteLanguage() {
    const [, language ] = location.pathname.split('/');
    switch (language) {
      case 'cn': return 'cn';
      case 'es': return 'cn';
      default: return 'en';
    }
  }

  function getCurrentTechnology(url) {
    const currentUrl = url || location.pathname;
    switch (true) {
      case (currentUrl.indexOf('/docs/standard') === 0): return 'standard';
      case (currentUrl.indexOf('/docs/angular') === 0): return 'b5-angular';
      case (currentUrl.indexOf('/docs/b5/angular') === 0): return 'b5-angular';
      case (currentUrl.indexOf('/docs/react') === 0): return 'b5-react';
      case (currentUrl.indexOf('/docs/b5/react') === 0): return 'b5-react';
      case (currentUrl.indexOf('/docs/b5/vue') === 0): return 'b5-vue';
      case (currentUrl.indexOf('/docs/b4/jquery') === 0): return 'jquery';
      case (currentUrl.indexOf('/docs/b4/angular') === 0): return 'angular';
      case (currentUrl.indexOf('/docs/b4/react') === 0): return 'react';
      case (currentUrl.indexOf('/docs/vue') === 0): return 'b5-vue';
      case (currentUrl.indexOf('/docs/b4/vue') === 0): return 'vue';
    }
  }

  function getCookie(name) {
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookies = decodedCookie.split(';');

    for (let i = 0; i < cookies.length; i++) {
      let cookie = cookies[i];
      while (cookie.charAt(0) === ' ') {
        cookie = cookie.substring(1);
      }
      if (cookie.indexOf(name) === 0) {
        return cookie.substring(name.length, cookie.length);
      }
    }

    return null;
  }
</script>
<script>

</script>

<script type="text/javascript" src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/js/bundles/4.20.0/compiled.min.js"></script>


<script type="text/javascript" src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/js/dist/search-v4/search.min.js"></script>
<script src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/js/dist/main.min.js"></script>


<script>
  (function ($) {
  'use strict';

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });

  
  $(function () {
    $("#mdb-lightbox-ui").load("https:\/\/mdbcdn.b-cdn.net\/wp-content\/themes\/mdbootstrap4\/docs-app/b4/mdb-addons/mdb-lightbox-ui.html");
  });

  $(document).ready(function () {
    $('.mdb-select').materialSelect();
    $("#license").addClass("mdb-select price-select");
    
    $("#license").hide();
    new WOW().init();
    $(".button-collapse").sideNav();
    var el = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(el);
  });


  
  $('body').scrollspy({
    target: '#scrollspy'
  })

  $(function () {
    $(".sticky").sticky({
      topSpacing: 90,
      zIndex: 2,
      stopper: "#footer"
    });
    $('a[href="#docsTabsAPI"]').on('shown.bs.tab', function (e) {
      $(".sticky2").sticky({
        topSpacing: 90,
        zIndex: 2,
        stopper: "#footer"
      });
    });
    $('a[href="#docsTabsExamples"]').on('shown.bs.tab', function (e) {
      $(".sticky3").sticky({
        topSpacing: 90
        , zIndex: 2
        , stopper: "#footer"
      });
    });
  });

  $(function () {
    $(".sticky-long").sticky({
      topSpacing: 90,
      zIndex: 2,
      startScrolling: 'bottom',
      stopper: "#footer"
    });
  });

  $(document).ready(function () {
    var type = window.location.hash.substr(1);
    if (type==="docsTabsAPI") {
      if($("#docsTabsAPI").length) {
        $('[href="#docsTabsAPI"]').tab('show');
      }
      $('html, body').animate({scrollTop:0}, 'slow');
    } else if (type==="docsTabsOverview") {

      $('html, body').animate({scrollTop:0}, 'slow');
    }

    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');

    $('.nav-mtd a').not('#docs-tab-examples').click(function (e) {

      var scrollurl = $('body').scrollTop() || $('html').scrollTop();

      window.location.hash = this.hash;
      $('html, body').scrollTop(scrollurl);
    });
  })

  $(document).ready(function () {
    const searchInput = document.getElementById('mdw_serach');

    const searchDropdown = document.getElementById('mdw_serach_dropdown_wrapper');

    let searchJsonFile = "https://mdbootstrap.com/wp-content/themes/mdbootstrap4/docs-app" + '/js/dist/search-v4/';

    switch ("jquery") {
      case 'angular':
        searchJsonFile += 'search-angular.json'
        break;
      case 'react':
        searchJsonFile += 'search-react.json'
        break;
      case 'vue':
        searchJsonFile += 'search-vue.json'
        break;
      default:
        searchJsonFile += 'search.json'
        break;
    }

    const search = new Search(searchInput, searchDropdown, searchJsonFile);

    search.init();
  })

  $('#contactForm').on('show.bs.modal', function () {
    $('.wpcf7-select').materialSelect('destroy');
    $('.wpcf7-select').materialSelect();
  });

  
  $('#contactForm').on('hide.bs.modal', function () {
    $('.wpcf7-select').materialSelect('destroy');
  });

  $("#dynamicContentWrapper-Homepage").on("click", ".dc-panel-remove", function (e) {
    $("#dynamicContentWrapper-Homepage").remove();
  });

  $("div[class*='woocommerce-MyAccount']").on("click", "#get-invoice-request", function (e) {
    e.preventDefault();

    var self = $(this);

    var desination = $(this).attr("href");

    var orderId = $(this).attr("data-order-id");
    var data = {
      action: "requestInvoice",
      order_id: orderId
    };

    $.ajax({
      url: mdw_search_object.ajaxurl,
      method: "POST",
      data: data
    }).done(function (response) {
      console.log(response);
      response = JSON.parse(response);

      if (response.status == "sent") {
        $("p", self).text(response.message);
      } else {
        window.location.replace(desination);
      }

    }).fail(function (err) {
      console.log(err);
    });
  });

  $("div[class*='woocommerce-MyAccount']").on("click", "table #confirm-invoice", function (e) {
    e.preventDefault();

    var self = $(this);

    self.html("<i class='fa fa-spinner fa-spin'></i> Processing...");

    var orderId = $(this).attr("data-order-id");
    var data = {
      action: "approveInvoiceRequest",
      order_id: orderId
    };

    $.ajax({
      url: mdw_search_object.ajaxurl,
      method: "POST",
      data: data
    }).done(function (response) {
      console.log(response);

      self.html("<i class='fa fa-check'></i> Done").attr("class", "btn btn-success");
    }).fail(function (err) {
      console.log(err);

      try {

        err = JSON.stringify(err);
      } catch (ex) {}

      self.html("<i class='fa fa-times'></i> Error").attr("class", "btn btn-danger");
      self.after("<b>Error:</b> " + err);
    });
  });

  $("#invoice-forms").on("click", function (e) {
    e.preventDefault();

    $("nav[class*='woocommerce-MyAccount'] ul li").each(function () {
      $(this).removeClass("is-active");
    });

    $(this).parent().addClass("is-active");

    $(".woocommerce div[class*='woocommerce-MyAccount']").html("<table></table>");
    var invoiceRequestTable = $(".woocommerce div[class*='woocommerce-MyAccount'] table");

    invoiceRequestTable.attr("class", "shop_table shop_table_responsive");

    var thead = "<thead>" +
      "<tr>" +
      '<th><input placeholder="Order ID" id="toEditOrderIdInput" type="number" value=""></input><a id="confirm-edited-invoice" class="btn btn-primary" href="#">Confirm</a><a id="confirm-new-invoice" class="btn btn-primary" href="#">Blank</a></th>' +
      "</tr>" +
      "</thead>";
    var tbody = "<tbody>";
    tbody += "<tr><td>No new requests.</td><td></td></tr>";
    tbody += "</tbody>";

    invoiceRequestTable.append(thead);
    invoiceRequestTable.append(tbody);

  });

  $("div[class*='woocommerce-MyAccount']").on("click", "table #confirm-edited-invoice", function (e) {
    e.preventDefault();
    var order_id = $('#toEditOrderIdInput').val();
    var data = {
      action: "getInvoiceRequestForm",
      order_id: order_id
    };

    $.ajax({
      url: mdw_search_object.ajaxurl,
      method: "POST",
      data: data
    }).done(function (response) {
      response = JSON.parse(response);
      console.log(response);

      var requests = response.requests;

      var billing_invoice_checkbox = requests.meta_data.filter(function (o) {
        return o.key == '_billing_invoice_checkbox'
      });
      var billing_vat = requests.meta_data.filter(function (o) {
        return o.key == '_billing_vat'
      });
      var invoiceRequestForm = $("table.shop_table.shop_table_responsive tbody");

      var tbody = "<tr><td id='invoiceDataToInsert'><p><label for='invoice_id'>Order ID</label><input value='" + requests.id + "' type='text' name='invoice_id' id='invoice_id' /></p>";
      if (billing_invoice_checkbox[0] !== undefined) {
        tbody += "<p><label for='billing_invoice_checkbox'>billing_invoice_checkbox</label><input value='" + billing_invoice_checkbox[0].value + "' type='text' name='billing_invoice_checkbox' id='billing_invoice_checkbox' /></p>"
      }
      tbody += "<p><label for='payment_method'>payment_method</label><input value='" + requests.payment_method + "' type='text' name='payment_method' id='payment_method' /></p>"

      if (billing_vat[0] !== undefined) {
        tbody += "<p><label for='billing_vat'>billing_vat</label><input value='" + billing_vat[0].value + "' type='text' name='billing_vat' id='billing_vat' /></p>"
      }
      tbody += "<p><label for='billing_company'>billing_company</label><input value='" + requests.billing.company + "' type='text' name='billing_company' id='billing_company' /></p>"
      tbody += "<p><label for='billing_address_1'>billing_address_1</label><input value='" + requests.billing.address_1 + "' type='text' name='billing_address_1' id='billing_address_1' /></p>"
      tbody += "<p><label for='billing_address_2'>billing_address_2</label><input value='" + requests.billing.address_2 + "' type='text' name='billing_address_2' id='billing_address_2' /></p>"
      tbody += "<p><label for='billing_city'>billing_city</label><input value='" + requests.billing.city + "' type='text' name='billing_city' id='billing_city' /></p>"
      tbody += "<p><label for='customer_id'>customer_id</label><input value='" + requests.customer_id + "' type='text' name='customer_id' id='customer_id' /></p>"
      tbody += "<a id='save-edited-invoice' class='btn btn-primary' href='#'>Save</a></td></tr>";

      invoiceRequestForm.empty();
      invoiceRequestForm.append(tbody);
    }).fail(function (err) {
      console.log(err);
    });
  });

  $("div[class*='woocommerce-MyAccount']").on("click", "table #confirm-new-invoice", function (e) {
    e.preventDefault();

    var invoiceRequestForm = $("table.shop_table.shop_table_responsive tbody");

    var tbody = "<tr><td id='invoiceDataToInsert'><p><label for='invoice_id'>Order ID</label><input disabled value='new order' type='text' name='invoice_id' id='invoice_id' /></p>";
    tbody += "<p><label for='billing_invoice_checkbox'>billing_invoice_checkbox</label><input value='' type='text' name='billing_invoice_checkbox' id='billing_invoice_checkbox' /></p>"
    tbody += "<p><label for='payment_method'>payment_method</label><input value='' type='text' name='payment_method' id='payment_method' /></p>"

    tbody += "<p><label for='billing_vat'>billing_vat</label><input value='' type='text' name='billing_vat' id='billing_vat' /></p>"
    tbody += "<p><label for='billing_company'>billing_company</label><input value='' type='text' name='billing_company' id='billing_company' /></p>"
    tbody += "<p><label for='billing_address_1'>billing_address_1</label><input value='' type='text' name='billing_address_1' id='billing_address_1' /></p>"
    tbody += "<p><label for='billing_address_2'>billing_address_2</label><input value='' type='text' name='billing_address_2' id='billing_address_2' /></p>"
    tbody += "<p><label for='billing_city'>billing_city</label><input value='' type='text' name='billing_city' id='billing_city' /></p>"
    tbody += "<p><label for='customer_id'>customer_id</label><input value='' type='text' name='customer_id' id='customer_id' /></p>"
    tbody += "<a id='save-edited-invoice' class='btn btn-primary' href='#'>Save</a></td></tr>";

    invoiceRequestForm.empty();
    invoiceRequestForm.append(tbody);
  });

  $("div[class*='woocommerce-MyAccount']").on("click", "table #save-edited-invoice", function (e) {
    e.preventDefault();

    var new_order_meta_data = {
      _billing_invoice_checkbox: $('#billing_invoice_checkbox').val(),
      _billing_vat: $('#billing_vat').val()
    }
    var order_data = {
      payment_method: $('#payment_method').val(),
      billing_address_1: $('#billing_address_1').val(),
      billing_address_2: $('#billing_address_2').val(),
      billing_city: $('#billing_city').val(),
      billing_company: $('#billing_company').val()
    }
    var order_id = $('#invoice_id').val();
    var data = {
      action: "saveNewOrEditedOrder",
      order_id: order_id,
      new_order_meta_data: new_order_meta_data,
      order_data: order_data
    };

    $.ajax({
      url: mdw_search_object.ajaxurl,
      method: "POST",
      data: data
    }).done(function (response) {
      response = JSON.parse(response);
      console.log(response);
      var invoiceRequestForm = $("table.shop_table.shop_table_responsive tbody");
      invoiceRequestForm.empty();
    }).fail(function (err) {
      console.log(err);
    });

  })


  $("#invoice-requests-list").on("click", function (e) {
    e.preventDefault();

    $("nav[class*='woocommerce-MyAccount'] ul li").each(function () {
      $(this).removeClass("is-active");
    });

    $(this).parent().addClass("is-active");

    var data = {
      action: "getInvoiceRequests"
    };

    $.ajax({
      url: mdw_search_object.ajaxurl,
      method: "POST",
      data: data
    }).done(function (response) {
      response = JSON.parse(response);
      console.log(response);

      var requests = response.requests;

      $(".woocommerce div[class*='woocommerce-MyAccount']").html("<table></table>");
      var invoiceRequestsListTable = $(".woocommerce div[class*='woocommerce-MyAccount'] table");

      invoiceRequestsListTable.attr("class", "shop_table shop_table_responsive");

      var thead = "<thead>" +
        "<tr>" +
        "<th>Order</th>" +
        "<th>Actions</th>" +
        "</tr>" +
        "</thead>";


      var tbody = "<tbody>";

      if (requests.length === 0) {
        tbody += "<tr><td>No new requests.</td><td></td></tr>";
      } else {
        for (var i = 0; i < requests.length; i++) {
          var order = requests[i];

          tbody += "<tr>" +
            "<td>" +
            "<ul style='list-style-type:none;'>" +
            "<li><b>Order ID:</b> " + order.order_id + "</li>" +
            "<li><b>Invoice Date:</b> " + order.invoice_date + "</li>" +
            "<li><b>VAT Number:</b> " + order.vat_number + "</li>" +
            "<li><b>Buyer Name:</b> " + order.buyer_name + "</li>" +
            "<li><b>Country:</b> " + order.country + "</li>" +
            "<li><b>Tax:</b> " + order.tax + "</li>" +
            "<li><b>Netto:</b> " + order.netto + "</li>" +
            "<li><b>Brutto:</b> " + order.brutto + "</li>" +
            "<li><b>EU:</b> " + order.eu_valid + "</li>" +
            "</ul>" +
            "</td>" +
            "<td>" +
            "<a id='confirm-invoice' class='btn btn-primary' data-order-id='" + order.order_id + "' href='#'>Confirm</a>" +
            "</td>" +
            "</tr>";
        }
      }


      tbody += "</tbody>";

      invoiceRequestsListTable.append(thead);
      invoiceRequestsListTable.append(tbody);

    }).fail(function (err) {
      console.log(err);
    });
  });

  var commentsCounter = $('span.counter');
  commentsCounter.each(function () {
    if ($(this).text() === 0 || $(this).text() === '') {
      $(this).css('display', 'none');
    }
  })

  function init_media() {
    var vidDefer = document.getElementsByTagName('iframe');
    for (var i = 0; i < vidDefer.length; i++) {
      if (vidDefer[i].getAttribute('data-src')) {
        vidDefer[i].setAttribute('src', vidDefer[i].getAttribute('data-src'));
      }
    }
  }
  window.onload = init_media;

  function saveUserFirstDownloadFreePackageDate( technology ) {

    var cookieName = 'mdb_free_download_date_' + technology + '=';
    var cookies = decodeURIComponent(document.cookie).split(';');
    var cookieExists = false;
    var cookieValue = '';

    for( var i = 0; i < cookies.length; i++ ) {
      var c = cookies[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(cookieName) == 0) {
        cookieExists = true;
        cookieValue = c.substring(cookieName.length, c.length);
      }
    }

    if( !cookieExists ) {

      var currDate = new Date();
      var day = String(currDate.getDate()).padStart(2, '0');
      var month = String(currDate.getMonth() + 1).padStart(2, '0');
      var year = currDate.getFullYear();

      currDate = year + '-' + month + '-' + day;
      cookieValue = 'mdb_' + currDate;

      var expiresDate = new Date();
      expiresDate.setTime(expiresDate.getTime()+60*60*24*365);
      var expires = '; expires=' + expiresDate.toGMTString();

      document.cookie = 'mdb_free_download_date_' + technology + '=' + cookieValue + expires + '; path=/';
    }
  }

  $("#getStart-content-directDownload-jquery, #getStart-content-gitDownload-jquery").on("click", function () {
    saveUserFirstDownloadFreePackageDate( 'jq' );
  });
  $("#getStart-content-directDownload-angular, #getStart-content-gitDownload-angular").on("click", function () {
    saveUserFirstDownloadFreePackageDate( 'ng' );
  });
  $("#getStart-content-directDownload-react, #getStart-content-gitDownload-react").on("click", function () {
    saveUserFirstDownloadFreePackageDate( 're' );
  });
  $("#getStart-content-directDownload-vue, #getStart-content-gitDownload-vue").on("click", function () {
    saveUserFirstDownloadFreePackageDate( 'vu' );
  });

  document.addEventListener('DOMContentLoaded', function() {
    const lazyImages = [].slice.call(document.querySelectorAll('img[data-lazysrc]'));
    if ('IntersectionObserver' in window) {
      let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            let lazyImage = entry.target;
            lazyImage.src = lazyImage.dataset.lazysrc;
            lazyImage.removeAttribute('data-lazysrc');
            lazyImageObserver.unobserve(lazyImage);
          }
        });
      });

      lazyImages.forEach(function(lazyImage) {
        lazyImageObserver.observe(lazyImage);
      });
    }
  });

})(jQuery);
</script>

<script>
  document.addEventListener('DOMContentLoaded', (e) => {
    document.querySelectorAll('#slide-out #side-menu li').forEach((menu)=>{
      menu.querySelectorAll('ul.sub-menu li').forEach((link)=>{
        var is_active = link.querySelector('a.collapsible-header').classList.contains('current-page');
        var collapseIcon = menu.querySelector('.rotate-icon');

        if (is_active && collapseIcon) {
          $(link).addClass('current-menu-item')
          $(link).parents('.collapsible-body').siblings().addClass('active')
          return false;
        }
      });
    });

    const setTransitionProperties = () => {
      const sidenav = document.getElementById('slide-out');
      const rotateIcons = sidenav.querySelectorAll('.rotate-icon');
      const collapse = sidenav.querySelectorAll('.collapsible-body');

      rotateIcons.forEach(icon => {
        icon.style.transitionProperty = 'transform'
      });

      collapse.forEach(collapse => {
        collapse.style.transitionProperty = 'height'
      });
    }

    setTimeout(setTransitionProperties, 1);
  });
</script>
 
<!-- <script src="https://maps.google.com/maps/api/js"></script> -->
<script>
</script>
<!-- Structured data: Breadcrumbs -->
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
      "@type": "ListItem",
      "position": 1,
      "item": {
        "@id": "https://mdbootstrap.com/",
        "name": "MDBootstrap",
        "image": "https://mdbootstrap.com/img/Marketing/mdb-press-pack/mdb-main.webp"
      }
    },{
      "@type": "ListItem",
      "position": 2,
      "item": {
        "@id": "https://mdbootstrap.com/docs/b4/jquery/",
        "name": "MDBootstrap jQuery",
        "image": "https://mdbootstrap.com/wp-content/uploads/2018/11/mdb-jquery-free.webp"
      }
    },{
      "@type": "ListItem",
      "position": 3,
      "item": {
        "@id": "https://mdbootstrap.com/docs/b4/jquery/utilities/",
        "name": "Utilities",
        "image": "https://mdbootstrap.com/wp-content/uploads/2017/11/3-1.webp"
      }
    },{
      "@type": "ListItem",
      "position": 4,
      "item": {
        "@id": "https://mdbootstrap.com/docs/b4/jquery/utilities/embeds/",
        "name": "Bootstrap embeds",
        "image": "https://mdbootstrap.com/wp-content/uploads/2017/06/embeds-fb.webp"
      }
    }]
  }
  </script>
<!-- Structured data: Article -->
<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "NewsArticle",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://mdbootstrap.com/docs/b4/jquery/utilities/embeds/"
      },
      "headline": "Bootstrap Embeds - examples & tutorial. Basic & advanced usage",
      "image": [
        "https://mdbootstrap.com/wp-content/uploads/2017/06/embeds-fb.webp"
      ],
      "datePublished": "2018-06-25T08:00:00+08:00",
      "dateModified": "2018-06-25T09:20:00+08:00",
      "author": {
        "@type": "Organization",
        "name": "MDBootstrap"
      },
      "publisher": {
        "@type": "Organization",
        "name": "MDBootstrap",
        "logo": {
          "@type": "ImageObject",
          "url": "https://mdbootstrap.com/wp-content/uploads/2018/06/logo-mdb-jquery-small.webp"
        }
      },
      "description": "Bootstrap embeds is a utility which helps you insert video or slideshow in the page keeping width of the parent and scales on any device."
    }
    </script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>